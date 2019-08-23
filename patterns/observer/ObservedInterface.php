<?php
namespace observer;

interface ObservedInterface
{
	public function attach(ObserverInterface $observer);

	public function detach(ObserverInterface $observer);

	public function notify();
}
