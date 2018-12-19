<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php 
            if($title)
            {
                echo $title;
            }
            else{
                echo 'Default';
            }
        ?>
        </title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
        
    
        
<!--    jQuery  CDNs    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--    jQuery UI      -->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.js"></script>
        

<!--    BOOTSTRAP SOURCES      -->
        <!--CSS-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!--Bootstrap JS-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
        

<!--    Imported Font From Google   -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        
<!--    NAVBAR STYLE SHEET      -->
    <link rel="stylesheet" type="text/css" href="../resources/navbar/navbar.css">
            
<!--    FOOTER STYLE SHEET      -->
    <link rel="stylesheet" type="text/css" href="../resources/end_page/end_page.css">
<!--    NAVBAR JS       -->
        <script src="../resources/navbar/navbar.js"></script>

<!--    CONTENT CSS     -->
        <link rel="stylesheet" type="text/css" href="../resources/styling.css">
        
<!--    CONTENT JS      -->
        <script src="../resources/script.js"></script>
    </head>
    <body>
        
        <!-- SOME CREDIT GOES TO https://getbootstrap.com/docs/4.0/components/navbar/ 
            - i didn't use it as a template, but it was necessary to follow the patterns displayed on this website in order to use the bootstrap classes correctly and get the desired functionality
        -->
        
<!--        BEGIN NAVBAR          -->
            <nav class="navbar navbar-expand-md navbar-dark purple">
                <!--                INLINE LOGO         -->
                <a class="icon" ><img src="../media/navbar/menu_icon.png"></a>
                <p class="text-center h4 d-block d-md-none" id="bar-title"><?php echo $title; ?></p>
                <button id="tog" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                
                
                
                <!--                MENU BAR            -->
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav purple">
                        <li class="nav-item">
                            <a class="nav-link nl " href="../" id="index">Home <span class="sr-only">(current)</span></a>
                        </li>
                        
                    <!--    about us    -->
                        <li class="nav-item dropdown">
                            <div class="dropdown-wrap">
                            
                                <a class="nav-link nl dropdown-toggle purple" href="../about-us" id="about-us" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Us</a>
                            
                                
                            <div class="dropdown-menu purple" aria-labelledby="about-us">
                                <a class="dropdown-item di lightGray about-us" href="../about-us/values.php" id="values">Values</a>
                                <a class="dropdown-item di lightGray about-us" href="../about-us/candidate-process.php" id="candidate-process">Candidate Process</a>
                                <a class="dropdown-item di lightGray about-us" href="../about-us/testimonials.php" id="testimonials">Testimonials</a>
                            </div>
                            </div>
                        </li>
                    <!-- services -->
                        
                        <li class="nav-item">
                                 <a class="nav-link nl purple" href="../services" id="services">Services</a>
                        </li>
                    <!-- candidates -->
                        <li class="nav-item dropdown">
                            <div class="dropdown-wrap">
                                <a class="nav-link nl dropdown-toggle purple" href="#" id="candidates" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Candidates</a>
                            
                                <div class="dropdown-menu purple" aria-labelledby="candidates">
                                <a class="dropdown-item di lightGray candidates" href="../candidates/candidate-resources.php" id="candidate-resources">Candidate Resources</a>
                                <a class="dropdown-item di lightGray candidates" href="../candidates/consultant-benefits.php">Consultant Benefits</a>
<!--                                <a class="dropdown-item di lightGray candidates" href="../candidates/job-search.php" id="job-search">Job Search</a>-->
                            </div>
                            </div>  
                        </li>
                    <!-- employers -->
                        <li class="nav-item dropdown">
                            <div class="dropdown-wrap">
                                <a class="nav-link nl dropdown-toggle purple" href="" id="employers" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Employers</a>
                            
                                <div class="dropdown-menu purple" aria-labelledby="employers">
                                <a class="dropdown-item di lightGray employers" href="../employers/employer-resources.php" id="employer-resources">Employer Resources</a>
                            </div>
                            </div>  
                        </li>
                    <!-- blog -->
<!--
                        <li class="nav-item">
                            <a class="nav-link nl" id="blog" href="../blog">Blog</a>
                        </li>
-->
                    <!-- contact us -->
                        <li class="nav-item">
                            <a class="nav-link nl" id="contact-us" href="../contact-us">Contact Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-right ml-auto purple">
                        <li id="nav-separator"></li>
<!--
                        <li class="nav-item">
                            <a class="nav-link nl" id="create-account" href="../create-account">Create Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nl" id="login" href="../login">Login</a>
                        </li>
-->
                        <?php        
                            if(session_start()){
                                
                            
                                $loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
                            
                                if(!$loggedin){
                                    print '
                                    <!--<li class="nav-item">
                                        <a class="nav-link nl" id="create-account" href="../create-account">Create Account</a>
                                    </li>-->
                                    <li class="nav-item">
                                        <a class="nav-link nl" id="login" href="../login">Login</a>
                                    </li>';   
                                }
                                else{
                                    print '
                                    <li class="nav-item">
                                        <a class="nav-link nl" id="admin-panel" href="../admin-panel">Admin Panel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link nl" id="logout" href="../login/logout.php">Logout</a>
                                    </li>';
                                }
                            }
                        ?>
                    </ul>
                </div>
            </nav>
        
        <?php
    if($title)
    { 
        if($displayHeader){
        $srctitle = strtolower($title);
        $srctitle = str_replace(" ","_",$srctitle);
        
        $src = "../media/" . $srctitle . ".jpg";
        echo '
            <div class="container-fluid jt1 title_header">
                <div class="Jumbotron header_img">
                    <img class="img-fluid title_image" src="' . $src . '">
                    <p class="display-3 d-none d-md-block title_md">' . $title . '</p>
                    <p class="h1 d-block d-md-none title_sm">' . $title . '</p>
                </div>
            </div>';
        }
    }
        
    if($session_error){
        echo "<div class='bg-danger text-dark'>Error! The session was unable to start. Please try again, and if you get this error again, please contact the server administrator.";
    }
?>
<!--            END NAV BAR     -->