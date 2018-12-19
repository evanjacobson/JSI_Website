<?php
sleep(2);
    $dbhost = "localhost";
    $dbuser = "ec2-user";
    $dbpass = "nick";
    $dbname = "CS2830";
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }   

    $sql = "SELECT * FROM Messages";
    $result = $mysqli->query($sql);


    if ($result->num_rows > 0) {
        
        
        
        $flag = array(array());
        $normal = array(array());
        $seen = array(array());
        
    // output data of each row
        $f = -1;
        $n = -1;
        $s = -1;
    while($row = $result->fetch_assoc()) {
        if($row['flag'] === '1'){
            $flag[$f++] = $row;
        }
        /* SEEN IS LESS IMPORTANT THAN FLAG */
        else if($row['seen'] === '1')
        {
                $seen[$s++] = $row;
        }
        else{
            $normal[$n++] = $row;
        }
    }
        
        /* loop thru flag, then normal, then seen */
        
        foreach($flag as $msg){
            if(!(empty($msg['fullname']))){
                echoTableRow($msg,'flag');
            }
        }
        
        foreach($normal as $msg){
            if(!(empty($msg['fullname']))){
            echoTableRow($msg,'normal');
            }
        }
        
        foreach($seen as $msg){
            if(!(empty($msg['fullname']))){
            echoTableRow($msg,'seen');
            }
        }
}

function echoTableRow($msg,$type){
    $message = $msg['message'];
    
    $mg = $message;
    if(strlen($message) > 27){
        $mg = substr($message,0,27);
        $mg = "$mg...";
    }
        $email = rawurlencode($msg['email']);
        $br = "%0D%0A";
        $hr = "%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F";
        $messg = rawurlencode($message);
        
        $sub = rawurlencode('Re: ' . $msg['subj']);
        $message = "<a href=mailto:$email?subject=$sub&body=$br$br$br$br$hr$br$br$messg>$mg</a>";
        
    echo '<tr class="message_object">
            <td>'.$msg['received']. 
            '</td><th scope="row">' .$msg['fullname'] . '</th>
            <td> <a href="mailto:' . $msg['email'] . '">' .$msg['email'] . '</td>
            <td>'.$msg['subj'].'</td>
            <td>'.$message.'</td>
        </tr>';
    
//    echo '<tr>
//            <td> (' .$type. ') </td>
//            <th scope="row">' . $msg['fullname'] . '</th>
//            <td> <a href="mailto:' . $msg['email'] . '">' .$msg['email'] . '</td>
//            <td>'.$msg['subj'].'</td>
//            <td>'.$message.'</td>
//        </tr>';
}

$mysqli->close();


?>