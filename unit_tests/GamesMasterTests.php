<?php
require_once 'PHPUnit/Autoload.php';
require('../GamesMaster.php');

class GamesMasterTest extends PHPUnit_Framework_TestCase {
	
	protected $gm;
	protected $player ;
	protected $robot_player;
	
	function setUp(){
		$rock = new Weapon('rock',array('paper'),'rock.gif');		 
		$paper = new Weapon('paper',array('scissors'),'paper.png');
		$scissors  = new Weapon('scissors',array('rock'),'scissors.jpg');
		
		$weapons = array('rock'=>$rock,'paper'=> $paper,'scissors'=> $scissors);
		$this->gm  = new GamesMaster('You', 'hal2000',$weapons,'src = "images/');
	 
		$this->player = new Player('human',$weapons);
		$this->robot_player = new RobotPlayer('computer',$weapons);		
	}
	
	 
	
	function testGamePlay(){
		
		$rock = new Weapon('rock',array('paper'));		 
		$paper = new Weapon('paper',array('scissors'));
		$scissors  = new Weapon('scissors',array('rock'));
		
		$weapons = array('rock'=>$rock,'paper'=> $paper,'scissors'=> $scissors);
		
		
		$this->assertEquals('rock',$this->gm->fight('rock'));
		$this->assertTrue($rock->getWeakness('paper'));
		$this->assertFalse($paper->getWeakness('butter'));
		
		//simulate live gameplay
		$robot_answer = 'paper';
		$player_answer = 'rock';
		$random_answer = 'scissors';
	}
	
	 
}