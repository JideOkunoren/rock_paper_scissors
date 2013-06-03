<?php
require_once 'PHPUnit/Autoload.php';


require('../classes/Player.php');
require('../classes/RobotPlayer.php');
require('../classes/Weapon.php');

class PlayerTest extends PHPUnit_Framework_TestCase {

	function setUp(){
		$rock = new Weapon('rock',array('paper'),'rock.gif');
		$paper = new Weapon('paper',array('scissors'),'paper.png');
		$scissors  = new Weapon('scissors',array('rock'),'scissors.jpg');

		$weapons = array('rock' => $rock,'paper'=> $paper,'scissors'=> $scissors);
		$this->player = new Player('human',$weapons);
		$this->robot_player = new RobotPlayer('computer',$weapons);

	}
	function testPlayerName(){

		$this->assertEquals('human',$this->player->getPlayerName());
		$this->assertEquals('computer',$this->robot_player->getPlayerName());
	}
	
	function testPlayerAttack(){
		
		$rock = new Weapon('rock',array('paper','spock'),'rock.gif'); 
		$spock  = new Weapon('spock',array('paper','lizard'),'vulcan.jpg');
		$lizard  = new Weapon('lizard',array('paper'),'vulcan.jpg');
		
		$weapon = array('rock' => $rock,'spock' =>$spock,'lizard' =>$lizard);
		$this->player->weapons = $weapon;
		
		$this->assertEquals($rock,$this->player->attack('rock'));
		$this->assertEquals($lizard,$this->player->attack('lizard'));
	}
	
	function testRobotAttack(){
		
		$rock = new Weapon('rock',array('paper','spock'),'rock.gif'); 
		$spock  = new Weapon('spock',array('paper','lizard'),'vulcan.jpg');
		$lizard  = new Weapon('lizard',array('paper'),'vulcan.jpg');
		
		$weapon = array('rock' => $rock);
		$this->robot_player->weapons = $weapon;
		$this->assertEquals($rock,$this->robot_player->attack());
		$weapon = array('spock' => $spock);
		$this->robot_player->weapons = $weapon;
		$this->assertEquals($spock,$this->robot_player->attack());
		
	}
	function testPlayerScore(){

		$this->assertLessThan(1, $this->player->getScore());
		$this->player->addPoint();
		$this->assertGreaterThan(0, $this->player->getScore());
		$this->player->addPoint();
		$this->assertGreaterThan(1, $this->player->getScore());
	}
 
}