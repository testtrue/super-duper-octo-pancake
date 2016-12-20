<?php
	define ('BASEPATH', realpath(dirname(__FILE__)));
	define ('DIRECTION_SEPERATOR',',');
	define ('FILE_SEPERATOR',';');
	define ('STARTPOINT','Holm');
	
	require_once (BASEPATH.DIRECTORY_SEPARATOR.'vendor' .DIRECTORY_SEPARATOR.'autoload.php');
	require_once (BASEPATH.DIRECTORY_SEPARATOR.'vendor' .DIRECTORY_SEPARATOR.'Initialisation.php');
	
	if(!isset($_SESSION)){
		session_start();
	}
	
	$model;
	$gc;
	$out ="";
	
	if(!isset($_SESSION["data"])){
		$locArray = [];
		$locArray = getLocations();
		
		$player = new Player("Le Me","leMe@live.com");
		$player->setLocation($locArray[resolveLocName(STARTPOINT)]->getName());
		$model = new Model();
		$model->setPlayer($player);
		$model->setLocation($locArray);
	}else{
		$model = $_SESSION["data"];
	}
	
	$gc = new GameController($model);
	
	if(isset($_POST["text"])){
		$text = $_POST["text"];
		$out = $gc->executeAction($text);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Flensburg City Game</title>
	</head>
	<body>
		<form method="POST">
			<input type="text" name="text"/>
		</form>
		<p>
			<?php
				echo $out."<br>";
				try{
					echo 'You are at '.$model->getPlayer()->getLocation();
				}catch(PlayerNotFoundException $pnfe){
					$pnfe->getExceptionMessage();
				}
				
			?>
		</p>
	</body>
</html>
<?php
	$_SESSION["data"] = $model;
?>