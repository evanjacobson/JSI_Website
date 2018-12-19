<?php

if(!session_start()){
    $error = "Error: Something went wrong with the server";
    require 'index.php';
    exit;
}

    $action = empty($_POST['action']) ? '' : $_POST['action'];

    if($action == 'do_login'){
        doLogin();
    }else{
        header("Location: index.php");
    }

$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];

    // If the user is logged in, redirect them home
    if ($loggedin) {
        header("Location: ../admin-panel");
        exit;
    }


function doLogin(){
        $username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
	
		if (connectAndCheck($username,$password)) {
           $_SESSION['loggedin'] = $username;
			header("Location: ../admin-panel");
			exit;
		} else {
			$error = 'Error: Incorrect username or password';
			require "index.php";
		}		
	}



function connectAndCheck($username,$password){
    require_once '../resources/db.conf';
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }    
    
    $username = mysqli_real_escape_string($mysqli, $username);
    $password = mysqli_real_escape_string($mysqli, $password);
    $password = sha1($password);
    
    $sql = "SELECT * FROM Users WHERE username='$username' and password='$password';";
    $result = $mysqli->query($sql);
 
     while($row = $result->fetch_assoc()) {
             $result->close();
             $mysqli->close();
             return true;
     }
    $result->close();
    $mysqli->close();
    return false;
}
?>