<?php
namespace template;

abstract class Bottle
{
	protected $format;
	
	protected $_intro = 'this is a bottle fill with ';

	public function __construct($format)
	{
		$this->init($format);
	}

	abstract public function init($format);

	abstract public function fill();
}