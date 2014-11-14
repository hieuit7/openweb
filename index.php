<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */
if (file_exists('config/config1.php')) {
	require_once('config/config1.php');
} 
if (defined('EXIST')) {
    if (!EXIST)
        include "install.php";

    else {        
        session_start();
        require_once('start.php');
        $registry = new Registry();
        //set title
        $registry->set('title',"trang chu");
        //setdb 
        $dbconf = array('host'=>DB_HOST,'user'=>DB_USER,'passwd'=>DB_PASSWD,'db'=>DB);
        $registry->set("db",$dbconf);
        $database = new Db($registry);
        //set themes
        $themes = new Themes($registry);
        $user = new User($registry);
        $product = new Product($registry);
        $sql = "SELECT * FROM rs_content_product"; 
        $products = $product->getProduct($sql);
        $catogory = $product->getCatogory();
        $registry->set("catogory",$catogory);
        $registry->set('product',$products);
        $registry->set('themes',$themes);
        $registry->set('user',$user);
        $registry->set('action',$_SERVER['QUERY_STRING']);
        $action = new Action($registry);
        $action->output();

    }
} else {
    include "install.php";
}


?>