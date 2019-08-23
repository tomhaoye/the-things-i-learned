<?php
namespace observer;

class Observed implements ObservedInterface
{
	private $_observers = [];

	public function attach(ObserverInterface $observer)
	{
		if(!in_array($observer, $this->_observers)){
			$this->_observers[] = $observer;
		}
	}

	public function detach(ObserverInterface $observer)
	{
		foreach ($this->_observers as $key => $value) {
			if($value == $observer) unset($this->_observers[$key]);
		}
	}

	public function notify()
	{
		foreach ($this->_observers as $key => $value) {
			$value->do();
		}
	}
}