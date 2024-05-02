<?php
require('includes/sessions.inc.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registration</title>
<link rel="stylesheet" href="css/mobile.css">
<link rel="stylesheet" href="css/desktop.css" media="screen and (min-width: 992px)">
</head>

<body>
<div class="container">
	<div class="loginContainer">
		<div class="login">
			<h1>Registration</h1>
		<?php
		// Error messages
		if(isset($_SESSION['regError'])){ 
			switch($_SESSION['regError']){
				case 1 : 
				echo "<p class=\"error\">Invalid Email Address</p>";
				break;
				case 2 : 
				echo "<p class=\"error\">Please confirm your password</p>";
				break;
				case 3 : 
				echo "<p class=\"error\">Already Registered</p>"; 
				break; 
				}
			}
		?>
		<form action="process/userRegistration.php" method="post">
			<div>
				<label for="userLogin">Email:</label>
					<input type="text" name="userLogin" id="userLogin">

			</div>
			<div>
				<label for="password">Password:</label>
					<input type="text" name="password" id="password">

			</div>
			<div>
				<label for="passwordConfirm">Confirm Password:</label>
					<input type="text" name="passwordConfirm" id="passwordConfirm">

			</div>
			<div>
				<input type="submit" value="Register">
			</div>
		</form>
		</div>
	</div>
</div>
<?php
require('includes/debugger.inc.php');
?>
</body>
</html>
