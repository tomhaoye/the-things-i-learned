<?php
namespace responsibility;

class Headman extends Leader
{
	 public function apply(Application $apply)
	 {
	 	if(isset($this->_leader)){
	 		$this->_leader->apply($apply);
	 	}else{
	 		echo $apply->why, $apply->when, $apply->what . "\n";
	 		echo $this->_name."批准\n";
	 	}
	 }
}
