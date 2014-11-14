<?php

/**
 * @author nguyen minh hieu
 * @copyright 2013
 */
 
    $db = new Db($registry);
    $sql = "select * from rs_content_about";
    $about = $db->query($sql);
    $contact = $about->data[0];
    $title = "About";
    ob_start(); 
    extract($contact);
    include_once ROOT_DIR.'/themse/default/template/about.tpl';
    ob_end_flush();
    
?>