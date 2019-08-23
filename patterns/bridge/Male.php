<?php
namespace bridge;

class Male extends Person
{
	public function to($des='')
	{
		$this->_trans->to($des);
	}
}
