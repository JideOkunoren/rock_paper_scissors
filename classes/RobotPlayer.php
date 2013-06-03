<?php
class RobotPlayer extends Player {

	public function attack($attack = null){
		$w = array_rand($this->weapons, 1);
		return $w =  $this->weapons[$w];
	}
}