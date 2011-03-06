<?php
class ClassLoader
{
	static protected $additionalClasses = array ();
	
	static public function init ()
	{
		spl_autoload_register ("ClassLoader::loadClass");
		spl_autoload_register ("ClassLoader::loadClassAdd");
		spl_autoload_register ("ClassLoader::loadClassPluginApi");
	}

	static public function loadClass ($in_className)
	{
		$file = Cms::getSystemPath() . "/$in_className.class.php";
		if (!file_exists ($file))
			return false;
		
		require_once $file;
		return true;
	}
	
	static public function loadClassAdd ($in_className)
	{
		if (!isset (self::$additionalClasses[$in_className]))
			return false;
		
		require_once (Cms::getSystemAddonsPath()."/".self::$additionalClasses[$in_className]);
		return true;
	}
	
	static public function addClass ($in_className, $in_src)
	{
		self::$additionalClasses[$in_className] = $in_src;
	}

	/**
	 * Добавить классы key-имя класса, value-файл класса
	 * @param $in_classes
	 * @return unknown_type
	 */
	static public function addClasses ($in_classes)
	{
		self::$additionalClasses = array_merge (self::$additionalClasses, $in_classes);
	}

	static public function loadClassPluginApi ($in_className)
	{
		$file = Cms::getSystemPath () . "/PluginAPI/$in_className.class.php";
		if (!file_exists ($file))
			return false;
			
		require_once $file;
		return true;		
	}
	
}