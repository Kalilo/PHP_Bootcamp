<?php
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
	}
	.log
	{
		align: left;
		color: white;
		border: 1px solid white;
		width: 47%;
		height: 100%;
		display: inline-block;
		margin: 1%;
	}
	.interface
	{
		align: right;
		color: white;
		border: 1px solid white;
		height: 100%;
		width: 47%;
		display: inline-block;
		margin: 1%;
	}
	.container
	{
		color: white;
		height: 400px;
	}
</style>
<body>

<div class="map">

</div>
<div class="container">
	<div class="log">
		<div align="middle">
			Log
			<hr />
		</div>
	</div>
	<div class="interface">
		<div align="middle">
			Interface
			<hr />
			<form method = "get" action = "<?php echo $_SERVER['PHP_SELF']; ?>" name = "index.php">
			<tr>
			   <th>
				   <pre>Username: </pre>
			   </th>
			   <th>
				   <input type = "text" name = "login" value = "<?php echo $_SESSION['user'] ?>">
			   </th>
			</tr>
			<br/>
			<tr>
			   <th>
				   <pre>Password: </pre>
			   </th>
			   <th>
				   <input type = "password" name = "passwd" value = "<?php echo $_SESSION['pass'] ?>">
			   </th>
			</tr>
			<br/>
			<br/>
			<input type = "submit" name = "submit" value = " OK ">
		  	<br/>
			</form>
		</div>	
	</div>
</div>

</body>
</html>

