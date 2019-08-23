<?php
namespace decorator;

class Series extends Decorator
{
	private $_series;

	public function __set($name='',$value='')
	{
		$this->$name = $value;
	}

	public function produce()
	{
		$this->_watch->produce();
		$this->decorator($this->_series);
	}

	public function decorator($value)
	{
		echo "which is $value series\n";
	}
}