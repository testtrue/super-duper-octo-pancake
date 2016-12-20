<?php
	class Model{
		private $player;
		private $location = [];
	
		function setPlayer(Player $p){
			$this->player = $p;
		}
	
		public function getPlayer(){
			if(isset($this->player)){
				return $this->player;
			}else{
				// Wenn der Player im Model nicht vorhanden ist, muss eine Fehlermeldung geworfen werden.
				throw new PlayerNotFoundException("Player not found");
			}
		}
	
		public function setLocation(array $l){
			$this->location = $l;
		}
	
		public function getLocation(){
			if(isset($this->location)){
				return $this->location;
			}else{
				// Wenn die Locations im Model nicht vorhanden sind, muss eine Fehlermeldung geworfen werden.
				throw new Exception("No Locations available");
			}
		}
	}
?>