<?php
namespace visitor;

interface AnimalInterface
{
	public function eat(Visitor $visitor);
}
