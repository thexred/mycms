<?php
class PluginRepository 
{
	protected $plugins = array ();
	protected $pluginLoader = null;
	protected $location = null;
	
	public function __construct ($in_pluginsLocation)
	{
		$this->location = $in_pluginsLocation;
		$this->pluginLoader = new PluginLoader ($this->location);
		
		$this->addPluginsArray ($this->pluginLoader->getPlugins());
	}
	
	public function addPluginsArray ($in_plugins)
	{
		if (!is_array ($in_plugins))
			return false;
			
		foreach ($in_plugins as $value)
			$this->addPlugin ($value);
	} 
	
	public function addPlugin (Plugin $in_plugin)
	{
		$type = $in_plugin->getPluginType ();
		$name = $in_plugin->getPluginName ();
 		
		$this->plugins[$type][$name] = $in_plugin; 
	}
}

?>