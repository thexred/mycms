<?php
class ScriptCSSLoader extends ScriptLoader
{
	public function loadDynamic ($in_path)
	{
		echo "<link rel='stylesheet' type='text/css' href='$in_path'>\n";
	}
	
	public function getContent ()
	{
		echo "<style>\n" . $this->data . "\n</style>\n";
	}
	
	public function addVar ($in_var, $in_val = null)
	{
	}
}