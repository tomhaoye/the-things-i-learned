<?php
namespace visitor;

class VisitorTwo implements Visitor
{
	public function eat()
	{
		echo "i only eat rice\n";
	}
}