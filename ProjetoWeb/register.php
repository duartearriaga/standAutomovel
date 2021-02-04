<?php

include( 'config.php' );

	

	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$username = $_POST['username'];
		$pass = $_POST['password'];

			insertUser( $username, $pass);
			header("Location: index.php");	
		
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registar</title>
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<h2 style="text-align:center">Registar</h2>
<div class="register">
	<section>
		<form method="post" action="register.php">
			
			<label>Username</label>
			<input type="text" name="username" autofocus required>

			<label>Password</label>
			<input type="password" name="password" required>
        </select>   
<br><br>
			<p><input type="submit" value="Register"> <a href="index.php"><input type="button" value="Login"></a>


		</form>

	</section>
</div>
</body>
</html>