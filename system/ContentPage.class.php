<?php
class ContentPage
{
	public $id 		= null;	// идентификатор
	public $block	= null;	// блок размещения
	public $order	= null;	// порядок размещения в блоке
	public $src		= null;	// исходник страницы
	public $srcPath	= null;	// путь к исходникам, если задан
	
	public function __construct ($in_id, $in_order, $in_srcPath, $in_block, $in_src=null)
	{
		$this->id = $in_id;
		$this->order = $in_order;
		$this->srcPath = $in_srcPath;
		$this->block = $in_block;
		$this->setSrc ($in_src);
	}
	
	public function setSrc ($in_src)
	{
		$this->src = $in_src;
	}
	
	public function getId ()
	{
		return $this->id;
	}
	
	public function getOrder ()
	{
		return $this->order;
	}
	
	public function getSrcPath ()
	{
		return $this->srcPath;
	}
	
	public function getSrc ()
	{
		return $this->src;
	}
	
	public function getBlock ()
	{
		return $this->block;
	}
	
}