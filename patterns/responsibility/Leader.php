<?php
namespace responsibility;

abstract class Leader
{
	protected $_name;
	protected $_leader;

	public function __construct($name)
	{
		$this->_name = $name;
	}

	public function setLeader(Leader $leader)
	{
		$this->_leader = $leader;
	}

	abstract public function apply(Application $apply);
}