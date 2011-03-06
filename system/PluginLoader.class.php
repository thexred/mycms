<?php
class PluginLoader 
{
	const PLUGIN_FILENAME 	= "plugin.php";
	const PLUGIN_INIFILE 	= "plugin.ini"; 
	
	protected $location = null;
	
	//protected $pluginCache = null;
	
	public function __construct ($in_path)
	{
		$this->location = $in_path;
	} 
	
	public function getPlugins ()
	{
		$ret = array();

		$dir = dir ($this->location);			
		while (($entry = $dir->read ()) !== false)
		{	
			$res = $this->loadPlugin ($entry);
			if ($res !== false)
				$ret[$res->name] = $res;
		}
		
		$dir->close();
			
		return $ret;
	}
	
	public function loadPlugin ($in_dirName)
	{
		$plugin_path = $this->location . "/" . $in_dirName;
		$plugin_file = $plugin_path . "/" . self::PLUGIN_FILENAME;
		$plugin_ini = $plugin_path . "/" . self::PLUGIN_INIFILE;

		if (!$this->isPluginDir ($plugin_path))
			return false;

		$plugin_info = new PluginInfo (parse_ini_file ($plugin_ini));
		$plugin_info->path = $plugin_file;
		$plugin_info->name = $in_dirName;

		return $plug;
	}
	
	public function isPluginDir ($in_dir)
	{
		if (is_dir ($in_dir))
		{
			if (file_exists ($in_dir . "/" . self::PLUGIN_FILENAME) && 
				file_exists ($in_dir . "/" . self::PLUGIN_INIFILE) )
				return true;
			else				
				return false; 			
		}
		else
			return false;
	}

	
}

?>