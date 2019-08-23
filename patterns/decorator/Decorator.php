<?php
namespace decorator;

abstract class Decorator
{
	protected $_watch;

	public function __construct(WatchInterface $watch)
	{
		$this->_watch = $watch;
	}

	abstract public function decorator($value);

}