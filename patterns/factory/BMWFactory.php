<?php
namespace factory;

class BMWFactory implements Factory
{
	public function getCar()
	{
		return new BMW();
	}
}