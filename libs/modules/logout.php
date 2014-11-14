<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */
session_start();
global $user_status;
if(session_is_registered('user')){
    session_unregister('user');
    unset($_POST['action_login']);
    $user_status = "geuss";
header("Location: index.php");
}else{
    $user_status = "Logout";
}

?>