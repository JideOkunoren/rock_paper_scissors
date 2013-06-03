<?php
class Weapon {

	protected $name;
	protected $weaknesses = array();
	protected $image;

	public function __construct($name,$weaknesses,$image = null ){
		$this->name = $name;
		$this->weaknesses = $weaknesses;
		$this->image = $image;
	}

	public function getName(){
		return $this->name;
	}

	public function getImage(){
		if(isset($this->image)) {
			return $this->image;
		}
	}

	public function getWeakness($w){
		if(in_array($w ,$this->weaknesses)) {
			return true;
		} else {
			return false;
		}
	}
}