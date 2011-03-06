<?php

class PluginInfo
{
	protected $data = null;
	
	protected $def = array (
		'enable'	=> 0,
		'type'		=> 0,
		'classname'	=> Plugin,

	);
	
	public function __construct (array $in_values)
	{
		$this->data = $this->checkArray ($in_values);
	} 
	
	protected function checkArray (array $in_data)
	{
		foreach ($this->def as $key => $value)
			if (!isset ($in_data[$key]))
				$in_data[$key] = $value;
		
		return $in_data;
	}
	
	protected function createInfo (array $in_values)
	{
		
	}

	public function __get ($in_name)
	{
		if (array_key_exists ($in_name, $this->data))
			return $this->data[$in_name];
			
        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;			
	}
	
	public function __set ($in_name, $in_value)
	{
		$this->data[$in_name] = $in_value;
	}
	
	public function getClassName ()
	{
		return $this->data['classname'];
	}
	
	public function getPluginType ()
	{
		return $this->data['type'];
	}
	
	public function isEnable ()
	{
		if ($this->enable == null || $this->enable == 0)
			return false;
		return true;
	}

}

?>