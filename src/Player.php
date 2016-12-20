<?php
	/*
	* Player enthaelt Daten, gehoert zum Model
	*/
	class Player{
		private $location;
		private $name;
		private $email;
		private $inventory;
		
		function __construct($n,$em){
			$this->name = $n;
			$this->email = $em;
			$this->inventory = new Inventory();
		}
		
		public function getLocation(){
			return $this->location;
		}
		
		public function setLocation($l){
			return $this->location = $l;
		}
		
		public function getName(){
			return $this->name;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function getInventory(){
			return $this->inventory;
		}
	}
?>