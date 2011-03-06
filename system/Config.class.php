<?php
class Config
{
	private $data = null;
	
	public function __construct ($in_data=null)
	{
		if ($in_data == null)
			$this->data = ConfigLoader::load ();
		else
			$this->data = $in_data;
		
		// проверить обязательные поля 
	}
	
	public function get ($in_key)
	{
		return isset ($this->data[$in_key]) ? $this->data[$in_key] : null; 
	}
}

?>