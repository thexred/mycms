<?php
class ConfigLoader 
{
	static public function load ()
	{
		return require_once (Cms::getSystemPath () . "/config.php");
	}
}

?>