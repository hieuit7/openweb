<?php
    if(!file_exists('../config/config1.php')){
        header('Location: ../install.php');
    }
    include_once '../config/config1.php';
    if(defined('EXIST')){
        include_once 'startup.php';
    }
    //Registry
    $registry = new Registry();
    $dbconf = array('host'=>DB_HOST,'user'=>DB_USER,'passwd'=>DB_PASSWD,'db'=>DB);
    $registry->set('db',$dbconf);
    //Database
    $db = new Db($registry);
    //Layout
    
    
?>