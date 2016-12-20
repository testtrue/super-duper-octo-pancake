<?php
	/*
	 * Initialisation helper
	 */
	
	function getLocations(){
		$locations = file('src'.DIRECTORY_SEPARATOR.'locations.csv');
		$transitions = file('src'.DIRECTORY_SEPARATOR.'transitions.csv');
		$actions = file('src'.DIRECTORY_SEPARATOR.'actions.csv');
		
		for($i = 1; $i<count($locations);$i++){
			$locArray = Array();
			$templ = split(FILE_SEPERATOR,$locations[$i]);
			$name = $templ[1];
			$locArray[resolveLocName($name)] = new Location($name,$templ[5]);
			$neighbors = [];
			//$n = split(DIRECTION_SEPERATOR,$temp[3]);
			for($j = 1;$j < count($transitions);$j++){
				$tempt = $transitions[$j];
				$dir = split(FILE_SEPERATOR,$tempt);
				if($name === $dir[1]){
					/*
					 * Hier muss nach einer Richtung gesucht werden in $dir[2] und zurückgegeben werden
					 */
					if($dirName = getDirection($dir[2])){
						//echo $dirName;
						//var_dump($dir);
						$neighbors[$dirName] = resolveLocName($dir[3]);	
					}	
				}
			}
			$locArray[resolveLocName($name)]->setNeighbors($neighbors);
		}
		return $locArray;
	}
	
	function resolveLocName($s){
		return strtolower(trim($s));
	}
	
	function getDirection($s){
		$matches = Array();
		preg_match('(north|south|east|west)',$s,$matches);
		return implode($matches);
	}
?>