<?php
class ContentLoaderPHP implements IContentLoader
{
	const ID 		= 1;
	const ORDER 	= 2;
	const SRC 		= 3;
	const BLOCK 	= 4;
	const DATA 		= 5;
		
	private $pages = array();
	private $modules = array();
	
	public function __construct ()
	{
		require_once (Cms::getSystemPath() . '/content_store.php');
		$this->pages = $db_pages;
		$this->modules = $db_modules;
	}
	
	public function getPageById ($in_id)
	{
		$page = isset ($this->pages[$in_id]) ? $this->pages[$in_id] : false;
		if ($page == false)
			return false;
		
		if (!isset ($page[self::SRC]))
			return false;
		
		$page[self::DATA] = $this->loadSrc ($page[self::SRC]);

		return new ContentPage ($page[self::ID], $page[self::ORDER], $page[self::SRC], $page[self::BLOCK], $page[self::DATA]);
	}
	
	public function getLinkedPagesId ($in_id)
	{
		return isset ($this->modules[$in_id]) ? $this->modules[$in_id] : array ();  
	}
	
	protected function loadSrc ($in_srcPath)
	{
		return file_get_contents (Cms::getContentPath () . "/$in_srcPath");
	} 
}