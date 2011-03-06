<?php
class ScriptJSLoader extends ScriptLoader
{
	public function loadDynamic ($in_path)
	{
		echo "<script type='text/javascript' src='$in_path'></script>\n";
	}
	
	public function getContent ()
	{
		echo "<script type='text/javascript'>\n" . $this->data . "\n</script>\n";
	}
	
	public function addVar ($in_var, $in_val = null)
	{
		if (is_array ($in_var))
		{
			foreach ($in_var as $key => $value)
				$this->_addVar ($key, $value);
		}
		else 
			$this->_addVar ($in_var, $in_val);
		
	}
	
	public function _addVar ($in_var, $in_val)
	{
		$this->addContent ("var $in_var ='$in_val';");
	}
}