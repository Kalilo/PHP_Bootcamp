<?php
	session_start();

	//if not null, get session username; printf()
	$username = ($_SESSION['username'] != NULL) ? $_SESSION['username'] : "Enter username";
	$password = ($_SESSION['password'] != NULL) ? $_SESSION['password'] : "Enter password";
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
		<form name="index.php" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
		<tr>
			<td>
				<label>Username : </label>
			</td>
			<td>
				<input id="name" name="login" placeholder="<?=$username?>" type="text">
			</td>
		</tr>
			<br/>
		<tr>
			<td>
				<label>Password :</label>
			</td>
			<td>
				<input id="passwd" name="passwd" placeholder="<?=$password?>" type="password">
			</td>
		</tr>
			<td>
				<input name="submit" type="submit" value=" OK ">
			</td>
		</tr>
			<span><?php echo $error; ?></span>
		</form>
		</div>
		</div>
	</body>
</html>