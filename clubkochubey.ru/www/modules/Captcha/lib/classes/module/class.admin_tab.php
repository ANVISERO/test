<?php

class AdminTab
{
	var $name;
	
	var $title;
	
	var $start;
	
	var $content;
	
	var $end;
	
	var $errors;
	
	var $messages;
	
	function AdminTab($name, $title, $content='')
	{
		$this->setName($name);
		$this->setTitle($title);
		$this->setContent($content);
		$this->setErrors(array());
		$this->setMessages(array());
		$this->start = '';
		$this->end = '';
	}
	
	function setName($name)
	{
		$this->name = $name;
	}
	function getName()
	{
		return $this->name;
	}
	
	function setTitle($title)
	{
		$this->title = $title;
	}
	function getTitle()
	{
		return $this->title;
	}
	
	function setContent($content)
	{
		$this->content = $content;
	}
	function getContent()
	{
		return $this->content;
	}
	
	/**
	* @param array
	*/
	function setMessages($array)
	{
		$this->messages = $array;
	}
	
	/**
	* @return array
	*/
	function getMessages()
	{
		return $this->messages;
	}
	
	/**
	* @param array
	*/
	function setErrors($array)
	{
		$this->errors = $array;
	}
	
	/**
	* @return array
	*/
	function getErrors()
	{
		return $this->errors;
	}
	
	/**
	* @param string
	*/
	function addMessage($msg)
	{
		$this->messages[] = $msg;
	}
	
	/**
	* @param string
	*/
	function addError($error_msg)
	{
		$this->errors[] = $error_msg;
	}
}

?>