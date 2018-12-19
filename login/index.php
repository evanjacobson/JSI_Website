<?php

if(!session_start()){
    $error = "Error: Something went wrong with the server";
    require 'index.php';
//    header("Location: index.php");
    exit;
}

$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];

    if($loggedin){
        header("Location: ../admin-panel");
        exit;
    }

   $title = "Login";
    require '../resources/navbar/navbar.php';
?>
<br>
<div class="row">
     <div class="col-md-4"></div>
     <div class="col-md-4">
         <div class="jumbotron">
            <p class="text-center h3">Login</p>
             <?php
                if($error){
                    print '<div class="alert alert-danger" role="alert">Error! Incorrect Username or Password.</div>';
                }
             ?>
             <br>
             <form action="login.php" method="post">
                 <input type="hidden" name="action" value="do_login" required>
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                 <br>
                    <input class="form-control" type="password" name="password" required placeholder="Password">
                    <br>
                    <input class="btn btn-primary" type="submit">
                 
             </form>
         </div>
    </div>
     <div class="col-md-4"></div>

</div>

<br>
<br>



<?php require '../resources/end_page/end_page.php'; ?>