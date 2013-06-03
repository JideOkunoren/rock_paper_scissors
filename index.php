<?php
session_start();
require('classes/GamesMaster.php');
$rock = new Weapon('rock',array('paper'),'rock.gif');
$paper = new Weapon('paper',array('scissors'),'paper.png');
$scissors  = new Weapon('scissors',array('rock'),'scissors.jpg');

$weapons = array('rock'=>$rock,'paper'=> $paper,'scissors'=> $scissors);
$gm = new GamesMaster('You', 'hal 9000',$weapons, 'src = "public/images/',3,
													'public/answer.php?answer=', 'index.php');

echo '<h1 id = "game_title">'.$gm->getGameTitle().'</h1>';

$_SESSION['game'] = $gm;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $gm->getGameTitle();?></title>
<link href="public/rps_style.css" rel="stylesheet">


<body>
	<div id="main">
	<br/>
		<div id="results"></div>
	</div>
</body>
<script type="text/javascript" src="public/jquery-1.4.min.js"></script>
<script type="text/javascript" src="public/rps_script.js"></script>
</html>
