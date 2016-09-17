<?php
	 $username = ($_GET['login'] != NULL) ? $_GET['login'] : "enterusername";
	 $u = ($_GET['login'] != NULL) ? $username : NULL;
	 $password = ($_GET['passwd'] != NULL) ? $_GET['passwd'] : "password";
	 $p = ($_GET['passwd'] != NULL) ? $password : NULL;
?>
<body style="background-color:grey">
<h1>Login Form</h1>
<form method = "get" action = "<?php echo $_SERVER['PHP_SELF']; ?>" name= "index.php">
	<tr>
		<th>
			<p1>Username: </p1>
		</th>
		<th>
			<input type="text" name="login" placeholder="<?=$username?>" value="<?=$u?>">
		</th>
	</tr>
	<br/>
	<tr>
		<th>
			<p1>Password:  </p1>
		</th>
		<th>
			<input type="password" name="passwd" placeholder="<?=$password?>" value="<?$p?>">
		</th>
	</tr>
	<br/>
	<input type="submit" name="submit" value=" OK ">
	<br/>
</form>
</body>
