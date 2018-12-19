<!--    INCLUDE THE REQUIRED TAGS AND THE MENU BAR  -->
<?php 
    $title = 'Home';
    $displayHeader = false;
    ob_start();
    require 'resources/navbar/navbar.php';
    $buffer = ob_get_contents();
    ob_end_clean();

    $buffer=str_replace("../","",$buffer);
    echo $buffer;
?>

<!--    MAIN PAGE CONTENT   -->
<br>
<br>

<!--        LOGO AND HEADER         -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2 my-auto d-none d-md-block">
            <div class="container text-left">
                <img class="img-fluid" src="media/top-women.png">
            </div>
        </div>
        <div class="col-md-6">
            <div class="container text-left">
    <img class="img-fluid" src="media/js_tag_300.png">
            </div>   
        </div>
        <div class="col-md-2 my-auto d-none d-md-block">
           <div class="container text-left">
                <img class="img-fluid" src="media/wbe.jpg">
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>
</div>
<br>
<br>
<br>
<!--        end logo & header       -->

<div class="container-fluid text-center">
        <div class="jumbotron">
        <p class="lead text-left">Jacobson Staffing, Inc. is a WBE certified St. Louis based Information Technology (IT) staffing company specializing in identifying and placing top tier IT talent. We work to thoroughly understand both our candidate’s and corporate client’s needs and wants, which results in a collaborative partnership with both parties. We are known for solving the ever-challenging dilemma of matching the right person with the position that fits both their technical and cultural needs. Our mission is to help our candidates and clients make intelligent employment decisions</p>

<br>
<div class="container-fluid">
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="container text-center">
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/kyZowDoNslc" allowfullscreen></iframe>
    </div>
</div>
    </div>
    <div class="col-md-3"></div>

</div>
    </div>
    </div>
</div>
<br>


<br>
<?php 
ob_start();
require 'resources/end_page/end_page.php';
    $buffer = ob_get_contents();
    ob_end_clean();

    $buffer=str_replace("../","",$buffer);
    echo $buffer;
 ?>