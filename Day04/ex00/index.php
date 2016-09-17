<?php
	//var_dump($_GET);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>form.php</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<h1>Login Session</h1>
		<div id="login">
		<h2>Login</h2>
		<form action="" method="post">
			<label>Username :</label>
			<input id="name" name="login" placeholder="username" type="text">
			<br/>
			<label>Password :</label>
			<input id="passwd" name="passwd" placeholder="**********" type="password">
			<input name="submit" type="submit" value=" OK ">
			<span><?php echo $error; ?></span>
		</form>
		</div>
		</div>
	</body>
</html>