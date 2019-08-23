<?php
namespace bridge;

class ByCar implements Trans
{
	public function to($des='')
	{
		echo "go to $des by car";
	}
}