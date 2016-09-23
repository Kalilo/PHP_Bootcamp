<?php

session_start();
$time = '[' . date("h-m-s") . ']:';
$_SESSION['log'] = "$time Commander! We're trying out new equipment! Stand by!" . "</br>" . $_SESSION['log'];
$_SESSION['log'] = "$time Commander! Our commincations uplink has been struck! We're cut off from central. (No log found)" . "</br>" . $_SESSION['log'];
$_SESSION['map'] = file_get_contents("map.txt");

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
		height: 500px;
		width:  100%;
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
	width: 40%;
	}
</style>
<body>

<div class="map">
<?=$_SESSION['map']?>
</div>
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
			<td>
			<form align="left" method = "get" action = "<?php echo $_SERVER['PHP_SELF']; ?>" name = "index.php">
			<tr>
			   <th>
				   <pre>Ship Name: </pre>
			   </th>
			   <th>
				   <input type = "text" name = "login" value = "<?php echo $_SESSION['user'] ?>">
			   </th>
			</tr>
			<br/>
			<tr>
			   <th>
				   <pre>Hullpoints: </pre>
			   </th>
			   <th>
				   <input type = "text" name = "passwd" value = "<?php echo $_SESSION['pass'] ?>">
			   </th>
			</tr>
			<br/>
			<br/>
			<input type = "submit" name = "submit" value = " End Turn ">
		  	<br/>
			</td>
			<td>
			</td>
			</form>
			</div>
		</div>	
	</div>
</div>

</body>
</html>

