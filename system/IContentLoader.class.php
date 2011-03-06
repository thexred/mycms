<?php
interface IContentLoader
{
	/**
	 * Загрузить описание страницы по уникальному идентификатору
	 * @param $in_id
	 * @return unknown_type
	 */
	public function getPageById ($in_id);
	
	/**
	 * Получить идентификаторы страниц, привязанные к текущей
	 * @param $in_id
	 * @return unknown_type
	 */
	public function getLinkedPagesId ($in_id);
	
	/**
	 * Загрузить все страницы связанные с указанной страницей 
	 * @param $in_id
	 * @return unknown_type
	 */
	//public function getLinkedPagesInfoById ($in_id);
}
?>