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

    $title = "Admin Panel";
    $displayHeader = false;
    require '../resources/navbar/navbar.php';
?>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center mx-auto">
            <p class="display-5 text-center">Messages</p>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-4 text-center mx-auto"></div>
        <div class="col-md-4 text-center mx-auto">
            <div class="mx-auto text-center" id="loading_icon"></div>
        </div>
        <div class="col-md-4 text-center mx-auto"></div>
    </div>
    
<!--
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center mx-auto">
            <div class="mx-auto text-center" id="loading_icon"></div>
        </div>
        <div class="col-md-4"></div>
    </div>
-->
    <br>
    
    <!--    <div class="container-fluid">-->
    <div class="row">
        <div class="col-md-4 text-center">     
            <button class="btn btn-primary" id="refresh_messages">Refresh</button>
        </div>
        <div class="col-md-4 text-center">
        </div>
        <div class="col-md-4 text-center">
            <div class="dropdown show">
                    <a class="btn btn-secondary text-light dropdown-toggle" href="?sort=default" id="sort-menu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort: Default</a>  
                <div class="dropdown-menu" id="sort-dropdown" aria-labelledby="sort-menu">
                    <a class="dropdown-item sort" id="sort-default" sorttype="" sortorder="" href="loggedin.php">Sort: Default</a>
                    <a class="dropdown-item sort" href="?sort=date&order=new" sorttype="date" sortorder="new" id="sort-date-new">Sort: Date (Newest)</a>
                    <a class="dropdown-item sort" sorttype="date" sortorder="old" href="?sort=date&order=old" id="sort-date-old">Sort: Date (Oldest)</a>
                    <a class="dropdown-item sort" sorttype="name" sortorder="asc" href="?sort=name&order=asc" id="sort-name-asc">Sort: Name (Asc)</a>
                    <a class="dropdown-item sort" sorttype="name" sortorder="desc" href="?sort=name&order=desc" id="sort-name-desc">Sort: Name (Desc)</a>
                </div>
                </div>
        </div>
        
    </div>
<!--</div>-->
    
     <br>
    
    <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
<!--                  <th scope="col"><button id="refresh_messages">Refresh</button></th>-->
                  <th scope="col">Timestamp</th>
                    <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Subject</th>
                  <th scope="col">Message</th>
                </tr>
              </thead>
                
                <div class='msg-preview'>
                    <p class='msg-preview-msg'></p> 
                </div>

              <tbody id="tbody">

                  <?php require 'refresh.php'; ?>

              </tbody>
            </table>
        </div>
    </div>
<br>
<br>

<?php
    require '../resources/end_page/end_page.php';
?>