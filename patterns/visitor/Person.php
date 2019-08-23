<?php
namespace visitor;

class Person implements AnimalInterface
{
	public function eat(Visitor $visitor)
	{
		$visitor->eat();
	}
}