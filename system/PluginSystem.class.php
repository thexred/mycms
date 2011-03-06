<?php
class PluginSystem
{
	protected $repository = null;
	protected $loader = null;
	protected $location = null;
	
	public function __construct ($in_pluginsLocation, $in_preload = false)
	{
		$this->location = $in_pluginsLocation;
		$this->loader = new PluginLoader ();
		$this->repository = new PluginRepository ();
	}
	
	
}