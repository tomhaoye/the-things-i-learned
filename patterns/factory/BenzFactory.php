<?php
namespace factory;

class BenzFactory implements Factory
{
	public function getCar()
	{
		return new Benz();
	}
}