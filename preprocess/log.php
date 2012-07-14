<?

$_log_scope = 0;
$_log_enabled = true;

class V {
	
	public $value;
	
	function __construct($value) {
		$this->value = $value;
	}
	
}

function v($value) {
	return new V($value);
}

function _format($args) {
	$str = '';
	foreach($args as $arg) {
		if($arg instanceof V) {
			if(is_string($arg->value)) {
				$str .= ' "' . $arg->value.'"';
			} else if(is_null($arg->value)) {
				$str .= ' (null)';
			} else if(is_bool($arg->value)) {
				$str .= ' ' . ($arg->value ? 'true' : 'false');
			} else {
				$str .= ' ' . $arg->value;
			}
		} else {
			$str .= ' ' . $arg;
		}
	}
	return $str;
}

function error() {
	ob_end_clean();
	die('ERROR:' . _format(func_get_args()) . "\n");
}

function log_enter() {
	global $_log_scope;
	$_log_scope++;
}

function log_exit() {
	global $_log_scope;
	$_log_scope--;
}

function info() {
	global $_log_scope, $_log_enabled;
	if($_log_enabled) {
		echo str_repeat('  ', $_log_scope) . _format(func_get_args()) . "\n";
	}
}
