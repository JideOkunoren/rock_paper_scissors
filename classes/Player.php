<?php
class Player {

	protected $playerName;
	protected $score = 0;
	public  $weapons = array();

	public function __construct($playerName, $weaponChest){
		$this->playerName = $playerName;
		$this->weapons = $weaponChest;
	}
	public function getPlayerName(){
		return $this->playerName;
	}
	public function attack($weapon){
		if(isset($this->weapons[$weapon])) {
			return	$w =  $this->weapons[$weapon];
		}
	}
	public function addPoint(){
		$this->score += 1;
	}
	public function getScore(){
		return $this->score;
	}
}