<?php
   session_start();
   if ($_GET['submit'] ==" OK ")
   {
	   $_SESSION['user'] = $_GET['login'];
	   $_SESSION['pass'] = $_GET['passwd'];
   }
?>
<!doctype html>
<html>
   <body>
	   <h1>Login</h1>
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
   </body>
</html>