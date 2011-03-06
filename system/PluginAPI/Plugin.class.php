<?php
/**
 * Базовый класс плагина
 * @author thexred
 *
 */
class Plugin
{
	protected $pluginInfo = null;
	
	public function __construct (PluginInfo $in_info)
	{
		$this->pluginInfo = $in_info;
	}
	
	public function getPluginInfo ()
	{
		return $this->pluginInfo;
	}
}
?>