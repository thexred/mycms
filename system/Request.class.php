<?php
class Request
{
	private $request = null;
	private $pageId = null;
	
	public function __construct ($in_request, $in_pageId)
	{
		$this->request = $in_request;
		$this->pageId = $in_pageId;
	}

	public function getPageId ()
	{
		return $this->pageId;
	}
}
?>