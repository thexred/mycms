<?php

class ScriptLoader
{
	const TYPE_DYNAMIC 	= 1;
	const TYPE_STATIC 	= 2;
	
	protected $data = null;
	protected $type = self::TYPE_DYNAMIC;
	
	public function __construct ($in_type = self::TYPE_DYNAMIC)
	{
		$this->type = $in_type;
	}
	
	public function load ($in_path, $in_url)
	{
		switch ($this->type)
		{
			case self::TYPE_DYNAMIC:
				$this->loadDynamic ($in_url);
			break;
			case self::TYPE_STATIC:
				$this->loadStatic ($in_path);
			break;
		}
	}
	
	public function loadStatic ($in_path)
	{
		$this->addContent (file_get_contents ($in_path));
	}
	
	protected function addContent ($in_content)
	{
		$this->data .= "\n" . $in_content;
	}
	
	public function loadDynamic ($in_path)
	{
	}
	
	public function getContent ()
	{
	}
	
	
	public function addVar ($in_var, $in_val)
	{
	}
}