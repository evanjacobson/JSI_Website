<?php
header("Location: ../");
    ob_start();
    require '../resources/navbar/navbar.php';
    $buffer = ob_get_contents();
    ob_end_clean();

    $buffer=str_replace("%TITLE%","Create Account",$buffer);
    echo $buffer;
?>

<br>
<div class="row">
     <div class="col-md-4"></div>
     <div class="col-md-4">
         <div class="jumbotron">
            <p class="text-center h3">Create Account</p>
             <br>
             <?php
                if($error){
                    print '<div class="alert alert-danger" role="alert">Error! Something went wrong...</div>';
                }
             ?>
             <form action="createaccount.php" method="post">
                    <input type="hidden" name="action" value="do_signup">
                    <input class="form-control" type="text" name="username" placeholder="Username">
                 <br>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                    <br>
                    <input class="btn btn-primary" type="submit">
                 
             </form>
         </div>
    </div>
     <div class="col-md-4"></div>

</div>

<?php require '../resources/end_page/end_page.php'; ?>