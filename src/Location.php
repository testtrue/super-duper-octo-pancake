<?php
	/*
	* Location ist ein Ort auf der Karte
	*/
	class Location{
		private $name;
		private $items;
		private $actions;
		private $neighbors;
		private $riddle;
		
		function __construct($n,$i){
			$this->name = $n;
			$this->items = $i;
		}
		
		public function getName(){
			return $this->name;
		}
		
		public function getNeighbors(){
			return $this->neighbors;
		}
		
		public function getNeighbor($dir){
			if(isset($this->neighbors[$dir])){
				return $this->neighbors[$dir];
			}else{
				return false;
			}
		}
		
		public function setNeighbors($n){
			$this->neighbors = $n;
		}
		
		public function setActions($a){
			$this->actions = $a;
		}
		
		public function setRiddle($r){
			$this->riddles = $r;
		}
		
		public function removeItem($name){
			$t = $this->items[$name];
			
			$this->items[$name] = null;
			return $t;
		}
	}
?>