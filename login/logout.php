<?php

    if(!session_start){
        header("Location: ../");
    }


/* copied from lecture supplement (User Authentication) */    
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', 1,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    header("Location: ../");
    exit;

?>