<?php
// Registration Logic Here
require('../includes/sessions.inc.php');
require('../includes/conn.inc.php');

$regLogin = filter_var($_POST['userLogin'], FILTER_VALIDATE_EMAIL);
$regPassword = $_POST['password'];
$regPasswordConfirm = $_POST['passwordConfirm'];

if (!$regLogin) {
    $_SESSION['regError'] = 1;
    $referer = "register.php";
    header("Location: ../".$referer); 
    exit;
}

if ($regPassword != $regPasswordConfirm || $regPassword == "") { 
    $_SESSION['regError'] = 2; 
    $referer = "register.php"; 
    header("Location: ../".$referer); 
    exit;
} else { 
    // Password is valid 
    // Code to Check if the user has already registered
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE userLogin = ?");
    $stmt->bind_param("s", $regLogin);
    $stmt->execute();
    $stmt->store_result();
    $numUsers = $stmt->num_rows;

    if ($numUsers == 1) {
        $_SESSION['regError'] = 3;
        $referer = "register.php";
    } else {
        // Insert the New User into the Database
        $stmt = $mysqli->prepare("INSERT INTO users(userLogin, userPassword) VALUES (?, ?)");
        $hashedPw = password_hash($regPassword, PASSWORD_BCRYPT);
        $stmt->bind_param("ss", $regLogin, $hashedPw);
        $stmt->execute();

        if (isset($_SESSION['regError'])) {
            unset($_SESSION['regError']);
        }
        $referer = "login.php";
    }
}

$stmt->close();
$mysqli->close();

header("Location: ../".$referer);
exit;
?>
