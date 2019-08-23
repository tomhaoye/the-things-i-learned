<?php
namespace bridge;

abstract class Person
{
	protected $_gender;
	protected $_trans;

	public function __construct($gender='', Trans $trans){
		$this->_gender = $gender;
		$this->_trans = $trans;
	}

	abstract public function to($des='');
}