<?php
	/*
	* Hier werden die Spielaktionen gesteuert
	*/
	class GameController{
		private $model;
		
		function __construct($m){
			$this->model = $m;
		}
		
		public function executeAction($text){
			$s = "";
			$posDir = "north|south|east|west";
			if(preg_match("/.*go.*/",$text)){
				$m = [];
				if(preg_match("/.*go (".$posDir.").*/",$text,$m)){
					try{
						if($l = $this->movePlayer($this->model->getplayer(),$this->model->getLocation(),$m[1])){
							$s= "You moved to ".$l;
						}else{
							$s= "You can not move!!!";
						}
					}catch(PlayerNotFoundException $e){
						echo $e->getExceptionMessage();
					}
				}else{
					$s= "Idk how to move that way";
				}
			}else if(preg_match("/.*look.*/",$text)){
				if(preg_match("/.*look (".$posDir.").*/",$text,$m)){
					if($v = $this->lookInDirection($this->model->getplayer(),$this->model->getLocation(),$m[1])){
						$s= "You looking to ".$m[1].". You see the ".$v;
					}else{
						$s= "There is a facade";
					}
				}else{
					$s= "Idk where to look";
				}
			}else{
				$s= "Dunno what to do";
			}
			return $s;
		}
		
		/*
		*	$player: object of Player
		*	$map: array contains Locations
		*	$direction: north, south, etc.
		*/
		public function movePlayer(Player $player,$map, $direction){
			if($l = $map[strtolower($player->getLocation())]->getNeighbor($direction)){
				$r = $player->setLocation($l);
				$this->model->setPlayer($player);
				return $r;
			}
			return false;
		}
		
		public function lookInDirection(Player $player,$map,$direction){
			if($l = $map[strtolower($player->getLocation())]->getNeighbor($direction)){
				return $l;
			}else{
				return false;
			}
		}
		
		public function addItemToPlayer(Item $i,Player $p){
			echo "add ".$i->getName()." to ".$p->getName();
		}
	}
?>