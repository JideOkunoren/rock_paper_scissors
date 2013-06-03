<?php
require_once 'PHPUnit/Autoload.php';
require('../classes/Weapon.php');

class WeaponTest extends PHPUnit_Framework_TestCase {

	protected $w;

	function setUp(){

		$this->w = new Weapon('rock',array('paper','water'),'rock.gif');
	}
	function testGetName(){
		$this->assertEquals('rock', $this->w->getName());
	}
	function testGetWeakness(){
		$this->assertTrue($this->w->getWeakness('paper'));
		$this->assertFalse($this->w->getWeakness('doughnut'));
	}
	function testGetImage(){
		$this->assertEquals('rock.gif', $this->w->getImage());
	}
}