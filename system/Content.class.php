<?php

/**
 * Контент
 */
class Content
{
	protected $pages = array ();
	
	public function __construct ($in_pages)
	{
		//$this->pages = $in_pages;
		foreach ($in_pages as $value)
			$this->pages[$value->getBlock ()][$value->getOrder ()] = $value;
		
	} 
	
	public function isBlock ($in_block)
	{
		return isset ($this->pages[$in_block]) ? true : false;
	}
	
	public function getBlock ($in_block)
	{
		if ($this->isBlock ($in_block))
			foreach ($this->pages[$in_block] as $value )
				echo $value->getSrc ();
		else
			echo "";
	}
}
?>