<?php 
   $title = 'Contact Us';
    $displayHeader = false;
    require '../resources/navbar/navbar.php';
?>
<div class="container-fluid">

<div class="row">
<div class="col-md-12 container d-none d-md-block text-center clearfix">
    <img class="img-fluid" src="../media/jsi_contact_img.jpg">
</div>
</div>

<br>

<div class="row" id="contact_container">
    <div class="col-md-3">
<!--        <img class="d-none d-md-block img-fluid" src="../media/join_our_network.jpg">-->
    </div>
    <div class="col-md-6">
        <div class="jumbotron">
            <p class="text-center h3">Contact Us</p>
            <div class="mx-auto text-center" id="loading_icon"></div>
        <br>
            <div class="form-group">
            <form method="post" id="form">
                <input type="hidden" name="placeholder">
                <input class="form-control" name="name" type="text" autocomplete="given-name" id="name_contact" placeholder="Your Name" required>
                <br>
                <input class="form-control" name="email" type="email" placeholder="Your Email" autocomplete="email" id="email_contact" required>
                <br>
                <input class="form-control" name="subject" placeholder="Subject" maxlength="75" id="subject_contact" type="text" required>
                <br>
                <textarea maxlength="2000" rows="10" class="form-control" name="message" id="message_contact" placeholder="Your Message" required></textarea>
                <br>
                <button class="btn btn-primary" id="contact_us_submit">Submit</button>   
                
            </form>
        </div>
    </div>
    </div>
    <div class="col-md-3">
    </div>
</div>
</div>



<?php require '../resources/end_page/end_page.php' ?>