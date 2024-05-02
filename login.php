<?php
// add includes to sessions
require('includes/sessions.inc.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Demo</title>
<link rel="stylesheet" href="css/mobile.css">
<link rel="stylesheet" href="css/desktop.css" media="screen and (min-width: 992px)">
</head>

<body>
<div class="container">
	<div class="loginContainer">
		<div class="login">
			<h1>Login</h1>
		<?php
		if(isset($_SESSION['loginError'])){
			echo "<p class=\"error\">Invalid Login Details</p>";
		}
		?>
		<form action="process/checkLogin.php" method="post">
			<div>
				<label for="userLogin">Login:</label>
					<input type="text" name="userLogin" id="userLogin">

			</div>
			<div>
				<label for="password">Password:</label>
					<input type="text" name="password" id="password">

			</div>
			<div>
				<input type="submit" value="Login">
			</div>
		</form>
			<p><a href="register.php">Register</a></p>
		<p><a href="index.php">Not Allowed!</a></p>
		</div>
	</div>
</div>
<?php
// debugging include
// remove in productions
require('includes/debugger.inc.php');
?>
</body>
</html>
