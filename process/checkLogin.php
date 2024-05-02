<?php
ini_set("display_errors",1);
require('../includes/sessions.inc.php');
require('../includes/conn.inc.php');

//// functions
function checkDbForTheUser($userLogin, $mysqli){
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE userLogin = ?");
    $stmt->bind_param("s", $userLogin);
    $stmt->execute();
    $result = $stmt->get_result();
    $numUsers = $result->num_rows;
    if($numUsers == 0){
        return null;
    }else{
        $row = $result->fetch_object();
        $dbPasswordHash = $row->userPassword;
        return $dbPasswordHash;
    }
    $stmt->close();
}

function checkPassword($userPassword, $dbPasswordHash){
    if(password_verify($userPassword, $dbPasswordHash)) {
        unset($_SESSION['loginError']);
        $_SESSION['login'] = 1;
        $referer = "index.php";
    }else{
         // database does not match error
         $_SESSION['loginError'] = 1;
         $referer = "login.php";
    }
    return $referer;
}

$userLogin = filter_var($_POST['userLogin'], FILTER_VALIDATE_EMAIL);
$userPassword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

if($userLogin){ 
    $userDbPW = checkDbForTheUser($userLogin, $mysqli);
    if(!is_null($userDbPW)){
        $referer = checkPassword($userPassword, $userDbPW);
    }else{
        $_SESSION['loginError'] = 1;
        $referer = "login.php";
    }
}else{
     // not valid email error
     $_SESSION['loginError'] = 1;
     $referer = "login.php";
}

$mysqli->close();

header("Location: ../".$referer);
?>
