<?php
	/*
	* 
	*/
	class Riddle{
		private $quest;
		private $targetItem;
		private $answer;
		private $id;
		
		function __construct($q,$ti,$a){
			$this->quest = $q;
			$this->targetItem = $ti;
			$this->answer = $a;
			// id incrementieren
		}
		
		// checkAnswer is the anwser of the Player of the riddle
		// return true if answer is right
		// return false if answer is wrong
		public function isSolved((String)$checkAnswer){
			return $checkAnswer === $this->answer;
		}
		
		public function getQuest(){
			return $this->quest;
		}
	}
?>