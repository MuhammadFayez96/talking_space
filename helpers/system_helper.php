<?php

function  redirect($page = FALSE, $msg = NULL, $msg_type = NULL) {
    if(is_string($page)) {
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }
    
    if($msg != NULL) {
        $_SESSION['msg'] = $msg;
    }
    
    if($msg_type != NULL) {
        $_SESSION['msg_type'] = $msg_type;
    }
    header('location: '.$location);
    exit();
}

function display_message() {
    if(!empty($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        
        if(!empty($_SESSION['msg_type'])){
            $msg_type = $_SESSION['msg_type'];
            
            if($msg_type == 'error') {
                echo '<div class="alert alert-danger" role="alert">'.$msg.'</div><br>';
            } else {
                echo '<div class="alert alert-success" role="alert">Successfully Done!</div><br>';
            }
        }
        
        unset($_SESSION['msg']);    
        unset($_SESSION['msg_type']);    
    } else {
        
    }
}

function isLoggedIn() {
    if(isset($_SESSION['is_logged_in'])) {
        return TRUE;
    } else {
        return FALSE;
    }
}
function  getUser() {
    $userArray = array();
    $userArray['user_id'] = $_SESSION['user_id'];
    $userArray['username'] = $_SESSION['username'];
    $userArray['name'] = $_SESSION['name'];
    return $userArray;
}

