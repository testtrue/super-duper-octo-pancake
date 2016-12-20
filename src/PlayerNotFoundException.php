<?php
	class PlayerNotFoundException extends Exception{
		
		function getExceptionMessage(){
			echo "Error: ".$this->getMessage();
		}
		
	}
?>