<?php
namespace visitor;

class VisitorOne implements Visitor
{
	public function eat()
	{
		echo "i only eat meat\n";
	}
}