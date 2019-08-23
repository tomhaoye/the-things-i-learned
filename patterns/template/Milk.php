<?php
namespace template;

class Milk extends Bottle
{
	public function init($format)
	{
		$this->format = $format;
	}

	public function fill()
	{
		echo "got a {$this->format} bottle,".$this->_intro."milk";
	}
}
