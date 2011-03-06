<?php
/**
 * Обработка входящих запросов, проверят обязательные поля
 *  
 */
class RequestFactory
{
	const FIELD_PAGE	= "page";	// идентификатор страницы для загрузки
	const DEFAULT_PAGE_ID = 0;		// идентификатор страницы по умолчанию
	
	/**
	 * Обработка запроса 
	 * @param array $in_request $_REQUEST
	 * @return Request объект с данными
	 */
	static public function create ($in_request)
	{
		$page_id = isset ($in_request[self::FIELD_PAGE]) ? $in_request[self::FIELD_PAGE] : self::DEFAULT_PAGE_ID;  
		
		return new Request ($in_request, $page_id);  
	}
	
	static public function createPageLink ($in_pageId)
	{
		return "index.php?" . self::FIELD_PAGE . "=$in_pageId";
	} 
}
