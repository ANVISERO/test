<?php

class CaptchaLibOption
{
	var $name;
	
	var $type;
	
	var $default;
	
	function CaptchalibOption($name, $type, $default)
	{
		$this->setName($name);
		$this->setType($type);
		$this->setDefault($default);
	}
	
	function setName($name)
	{
		$this->name = $name;
	}
	
	function getName()
	{
		return $this->name;
	}
	
	function setType($type)
	{
		$this->type = $type;
	}
	
	function getType()
	{
		return $this->type;
	}
	
	function setDefault($value)
	{
		$this->default = $value;
	}
	
	function getDefault()
	{
		return $this->default;
	}
	
}

?>