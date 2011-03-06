<?php

class ContentRepository
{
	protected $loader = null;
		
	public function __construct ()
	{
		$this->loader = new ContentLoaderPHP ();
	}
	
	public function get ($in_pageId)
	{
		$page = $this->loader->getPageById ($in_pageId);
		if ($page == false)
			return false;
			
		$pages = $this->loader->getLinkedPagesId ($in_pageId);
		
		$ret = array ();
		$ret[] = $page;

		if (count ($pages) == 0)
			return $ret;
			
		foreach ($pages as $value)
		{
			$tmp = $this->loader->getPageById ($value);
			if ($tmp != false)
				$ret[] = $tmp;
		}
		
		return new Content ($ret);
	}
}

?>