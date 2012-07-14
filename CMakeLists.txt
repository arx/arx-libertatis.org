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

set(source "${CMAKE_SOURCE_DIR}/htdocs")
set(stage "${CMAKE_BINARY_DIR}/stage")
set(output "${CMAKE_SOURCE_DIR}/output")

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
			MAIN_DEPENDENCY "${source}/${file}"
			DEPENDS "${pngcrush}" "${optipng}"
			COMMENT "Optimizing ${outfile}"
			VERBATIM
		)
		
		list(APPEND optimized "${stage}/${outfile}")
		
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
		
	endif()
	
	add_custom_command(TARGET copy PRE_BUILD
		COMMAND cmake -E make_directory "${output}/${dir}"
		COMMAND cmake -E copy_if_different "${stagein}" "${output}/${outfile}"
		VERBATIM
	)
	
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
