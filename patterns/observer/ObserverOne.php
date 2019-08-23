<?php
namespace observer;

class ObserverOne implements ObserverInterface
{
	public function do()
	{
		echo 'observer one has been notify';
	}
}