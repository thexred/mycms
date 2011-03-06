<?php

class Cms
{
	static private $cmsPath = null;
	static private $systemPath = null;
	static private $systemAddonsPath = null;
	static private $themePath = null;
	static private $contentPath = null;
	static private $jsPath = null;
	static private $cssPath = null;
	  
	static private $jsLoader = null; 
	static private $cssLoader = null;
	
	static private $contentRepository = null;
	
	static private $config = null;
	
	const SYSTEM_NORMAL	 = 0;
	const SYSTEM_BLOCKED = 1; 
	
	
	/**
	 * Функция входа
	 * @return 
	 */
	static public function getData ($in_request, $in_root)
	{
		// инициализация модуля
		self::init ($in_root);

		// проверка блокировки
		if (self::isBlocked ())
			exit;
		
		// обработка запросов
		$request = RequestFactory::create ($in_request);
		
		// создание контента
		$content = self::$contentRepository->get ($request->getPageId());
		
		// если нет данных, редиректим на дефолтный
		if ($content == false)
			self::redirectToPage (self::$config->get ('system.default.page'));
		 
		// отрисовка заказаной страницы
		self::draw ($content);
	}
	
	static public function init ($in_root)
	{
		// root может располагаться где угодно
		self::$cmsPath = $in_root;
		
		// настройка путей
		self::initPath ();
		
		// в первую очередь инициализируем загрузчик классов 
		require_once self::$cmsPath . "/system/ClassLoader.class.php";
		ClassLoader::init ();
		
		// основной конфиг системы
		self::$config = new Config ();
		
		// инициализируем дополнительный загрузчик файлов
		ClassLoader::addClasses (self::$config->get ('classloader.addons'));
		
		// лоадеры скриптов
		self::$jsLoader = new ScriptJSLoader (self::$config->get ('script.js.load')); 
		self::$cssLoader = new ScriptCSSLoader (self::$config->get ('script.css.load'));
		
		self::$contentRepository = new ContentRepository ();
	}
	
	static private function initPath ()
	{
		self::$systemPath = self::$cmsPath . "/system";  
		self::$systemAddonsPath = self::$systemPath ."/addons"; 
		self::$themePath = self::$cmsPath . "/theme";
		self::$contentPath = self::$cmsPath . "/content";
		self::$jsPath = self::$cmsPath . "/lib";
	}
	
	/**
	 * Отрисовка страницы
	 * @param object $req_data
	 * @return 
	 */
	static public function draw ($content)
	{
		// выбор активной темы
		$theme = self::getCurrentThemePath () . "/theme.php";

		// добавим переменную для клиента
		self::addJSVariable ("const_theme_url", self::getCurrentThemeUrl ());
		require_once ($theme);
	}
	
	static public function getConfig ()
	{
		return self::$config;
	}
	
	static public function getCurrentThemePath ()
	{
		return self::$themePath . "/" . self::$config->get ('theme.current'); 
	}
	
	static public function getCurrentThemeUrl ()
	{
		return "./theme/" . self::$config->get ('theme.current');
	}
	
	static public function getSystemPath ()
	{
		return self::$systemPath;
	}
	
	static public function getCmsPath ()
	{
		return self::$cmsPath;
	}
	
	
	static public function getSystemAddonsPath ()
	{
		return self::$systemAddonsPath;
	}
	
	static public function getContentPath ()
	{
		return self::$contentPath;
	}
	
	static public function loadSystemJS ($in_libName)
	{
		$s = self::$jsPath . "/" . $in_libName;
		$u = "./lib/$in_libName";
		self::$jsLoader->load ($s, $u);
	}
	
	static public function loadSystemCSS ($in_styleName)
	{
		$s = self::$cssPath . "/" . $in_styleName;
		$u = "./css/$in_styleName";

		self::$cssLoader->load ($s, $u);
	}
	
	static public function loadThemeJS ($in_libName)
	{
		$s = self::getCurrentThemePath () . "/lib/" . $in_libName;
		$u = self::getCurrentThemeUrl ()  . "/lib/" . $in_libName;
		
		self::$jsLoader->load ($s, $u);
	}
	
	static public function loadThemeCSS ($in_styleName)
	{
		$s = self::getCurrentThemePath () . "/css/" . $in_styleName;
		$u = self::getCurrentThemeUrl ()  . "/css/" . $in_styleName;
		
		self::$cssLoader->load ($s, $u);
	}
	
	static public function addJSVariable ($in_var, $in_value)
	{
		self::$jsLoader->addVar ($in_var, $in_value);
	}
	
	static public function flushJS ()
	{
		echo self::$jsLoader->getContent ();
	}
	
	static public function flushCSS ()
	{
		echo self::$cssLoader->getContent ();
	}
	
	static public function isBlocked ()
	{
		if (self::$config->get ('system.state') == self::SYSTEM_BLOCKED)
			return true;
		return false;
	}
	
	static public function createPageLink ($in_pageId)
	{
		return RequestFactory::createPageLink ($in_pageId);
	}
	
	static public function redirect ($in_link)
	{
		header ("Location: /$in_link ");
		exit;
	}
	
	static public function redirectToPage ($in_pageId)
	{
		self::redirect (self::createPageLink ($in_pageId));
	}
	
	static public function getConfigValue ($in_key)
	{
		return self::$config->get ($in_key);
	}
	
/*	
	static public function isSiteLocked ()
	{
		if (self::$V_LOCK_SITE == null || self::$V_LOCK_SITE == 0)
			return false;
		return true;
	}
	*/
static public function debug ($value, $var_dump=false)
{
	echo "<pre>";
	print_r ($value);
	echo "</pre>";
	
	if ($var_dump)
	{
		echo "<pre>";
		var_dump ($value);
		echo "</pre>";
	}
} 
	
}
?>