<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */
require 'Db.class.php';
require 'Product.class.php';
class Rss{
    
    private $item;
    private $img;
    private $detail;
    private $name;
    private $des;
    private $config;
    private $id;
    private $row;
    
    public function __construct($id,$config){
        $this->id = $id;
        $this->config = $config;
        if(!is_numeric($id))
            $id = 1;
        $sql = "select * from menu";
        $db = new Db($sql,$config);
        $this->row = $db->exec_array($sql);
    }
    public function getRss(){
        $item = "";
        foreach($this->row as $product){
                    $pro = new Product($product);
                    $item .= $pro->getItemRss();
                };
                
        $rss ="<?xml version=\"1.0\" encoding=\"UTF-8\"?>
        <rss version=\"2.0\"
            xmlns:atom=\"http://www.w3.org/2005/Atom\">
            <channel>
                <title>".$this->row[2]."</title>
                <link>sssss</link>
                <atom:link href=\"".$_SERVER['SERVER_NAME']."\" rel=\"self\" type=\"application/rss+xml\"/>
                <description>This is RSS Feed of</description>
                <language>en</language>
                ".$item."
            </channel>
        </rss>";
        return $rss;
    }
}

?>