<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */

if (isset($_POST['user']) && isset($_POST['passwd'])) {
    $result = $user_detail->login($_POST['user'],$_POST['passwd']);
    if (!$result) {
        if(!headers_sent()){
            $user_status = session_name('hieu');
            $user_name = 'hieu';
            header("Location: index.php");
        }
    }else{
        session_start();
        session_register('user');        
        $user_status = session_name('hieu');
        $user_name = 'hieu';
        
        if(!headers_sent()){
            header("Location: index.php");
        }
    }
}
?>