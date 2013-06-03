<?php

require('..\classes\GamesMaster.php');
session_start();
if(isset($_GET['answer'])  ) {

	$answer = $_GET['answer'];
	 
	$_SESSION['game']->playGame($answer);

}