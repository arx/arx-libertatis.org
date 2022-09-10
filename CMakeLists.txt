project("arx-libertatis.org")

cmake_minimum_required(VERSION 2.8)

function(find program)
	find_program(${program} ${program})
	message("${program}: ${${program}}")
	set(${program} ${${program}} PARENT_SCOPE)
endfunction(find)

function(is_in_set string list var)
	foreach(entry IN LISTS list)
		if("${entry}" STREQUAL "${string}")
			set(${var} 1 PARENT_SCOPE)
			return()
		endif()
	endforeach()
	set(${var} 0 PARENT_SCOPE)
endfunction()

function(get_ext file var)
	string(REGEX MATCH "\\.[^/.]+$" ext "${file}")
	set(${var} ${ext} PARENT_SCOPE)
endfunction()

find(php)
find(jpegoptim)
find(optipng)
find(pngcrush)
find(zopflipng)
find(cwebp)
find(convert)

set(source "${CMAKE_SOURCE_DIR}/htdocs")
set(stage "${CMAKE_BINARY_DIR}/stage")
set(output "${CMAKE_BINARY_DIR}/htdocs")

set(php_ini "${CMAKE_SOURCE_DIR}/preprocess/php.ini")
set(php_cmd "${CMAKE_SOURCE_DIR}/preprocess/process.php")
set(php_cfg "${CMAKE_SOURCE_DIR}/config.php")

set(processed_files ".html" ".css" ".js" ".php")

file(GLOB_RECURSE all_files "${source}/*")

add_custom_target(process COMMENT "Processing pages...")
add_custom_target(copy ALL DEPENDS COMMENT "Copying changed files...")

set(optimized)

foreach(file IN LISTS all_files)
	file(RELATIVE_PATH file "${source}" "${file}")
	set(outfile "${file}")
	set(stagein "${source}/${file}")
	
	if("${file}" MATCHES "^files/")
		# Don't process static files, they are published directly from the source dir
		
	else()
		
		get_filename_component(dir "${file}" PATH)
		
		get_ext("${file}" ext)
		is_in_set("${ext}" "${processed_files}" process)
		if(process)
			
			if("${ext}" STREQUAL ".php")
				string(LENGTH "${outfile}" outfile_len)
				math(EXPR outfile_end "${outfile_len} - 4")
				string(SUBSTRING "${outfile}" 0 ${outfile_end} outfile)
			endif()
			set(stagein "${stage}/${outfile}")
			
			add_custom_command(TARGET process PRE_BUILD
				COMMAND cmake -E make_directory "${stage}/${dir}"
				COMMAND "${php}" -c "${php_ini}" "${php_cmd}" ${php_cfg}
					"${source}/${file}" "${stage}/${outfile}" quiet
				COMMENT "Generating ${outfile}"
				VERBATIM
			)
			
		elseif("${ext}" STREQUAL ".png")
			
			set(stagein "${stage}/${outfile}")
			
			add_custom_command(OUTPUT "${stage}/${outfile}"
				COMMAND cmake -E make_directory "${stage}/${dir}"
				COMMAND "${pngcrush}" -q "${source}/${file}" "${stage}/${outfile}"
				COMMAND "${optipng}" --silent "${stage}/${outfile}"
				COMMAND "${zopflipng}" -y --iterations=500 --filters=01234mepb --lossy_transparent --keepchunks=cHRM,gAMA,pHYs,iCCP,sRGB,oFFs,sTER "${stage}/${outfile}" "${stage}/${outfile}"
				MAIN_DEPENDENCY "${source}/${file}"
				DEPENDS "${pngcrush}" "${optipng}" "${zopflipng}"
				COMMENT "Optimizing ${outfile}"
				VERBATIM
			)
			
			list(APPEND optimized "${stage}/${outfile}")
			
			string(REGEX REPLACE "\\.png$" ".webp" outwebp "${outfile}")
			
			add_custom_command(OUTPUT "${stage}/${outwebp}"
				COMMAND cmake -E make_directory "${stage}/${dir}"
				COMMAND "${cwebp}" -lossless -z 9 -m 6 "${stage}/${outfile}" -o "${stage}/${outwebp}"
				MAIN_DEPENDENCY "${stage}/${outfile}"
				DEPENDS "${cwebp}"
				COMMENT "Converting to ${outwebp}"
				VERBATIM
			)
			
			list(APPEND optimized "${stage}/${outwebp}")
			
			add_custom_command(TARGET copy PRE_BUILD
				COMMAND cmake -E make_directory "${output}/${dir}"
				COMMAND cmake -E copy_if_different "${stage}/${outwebp}" "${output}/${outwebp}"
				VERBATIM
			)
			
		elseif("${ext}" STREQUAL ".jpg" OR "${ext}" STREQUAL ".jpeg")
			
			set(stagein "${stage}/${outfile}")
			
			add_custom_command(OUTPUT "${stage}/${outfile}"
				COMMAND cmake -E make_directory "${stage}/${dir}"
				COMMAND cmake -E copy "${source}/${file}" "${stage}/${outfile}"
				COMMAND "${jpegoptim}" --quiet "${stage}/${outfile}"
				MAIN_DEPENDENCY "${source}/${file}"
				DEPENDS "${jpegoptim}"
				COMMENT "Optimizing ${outfile}"
				VERBATIM
			)
			
			list(APPEND optimized "${stage}/${outfile}")
			
			if(outfile MATCHES "^(.*)-2x\\.jpe?g$")
				
				set(tempfile "${CMAKE_MATCH_1}-1.5x.png")
				
				add_custom_command(OUTPUT "${stage}/${tempfile}"
					COMMAND cmake -E make_directory "${stage}/${dir}"
					COMMAND "${convert}" "${source}/${file}" -resize 75% "${stage}/${tempfile}"
					MAIN_DEPENDENCY "${source}/${file}"
					DEPENDS "${convert}" "${jpegoptim}"
					COMMENT "Resizing to ${tempfile}"
					VERBATIM
				)
				
				set(newfile "${CMAKE_MATCH_1}-1.5x.jpg")
				
				add_custom_command(OUTPUT "${stage}/${newfile}"
					COMMAND cmake -E make_directory "${stage}/${dir}"
					COMMAND "${convert}" "${stage}/${tempfile}" -quality 85 "${stage}/${newfile}"
					COMMAND "${jpegoptim}" --quiet "${stage}/${newfile}"
					MAIN_DEPENDENCY "${stage}/${tempfile}"
					DEPENDS "${convert}" "${jpegoptim}"
					COMMENT "Converting to ${newfile}"
					VERBATIM
				)
				
				list(APPEND optimized "${stage}/${newfile}")
				
				add_custom_command(TARGET copy PRE_BUILD
					COMMAND cmake -E make_directory "${output}/${dir}"
					COMMAND cmake -E copy_if_different "${stage}/${newfile}" "${output}/${newfile}"
					VERBATIM
				)
				
				set(tempfile "${CMAKE_MATCH_1}.png")
				
				add_custom_command(OUTPUT "${stage}/${tempfile}"
					COMMAND cmake -E make_directory "${stage}/${dir}"
					COMMAND "${convert}" "${source}/${file}" -resize 50% "${stage}/${tempfile}"
					MAIN_DEPENDENCY "${source}/${file}"
					DEPENDS "${convert}" "${jpegoptim}"
					COMMENT "Resizing to ${tempfile}"
					VERBATIM
				)
				
				set(newfile "${CMAKE_MATCH_1}.jpg")
				
				add_custom_command(OUTPUT "${stage}/${newfile}"
					COMMAND cmake -E make_directory "${stage}/${dir}"
					COMMAND "${convert}" "${stage}/${tempfile}" -quality 85 "${stage}/${newfile}"
					COMMAND "${jpegoptim}" --quiet "${stage}/${newfile}"
					MAIN_DEPENDENCY "${stage}/${tempfile}"
					DEPENDS "${convert}" "${jpegoptim}"
					COMMENT "Converting to ${newfile}"
					VERBATIM
				)
				
				list(APPEND optimized "${stage}/${newfile}")
				
				add_custom_command(TARGET copy PRE_BUILD
					COMMAND cmake -E make_directory "${output}/${dir}"
					COMMAND cmake -E copy_if_different "${stage}/${newfile}" "${output}/${newfile}"
					VERBATIM
				)
				
			endif()
			
		endif()
		
		add_custom_command(TARGET copy PRE_BUILD
			COMMAND cmake -E make_directory "${output}/${dir}"
			COMMAND cmake -E copy_if_different "${stagein}" "${output}/${outfile}"
			VERBATIM
		)
		
	endif()
	
endforeach()

add_custom_target(optimize COMMENT "Optimizing images..." DEPENDS ${optimized})

add_dependencies(copy process optimize)

# TODO
#
#.php => process
#
#.css, .html.css => validate
#.html, .html.php => validate
#.rss, .rss.php => validate
#
#png, jpeg, gif => optimize
