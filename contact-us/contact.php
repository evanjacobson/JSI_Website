<?php
 sleep(1);

    require '../resources/db.conf';    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }  

    $name = empty($_POST['name']) ? '' : $_POST['name'];
    $email = empty($_POST['email']) ? '' : $_POST['email'];
    $subject = empty($_POST['subject']) ? '' : $_POST['subject'];
    $message = empty($_POST['message']) ? '' : $_POST['message'];
    $message = substr($message,0,strlen($message)-1);


    $name = mysqli_real_escape_string($mysqli,$name);
    $email = mysqli_real_escape_string($mysqli,$email);
    $subject = mysqli_real_escape_string($mysqli,$subject);
    $message = mysqli_real_escape_string($mysqli,$message); //prevents adding an extra quote

    
    
    $sql = "INSERT INTO Messages (fullname,email,subj,message) VALUES ('$name','$email','$subject','$message')";
    $result = $mysqli->query($sql);

    echo $result;
    $mysqli->close();
?>