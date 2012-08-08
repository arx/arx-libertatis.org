<?

class ApendSetter {
	
	private $page;
	
	function __construct($page) {
		$this->page = $page;
	}
	
	function append() {
		$this->page->_append = true;
	}
	
}

class Page {
	
	public $_file;
	public $params;
	public $_inherits = null;
	public $_buffer = '';
	public $_current = null;
	public $_append = false;
	public $_data = [ ];
	public $_params = [ 'content' => 'The main content' ];
	public $_defaults = [ ];
	
	function __construct($file, $params = null) {
		$this->_file = $file;
		$this->params = $params;
	}
	
	function _begin($var) {
		$this->_buffer = '';
		$this->_current = $var;
		$this->_append = false;
		ob_start();
	}
	
	function _end() {
		
		$text = $this->_buffer . ob_get_clean();
		$this->_buffer = '';
		
		$var = $this->_current;
		$this->_current = null;
		if($var === null) {
			error('var was null');
		}
		
		if($text == '') {
			return;
		}
		
		// Clean the first newline
		if($text{0} == "\n") {
			$text = substr($text, 1);
		}
		
		if($this->_append) {
			list($value, $exists) = $this->_get($var);
			$this->_data[$var] = $value . $text;
		} else {
			$this->$var = $text;
		}
		$this->_append = false;
	}
	
	function __unset($var) {
		unset($this->_data[$var]);
		if($this->params != null) {
			unset($this->params->$var);
		}
	}
	
	function _get($var, $prefer_params = false) {
		if(!$prefer_params && isset($this->_data[$var])) {
			return array($this->_data[$var], true);
		}
		if($this->params != null) {
			list($value, $exists) = $this->params->_get($var);
			if($exists) {
				return array($value, true);
			}
		}
		if(isset($this->_defaults[$var])) {
			return array($this->_defaults[$var], true);
		}
		if($prefer_params && isset($this->_data[$var])) {
			return array($this->_data[$var], true);
		}
		return array(null, false);
	}
	
	function __isset($var) {
		list($value, $exists) = $this->_get($var);
		return $exists;
	}
	
	function _stack_trace() {
		$str = "In file \"" . $this->_file . '"';
		$file = $this;
		while($file->params !== null) {
			$file = $file->params;
			$str .= "\n inherited by \"" . $file->_file . '"';
		}
		return $str;
	}
	
	function get($var, $prefer_params = true) {
		list($value, $exists) = $this->_get($var, $prefer_params);
		if(!$exists) {
			if(isset($this->_params[$var])) {
				error('missing parameter', v($var), '(', $this->_params[$var], ")\n",
				      $this->_stack_trace());
			} else {
				error('undefined parameter', v($var), "\n",
				      $this->_stack_trace());
			}
		}
		return $value;
	}
	
	function __get($var) {
		return $this->get($var, false);
	}
	
	function __set($var, $value) {
		if(isset($this->_params[$var])) {
			if(isset($this->_data[$var])) {
				error('parameter ', v($var), ', already set locally to ', v($this->_data[$var]), "\n",
				      $this->_stack_trace());
			}
		} else {
			list($old, $exists) = $this->_get($var);
			if($exists) {
				error('parameter ', v($var), ', already set to ', $old, " and not declared locally\n",
				      $this->_stack_trace());
			}
		}
		$this->_data[$var] = $value;
	}
	
	function inherit($page) {
		if($this->_inherits !== null) {
			error('cannot inherit', v($page), ', already inheriting', v($this->_inherits), "\n",
			      $this->_stack_trace());
		}
		$this->_inherits = $page;
	}
	
	function import($file) {
		PP::compile_impl($this, PP::find_file($file, 'imported'), false, "importing");
	}
	
	function param($name, $description, $default = null) {
		$this->_params[$name] = $description;
		if($default !== null) {
			$this->_defaults[$name] = $default;
		}
	}
	
	function __call($var, $arguments) {
		if(count($arguments) !== 0) {
			error('invalid arguments to', v($var), 'call:', v($arguments), "\n",
			      $this->_stack_trace());
		}
		$this->_end();
		$this->_begin($var);
		return new ApendSetter($this);
	}
	
	function optimize_url($url, $protocol_relative = false) {
		global $megalog;
		list($base, $exists) = $this->_get('url');
		if($exists) {
			$megalog .= "\n base: \"" . $base . "\"";
			return PP::optimize_url($url, $base, $protocol_relative);
		} else {
			$megalog .= "\n no base";
			return $url;
		}
	}
	
};
