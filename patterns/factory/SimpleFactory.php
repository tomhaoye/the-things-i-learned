<?php
namespace factory;

class SimpleFactory
{
	public static function getCar($type)
	{
		switch ($type) {
			case 'bmw':
				$car = new BMW();
				break;
			case 'benz':
				$car = new Benz();
				break;
			default:
				$car = null;
				break;
		}
		return $car;
	}
}