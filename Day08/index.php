<?php
require_once("Obstacles.class.php");
require_once("HandOfTheEmpiror.class.php");
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

function makemap()
{
	$map;
	for ($x = 0; $x < 150; $x++)
		for ($y = 0; $y < 100; $y++)
			$map[$x][$y] = '.';

	return ($map);

}

function placeship($positions, $map, $char)
{
	foreach ($positions as $coords)
	{
		$map[$coords['x']][$coords['y']] = $char;
	}
	return ($map);
}

function  maptostring($map)
{
	$mapstring = ' ';
	for ($y = 0; $y < 100; $y++)
	{
		for ($x = 0; $x < 150; $x++)
			$mapstring = $mapstring . $map[$x][$y];
		$mapstring = $mapstring . PHP_EOL;
	}
	return ($mapstring);
}

//if ($_SESSION['map'] == NULL)
	$map = makemap();

$time = '[' . date("h-m-s") . ']:';
$_SESSION['turno'] = $_SESSION['turno'] + 1;
$_SESSION['log']  = " Turn {$_SESSION['turno']} -------------------------------------------------------------------------- " . "</br>" . $_SESSION['log'];
$_SESSION['log']  = "$time Commander! We're trying out new equipment! Stand by!" . "</br>" . $_SESSION['log'];
//$_SESSION['map']  = file_get_contents("map.txt");
$_SESSION['turn'] = (($_SESSION['turn'] + 1) % 2);
if ($_SESSION['p1s'] == NULL)
	$_SESSION['p1s'] = new HandOfTheEmpiror(array('x' => rand() % 150, 'y' => rand() % 150));
if ($_SESSION['p2s'] == NULL)
	$_SESSION['p2s'] = new HandOfTheEmpiror(array('x' => rand() % 150, 'y' => rand() % 150));
$turn = $_SESSION['turn'] + 1;
$player = "p".$turn."s";
$_SESSION['log']  = "$time Commander! It's player {$turn}'s turn! BRACE FOR IMPACT!" . "</br>" . $_SESSION['log'];
if ($_GET['charge'] > 0)
	$_SESSION['log']  = "$time Commander! Directive Recieved! {$_GET['charge']} power to Weapons!" . "</br>" . $_SESSION['log'];


//after actions


//$_SESSION['map'] = placeship($_SESSION['p1s']->getCoords(), $map, 'X');
//$_SESSION['map'] = placeship($_SESSION['p2s']->getCoords(), $_SESSION['map'], 'Z');
$_SESSION['map'] = placeship($_SESSION['p1s']->getCoords(), $map, 'X');
$_SESSION['map'] = placeship($_SESSION['p2s']->getCoords(), $_SESSION['map'], 'Z');
//var_dump($_SESSION['p2s']);
//var_dump($_SESSION['p1s']);

$map = maptostring($_SESSION['map']);;
?>

<!DOCTYPE html>
<html>
<title>AWESOME BATTLESHIP BATTLES</title>
<style>
	body
	{
		color: white;
		background: black;
	}
	.map
	{
		align: middle;
		height: 500px;
		width:  50%;
		border: 1px solid white;
		color: white;
		overflow-y: scroll;
		text-align: center;
	}
	.log
	{
		align: left;
		color: white;
		border: 1px solid white;
		width: 47.5%;
		height: 100%;
		display: inline-block;
		margin: 1%;
		vertical-align: top;
		overflow-y: scroll;
	}
	.interface
	{
		align: right;
		color: white;
		border: 1px solid white;
		height: 100%;
		width: 47.5%;
		display: inline-block;
		margin: 1%;
		vertical-align: top
	}
	.container
	{
		color: white;
		height: 400px;
	}
	.input
	{
 	display: inline-block;
	column-count: 3;
	padding: 10px;
	}
	form
	{
		column-span: 1;
	}
</style>
<body>

<div class="map"><?=$map?></div>
<div class="container">
	<div class="log">
		<div align="middle">
			Log
			<hr />
			</div>
		<div align="left"><?=$_SESSION['log']?></div>
	</div>
	<div class="interface"  align="middle">
		Interface
		<hr />
		<div class="input" >
			<form align="left" method = "get" action = "<?php echo $_SERVER['PHP_SELF']; ?>" name = "index.php">

				   <div>Ship Name  =</br>  <?php echo $_SESSION[$player] ?></div>
				   </br></br>
				   <div>Hullpoints =  </br> Spend PP for a chance to Repair:</br><input type = "number" name = "passwd" value = "<?php echo $_SESSION['pass'] ?>"></div>
				   </br></br>
				   <div>Hullpoints 2 : <input type = "number" name = "passwd" value = "<?php echo $_SESSION['pass'] ?>"></div>
				   
				   
				   </br></br>
				   <div>Hullpoints 3: <input type = "number" name = "passwd" value = "<?php echo $_SESSION['pass'] ?>"></div>
				   
				   
				   </br></br>
				   <div>Hullpoints 4: <input type = "number" name = "passwd" value = "<?php echo $_SESSION['pass'] ?>"></div>
				   
				   
				   </br>
				   <div>Speed =  </br>Spend Power Points to move further:</br><input type = "number" name = "passwd" value = "<?php echo $_SESSION['pass'] ?>"></div>
				   
				   
				   </br></br>
				   <div>Shields: </br><input type = "number" name = "passwd" value = "<?php echo $_SESSION['pass'] ?>"></div>
				   
				   
				   </br></br>
				   <div>Handling: <input type = "number" name = "passwd" value = "<?php echo $_SESSION['pass'] ?>"></div>
				   
				   
				   </br></br>
				   <div>Engine Points: <input type = "number" name = "passwd" value = "<?php echo $_SESSION['pass'] ?>"></div>
				   
				   
				   </br></br>
				   <div>Ship Character: <input type = "number" name = "passwd" value = "<?php echo $_SESSION['pass'] ?>"></div>
				   
				   
				   </br></br>
				   <div>Ship Position: <input type = "number" name = "passwd" value = "<?php echo $_SESSION['pass'] ?>"></div>
				   
				   
				   </br></br>
				   <div>Weapon (NAME)</div>
				   <div>Short Range  = </div>
				   <div>Medium Range = </div>
				   <div>Long Range   = </br> Spend Power Points to fire:</div>
				   <input type = "number" name = "charge" value = "<?php echo $_SESSION['pass'] ?>">
				   </br>
				   </br>
				   <input type = "submit" name = "submit" value = " Execute Orders! ">
			</form>
			</div>
		</div>	
	</div>
</div>

</body>
</html>