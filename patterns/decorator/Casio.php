<?php
namespace decorator;

class Casio implements WatchInterface
{
	public function produce()
	{
		echo "produce a casio watch\n";
	}
}
