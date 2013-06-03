<?php

require('Player.php');
require('RobotPlayer.php');
require('Weapon.php');
 
class GamesMaster {

	protected $max_points = 3;
	protected $player;
	protected $robot_player;
	protected $weapons;
	public 	$images_path;
	public 	$answer_path;
	public 	$reload_path;
	protected $game_status;
	protected $game_counter ;
	protected $game_title;

	public function __construct($player1Name ='player 1' , $player2Name = 'player 2', $weapons_chest = array(), 
															$images = null, $max_points = 3,$answer_path,$reload_path = null){
		$this->max_points = $max_points;
		$this->images_path = $images;
		$this->answer_path = $answer_path;
		$this->reload_path = $reload_path;
		$this->weapons = $weapons_chest;
		$this->player = new Player($player1Name , $weapons_chest);
		$this->robot_player = new RobotPlayer($player2Name , $weapons_chest);

		//present weapons & set up game title
		$game_title = 'You\'re playing ';
		$display = '<div id = "weapons"><ul>';

		foreach ($this->weapons as $w) {
			$display .= '<li><a class = "attack" href = "'.$this->answer_path.''.$w->getName().'">
							<img class = "images " '.$this->images_path.$w->getImage().' "/></a></li>';
			$game_title .= ucfirst($w->getName() ) .'! ';
		}
		$display.= '</ul></div>';
		$this->game_title = $game_title;
		echo $display;
	}

	public function getGameTitle(){
		return $this->game_title;
	}

	public function playGame($player){
		if(($this->player->getScore() !=$this->max_points ) &&  ($this->robot_player->getScore() !=$this->max_points) ){
			$this->fight($player);
			$this->game_counter++;
			echo $this->getScores();
		}
	}

	public function fight($player){
			
		if( $player_strike = $this->player->attack($player) ){
			$robot_strike = $this->robot_player->attack();
			echo '<div id = "gameplay"><p id = "player1" class = "player">'
			.$this->player->getPlayerName().' played ' .$player. '
  				 <img class = "images"  '.$this->images_path.'/'.$player_strike->getImage().'"/></p>
                 <p  id = "player2" class = "player"> '.
			$this->robot_player->getPlayerName() .' played ' .$robot_strike->getName() .'
                <img class = "images" '.$this->images_path.'/'.$robot_strike->getImage().'"/></p></div>'; 		  

			if($player_strike->getWeakness($robot_strike->getName())){

				$this->robot_player->addPoint();
				echo  '<div id = "status" class = "update"> '. $this->robot_player->getPlayerName() .'  scored</p>';

			} else if ($robot_strike->getWeakness($player_strike->getName())) {
				$this->player->addPoint();
				echo '<p class = "update"> '. $this->player->getPlayerName() .' scored</p>';
			}
			else {
				echo '<p class = "update">Draw - keep playing !</p>';
			}
		} else {
			echo "<p class = \"error\">$player is not a recognised weapon !";
		}
	}

	public function getScores(){

		$game_scores = ' <p>'.$this->player->getPlayerName().': ';
		$game_scores .= $this->player->getScore();
		$game_scores .= ' points</p><p>' .$this->robot_player->getPlayerName() .': ';
		$game_scores .= $this->robot_player->getScore();
		$game_scores .=' points</p>';

		if ( ($this->player->getScore() == $this->max_points)
		|| ($this->robot_player->getScore() == $this->max_points)) {

			if($this->player->getScore() > $this->robot_player->getScore()){

				$winner = $this->player->getPlayerName();
			} else {
				$winner = $this->robot_player->getPlayerName();
			}
			$game_status  = $game_scores;
			return $game_status  .= '<p id = "finished">Game Over - '.$winner . ' won the game in  ' .$this->game_counter. ' rounds  !
 	 														<br/><a id = "reload" href = " '.$this->reload_path.' ">Click here</a> to play a new game</p>';

		}    else { 
			return $game_scores;
		}
	}
}