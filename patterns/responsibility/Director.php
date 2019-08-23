<?php
namespace responsibility;

class Director extends Leader
{
	public function apply(Application $apply)
	 {
	 	if(isset($this->_leader)){
	 		$this->_leader->apply($apply);
	 	}else{
	 		echo $apply->why, $apply->when, $apply->what . "\n";
	 		echo $this->_name."驳回\n";
	 	}
	 }
}