<?php
namespace prototype;

class Prototype extends PrototypeAbstract
{
	public function __construct($name='')
	{
		$this->_name = $name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

	public function getName()
	{
		echo $this->_name;
	}

	public function getPrototype()
	{
		return clone $this;
	}
}