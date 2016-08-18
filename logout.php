<?php
include ('core/init.php');

if($_POST['do_logout']) {
    $user = new User();
    
    if($user->logout()) {
        redirect('index.php', 'Your are now logged out', 'success');
    } else {
        redirect('index.php');
    }
} else {
    
}

