<?php
namespace facade;

class Animal
{
	private $_bee;
	private $_fox;

	public function __construct(){
		$this->_bee = new Bee();
		$this->_fox = new Fox();
	}

	public function produceBee(){
		$this->_bee->produce();
	}

	public function produceFox(){
		$this->_fox->produce();
	}
}
