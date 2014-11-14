<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */
class Header
{
    private $link;
    private $javascript;
    private $title;
    private $meta; 
    public function __construct($registry){
        $themes = $registry->get('themes');
        $link = $themes->getCss();
        $this->link = "<link href=\"themse/default/css/all_product.css\" rel=\"stylesheet\" type=\"text/css\" />";
        foreach($link as $value){
            $this->link .= '<link rel="stylesheet" type="text/css" href="'.$value['path'].'" />'."\n";
        }
        
        $javascript = $themes->getJavascript();
        $this->javascript = "<script type=\"text/javascript\" src=\"themse/default/js/jquery-1.9.1.js\"></script>\n<script type=\"text/javascript\" src=\"themse/default/js/s3Slider.js\"></script>\n";
        foreach($javascript as $value){
            $this->javascript = '<script type="text/javascript" src="'.$value['path'].'"></script>'."\n";
        }
        $this->meta = "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"/>";
    }
    public function setTitle($title){
        $this->title = $title;
    }
    private function getCss(){
        return $this->link;
    }
    private function getJava(){
        return $this->javascript;
    }
    public function output(){
        ob_start();
        echo "<!DOCTYPE HTML>\n<html>\n<head>\n".$this->meta."\n".$this->getCss().$this->javascript."<title>".$this->title."</title></head><body><div id=\"content\">\n";
        ob_end_flush();
    }
}


?>