<?php

header("Location: ../");
//$loggedin = empty($_COOKIE['loggedin']) ? '' : $_COOKIE['loggedin'];
//    // If the user is logged in, redirect them home
//    if ($loggedin) {
//        header("Location: loggedin.php");
//        exit;
//    }

    $action = empty($_POST['action']) ? '' : $_POST['action'];

   if($action == 'do_signup'){
        doCreate();
   }
//    else{
//        header("Location: index.php");
//    }


function connectAndSignup($username,$password){
    $dbhost = "localhost";
    $dbuser = "ec2-user";
    $dbpass = "nick";
    $dbname = "CS2830";
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }    
    
//    /*  NEED TO DO SANITIZATION FOR THE REAL THING  */
    $sql = "INSERT INTO Users VALUES ('$username','$password');";
    $result = $mysqli->query($sql);
    
    $result->close();
    $mysqli->close();
    return true;
}


function doCreate(){
        $username = empty($_POST['username']) ? '' : $_POST['username'];
        $password = empty($_POST['password']) ? '' : $_POST['password'];
    
    connectAndSignup($username, $password);
    
    if(connectAndSignup($username, $password)){
        setcookie('loggedin', $username, time() + 86400, '/');
			header("Location: loggedin.php");
			exit;
    }
//    else{
//        echo "problem";
//        $error = 'Error: Something went wrong with the server.';
//        require "index.php";
//    }
}

?>