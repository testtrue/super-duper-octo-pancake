<?php
	/*
	* Die Klasse Item repaesentiert ein Gegenstand
	*/
	class Item{
		private $name;
		private $actions;
		
		function __construct($n,$a){
			$this->name = $n;
		}
		
		public function getName(){
			return $this->name;
		}
	}
?>