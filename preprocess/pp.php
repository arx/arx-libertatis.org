<?

$p = null;

$megalog = ''; // TODO remove

class PP {
	
	const URL_ABSOLUTE = 0;
	const URL_ROOT_RELATIVE = 1;
	const URL_RELATIVE = 2;
	const URL_RELATIVE_ONLY = 3;
	
	private static $url_optimization = self::URL_ABSOLUTE;
	
	private static $source_dirs = [ ];
	private static $include_dirs = [ ];
	
	/*!
	 * All defined URL routes:
	 * Map of namespace string to string / array / callable.
	 */
	private static $routes = [ ];
	
	private static $_minify = false;
	
	static function minify($enable) {
		self::$_minify = $enable;
	}
	
	static function minify_enabled() {
		return self::$_minify;
	}
	
	static function optimize_urls($opt) {
		if($opt != self::URL_ABSOLUTE && $opt != self::URL_ROOT_RELATIVE
		   && $opt != self::URL_RELATIVE && $opt != self::URL_RELATIVE_ONLY) {
			error('invalid URL optimization option:', v($opt));
		}
		self::$url_optimization = $opt;
	}
	
	/*!
	 * Add a source to the include search path
	 */
	static function source_dir($dir, $map = [ ], $namespace = 'main') {
		if(!is_string($namespace) || $namespace == '') {
			error('invalid namespace', v($namespace));
		}
		if(!file_exists($dir) || $dir == '') {
			error('non-existant source dir', v($dir));
		}
		$dir = realpath($dir);
		if($dir[strlen($dir) - 1] != '/') {
			$dir .= '/';
		}
		info('source dir', v($dir), '=', v($namespace));
		self::$source_dirs[$dir] = [ $map, $namespace ];
		self::inlude_dir($dir);
	}
	
	/*!
	 * Add a directory to the include search path
	 */
	static function inlude_dir($dir) {
		if(!file_exists($dir) || $dir == '') {
			error('non-existant include dir', v($dir));
		}
		$dir = realpath($dir);
		if($dir[strlen($dir) - 1] != '/') {
			$dir .= '/';
		}
		info('include dir', v($dir));
		self::$include_dirs[] = $dir;
	}
	
	/*!
	 * Add a new route.
	 * \param string $namespace  the namespace to add a route for
	 *        Each namespace can only have one route defined.
	 *        Namespaces must be non-empty strings that don't contain a colon (:).
	 * \param mixed $destination  rule to convert urls under that namespace
	 *        <p>
	 *        If $destination is a \class array, the input URL is used to index the array.
	 *        If such an entry exists, corresponding value is interpreted as a new virtual URL.
	 *        That URL is again routed and then returned as the lookup result.
	 *        If no such entry exists, the lookup fails.
	 *        <code>route('test', [ 'a' => 'b' ])</code> maps 'test:a' to 'b'
	 *        <p>
	 *        If $destination is a \class callable, the input is passed to the callable.
	 *        The returned value is used as the lookup result.
	 *        <p>
	 *        Otherwise, if $destination is a \class string, that string is interpreted as a
	 *        new virtual URL. That URL is routed and prepended to the original URL to give the
	 *        lookup result.
	 *        <code>route('test', 'a/')</code> maps 'test:b' to 'a/b'
	 */
	static function route($namespace, $destination) {
		if(!is_string($namespace) || $namespace == '') {
			error('invalid namespace', v($namespace));
		}
		if(!is_array($destination) && !is_callable($destination) && !is_string($destination)) {
			error('invalid route destination', v($destination));
		}
		if(isset(self::$routes[$namespace])) {
			error('namespace', v($namespace), 'already routed');
		}
		self::$routes[$namespace] = $destination;
	}
	
	static function resolve($resource) {
		
		$colon_pos = strpos($resource, ':');
		
		if($colon_pos === false) {
			$namespace = 'main';
		} else if($colon_pos === 0) {
			// raw URL
			return substr($resource, 1);
		} else {
			$namespace = substr($resource, 0, $colon_pos);
			$resource = substr($resource, $colon_pos + 1);
		}
		
		if(!isset(self::$routes[$namespace])) {
			error('undefined namespace', v($namespace), "for resource", v($resource));
		}
		
		$route = self::$routes[$namespace];
		
		if(is_array($route)) {
			
			if(!isset($route[$resource])) {
				error('invalid resource', v($resource), 'for namespace', v($namespace));
			}
			if(!is_string($route[$resource])) {
				error('invalid destination for resource', v($resource), 'in namespace', v($namespace));
			}
			return self::resolve($route[$resource]);
			
		} else if(is_callable($route)) {
			
			return $route($resource);
			
		} else if(is_string($route)) {
			
			return self::resolve($route) . $resource;
			
		} else {
			error('invalid destination', v($route), 'for namespace', v($namespace));
		}
	}
	
	private static function _to_url($file, $dir, $map = [ ]) {
		
		$dlen = strlen($dir);
		
		if($dlen < 1 || $dir[$dlen - 1] != '/') {
			error('bad source directory', $dir);
		}
		
		if($dlen >= strlen($file) || substr($file, 0, $dlen) != $dir) {
			return null;
		}
		
		$subfile = substr($file, $dlen);
		
		// Adjust filename aliases
		$subfile = preg_replace('/\.php$/', '', $subfile);
		foreach($map as $pattern => $replacement) {
			$subfile = preg_replace($pattern, $replacement, $subfile);
		}
		
		// Encode bad characters
		$components = explode('/', $subfile);
		foreach($components as & $component) {
			$component = rawurlencode($component);
		}
		$subfile = implode('/', $components);
		
		return $subfile;
	}
	
	static function to_url($file, $resource_url = false) {
		
		foreach(self::$source_dirs as $dir => $data) {
			$resource = self::_to_url($file, $dir, $resource_url ? [ ] : $data[0]);
			if($resource !== null) {
				if($resource_url) {
					return $resource;
				} else {
					$namespace = $data[1];
					return self::resolve($namespace . ':' . $resource);
				}
			}
		}
		
		if($resource_url) {
			foreach(self::$include_dirs as $dir) {
				$resource = self::_to_url($file, $dir);
				if($resource !== null) {
					return $resource;
				}
			}
		}
		
		return null;
	}
	
	static function find_file($file, $use = 'required') {
		global $p;
		foreach(self::$include_dirs as $dir) {
			$path = $dir . $file . '.php';
			if(file_exists($path)) {
				return realpath($path);
			}
		}
		if($p !== null) {
			error($use, 'file', v($file), "not found\n", $p->_stack_trace());
		} else {
			error($use, 'file', v($file), 'not found');
		}
	}
	
	static function find_files($pattern, $use = 'required') {
		$files = [ ];
		foreach(self::$include_dirs as $dir) {
			$path = $dir . $pattern . '.php';
			$files = array_merge($files, glob($path));
		}
		return $files;
	}
	
	static function compile_impl($page, $file, $inherit, $verb) {
		
		global $p;
		
		// Backup the currently active page
		if($p !== null) {
			$p->_buffer .= ob_get_clean();
		}
		$old_active_page = $p;
		
		info($verb, v(self::to_url($file, true)), '{');
		log_enter();
		
		// in case this is an import call, save the old state
		$old_buffer = $page->_buffer;
		$old_current = $page->_current;
		$old_append = $page->_append;
		
		$current_file = $file;
		$p = $page;
		while(true) {
			if($inherit) {
				info('->', v(self::to_url($current_file, true)));
			}
			
			$p->_begin('content');
			
			include($current_file);
			
			$p->_end();
			
			if(!$inherit || $p->_inherits === null) {
				break;
			}
			
			$current_file = self::find_file($p->_inherits, 'inherited');
			$p = new Page($current_file, $p);
		}
		
		$new_page = $p;
		
		// restore old state
		$page->_buffer = $old_buffer;
		$page->_current = $old_current;
		$page->_append = $old_append;
		
		log_exit();
		info('}');
		
		// Restore the previously active page
		$p = $old_active_page;
		if($p != null) {
			ob_start();
		}
		
		return $new_page;
	}
	
	static function compile($file, $defines = [ ]) {
		
		// Create a fake outer-level page for parameters
		$param_page = new Page("<params>");
		foreach($defines as $key => $value) {
			$param_page->$key = $value;
		}
		
		if(!isset($param_page->page)) {
			$param_page->page = PP::to_url($file, true);
			if($param_page->page === null) {
				error('could not map source file', v($file), 'to resource URL');
			}
		}
		
		return self::compile_impl(new Page($file, $param_page), $file, true, "compiling");
	}
	
	static function shortest($array) {
		$len = null;
		$best = null;
		global $megalog;
		foreach($array as $str) {
			$megalog .= "\n - \"" . $str . "\"";
			$l = strlen($str);
			if($len === null || $l < $len) {
				$len = $l;
				$best = $str;
			}
		}
		$megalog .= "\n => \"" . $best . "\"\n";
		return $best;
	}
	
	static function optimize_url($url, $base, $protocol_relative = false) {
		
		global $megalog;
		$megalog .= "\n[" . $base . "]";
		
		if(self::$url_optimization <= self::URL_ABSOLUTE) {
			return self::shortest([ $url ]);
		}
		
		$alt = [ ];
		
		if($protocol_relative && substr($url, 0, 7) == "http://") {
			$alt[] = substr($url, 5);
		} else if($protocol_relative && substr($url, 0, 8) == "https://") {
			$alt[] = substr($url, 6);
		} else {
			$alt[] = $url;
		}
		
		$u = parse_url($url);
		$b = parse_url($base);
		if($u === false || $b === false) {
			return self::shortest($alt);
		}
		
		if(!isset($u['scheme']) || !isset($b['scheme']) || $u['scheme'] != $b['scheme']
		   || ($u['scheme'] != 'http' && $u['scheme'] != 'https')) {
			// Unsupported or mismatched protocols
			return self::shortest($alt);
		}
		
		if(!isset($u['host']) || !isset($b['host']) || $u['host'] != $b['host']
		   || (isset($u['user'])
		       ? (!isset($b['user']) || $u['user'] != $b['user']) : isset($u['user']))
		   || (isset($u['pass'])
		       ? (!isset($b['pass']) || $u['pass'] != $b['pass']) : isset($u['pass']))) {
			// Mismatched host, user or password
			return self::shortest($alt);
		}
		
		$default_port = ($u['scheme'] == 'http') ? 80 : 443;
		$pu = isset($u['port']) ? $u['port'] : $default_port;
		$pb = isset($b['port']) ? $b['port'] : $default_port;
		if($pu != $pb) {
			return self::shortest($alt);
		}
		
		if(isset($u['query']) && $u['query'] != '') {
			$query = '?' . $u['query'];
		} else {
			$query = '';
		}
		if(isset($u['fragment']) && $u['fragment'] != '') {
			$fragment = '#' . $u['fragment'];
		} else {
			$fragment = '';
		}
		
		$up = $u['path'];
		if(self::$url_optimization != self::URL_RELATIVE_ONLY) {
			$alt[] = $up . $query . $fragment;
		}
		
		if(self::$url_optimization <= self::URL_ROOT_RELATIVE) {
			return self::shortest($alt);
		}
		
		// Try fragment/query URLs
		$bp = $b['path'];
		if($up == $bp) {
			if(isset($h['query']) && $h['query'] != '') {
				$hquery = '?' . $h['query'];
			} else {
				$hquery = '';
			}
			if($query == $hquery && $fragment != '') {
				$alt[] = $fragment;
			} else if($query != '') {
				$alt[] = $query . $fragment;
			}
		}
		
		// Remove common path segments
		while(true) {
			
			// Find the second slash
			$p = strpos($up, '/', 1);
			if($p == false) {
				// remaining user path is "/" or "/file"
				break;
			}
			
			if(strlen($bp) <= $p || substr($bp, 0, $p + 1) != substr($up, 0, $p + 1)) {
				// paths diverged!
				break;
			}
			
			// Path components match, trim
			$bp = substr($bp, $p);
			$up = substr($up, $p);
		}
		
		$slashes = substr_count($bp, '/');
		if($slashes > 1) {
			$prefix = str_repeat ('../', $slashes - 1);
		} else if($slashes == 1) {
			if($up == '/') {
				$prefix = './';
			} else {
				$prefix = '';
			}
		} else {
			error('baaad');
			// Cannot happen!
		}
		$alt[] = $prefix . substr($up, 1) . $query . $fragment;
		
		
		return self::shortest($alt);
	}
	
	
} // class PP
