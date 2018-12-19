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

$sort = empty($_GET['sort']) ? 'default' : mysqli_real_escape_string($mysqli,$_GET['sort']);
$order = empty($_GET['order']) ? 'default' : mysqli_real_escape_string($mysqli,$_GET['order']);

//$delete = empty($_POST['item']) ? 'default' : $_POST['item'];

$sql = "SELECT * FROM Messages";



if(!(empty($_POST['item']))){
    exit;
}


/*             NO 'DEFAULT' OPTION        */
//if($sort == 'date' && $order == 'new'){
//    $sql = "SELECT * FROM Messages ORDER BY received DESC;";
//}
/*else*/ 

if($sort == 'date' && $order == 'old'){
    $sql = "SELECT * FROM Messages ORDER BY received ASC;";
}
else if($sort == 'name' && $order == 'asc'){
    $sql = "SELECT * FROM Messages ORDER BY fullname ASC;";
}
else if($sort == 'name' && $order == 'desc'){
    $sql = "SELECT * FROM Messages ORDER BY fullname DESC;";
}
else{
    $sql = "SELECT * FROM Messages ORDER BY received DESC;";
}

$result = $mysqli->query($sql);

loopResult($result);
   
    

function loopResult($result){
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) {
            if(!($row['deleted'] == '1')){
            echoTableRow($row);
            }
        }
    }
}
    

function echoTableRow($msg){
        $message = $msg['message'];
        $fullname = $msg['fullname'];
        $subject = $msg['subj'];
        $mail = $msg['email'];
    
    $mg = $message;
    if(strlen($message) > 27){
        $mg = substr($message,0,27);
        $mg = "$mg...";
    }
        $email = rawurlencode($msg['email']);
        $br = "%0D%0A%0D%0A";
        $hr = "%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F";
        $messg = rawurlencode($message);
        
        $body = "$br$br$br$br$hr$br$br$messg";
    
        $sub = rawurlencode('Re: ' . $msg['subj']);
    
//        $messa = <a href=mailto:$email?subject=$sub&body=$body>
    $messa = 
        "<a href='' placeholder='' fullname='$fullname' subject='$subject' email='$mail' message='$messg' class='msg'>$mg</a>";
    
    
    $received = "<div class='row'><div class='col-sm-4'><img placeholder='' fullname='$fullname' subject='$subject' email='$mail' class='trash' src='../media/trash.png' width='25' height='25'></div><p class='col-sm-8'>" . $msg['received'] . "</p></div>";
    
    
    echo "<tr class='message_object' placeholder=''  fullname='$fullname' subject='$subject' email='$mail'> 
            <td class='time'>$received</td>
            <td>$fullname</td>
            <td><a href='mailto:$mail'>$mail</td>
            <td>$subject</td>
            <td>$messa</td>
        </tr>";
}

$result->close();
$mysqli->close();


?>