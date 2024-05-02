<?php
require('includes/sessions.inc.php');
require('includes/authorize.inc.php');
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
	<header>
		<h1>Welcome</h1>
		<ul>
			<li><a href="process/logout.php">Logout</a></li>
		</ul>
	</header>
</div>
<?php
require('includes/debugger.inc.php');
?>
</body>
</html>