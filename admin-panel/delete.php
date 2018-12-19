<?php

if(!session_start()){
        header("Location: ../");
        exit;
    }

    $loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];

    if(!$loggedin){
        header("Location: ../");
        exit;
    }

sleep(1);
    require '../resources/db.conf';
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }   

$name = empty($_POST['fullname']) ? 'default' : mysqli_real_escape_string($mysqli,$_POST['fullname']);
$email = empty($_POST['email']) ? 'default' : mysqli_real_escape_string($mysqli,$_POST['email']);
$subject = empty($_POST['subject']) ? 'default' : mysqli_real_escape_string($mysqli,$_POST['subject']);

if(!($name == 'default' || $email == 'default' || $subject == 'default')){

    $sql = "UPDATE Messages SET deleted=1 WHERE fullname='$name' AND email='$email' AND subj='$subject';";
    
    $result = $mysqli->query($sql);
    echo $result;
//    $result->close(); //this doesn't work with this php file
}
else { echo 'Error'; }

$mysqli->close();


?>