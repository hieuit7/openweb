<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */

class Themes
{
    private $themes;
    private $driver;
    public function __construct($registry)
    {
        include_once 'Db.class.php';
        include_once 'Layout.class.php';
        $this->db = new Db($registry);
        $this->layout = new Layout($registry);        
        
        
        $sql = "select id,path from rs_sys_themes where isuse = 1";
        $data = $this->db->query($sql);
        if($data->data->num_rows >= 0)
        {   
            
            
            $id_themes = $data->data[0];
            $sql_css = "SELECT * FROM rs_sys_themes_css WHERE id_themes = $id_themes[id]";
            $sql_javascript = "select * from rs_sys_themes_javascript where id_themes = $id_themes[id]";
            $css = $this->db->query($sql_css);
            $javascript = $this->db->query($sql_javascript);
            $this->themes = new stdClass();
            $this->themes->css = $css;
            $this->themes->javascript = $javascript;
            $this->themes->layout = $this->layout->getLayout();
            $this->themes->path = $data->data[0]['path']; 
        }
        else
        {
            trigger_error("Can't query themes");
        }
         
        $sql = "select * from rs_sys_menu where isuse = 1";
        
        $data = $this->db->query($sql);
        if($data->data->num_rows >= 0){
            $menu = array();
            $i = 0;
            foreach($data->data as $value){
                $menu[$i]= "<a title=\"".$value['description']."\" href=\"".$value['link']."\">".$value['name']."</a>";
                $i++;
            }
            $this->themes->menu = $menu;
        }
        
    }
    public function getCss()
    {
        $data = $this->themes->css->data;
        return $data;
    }
    public function getJavascript()
    {
        return $this->themes->javascript->data;        
    }
    
    
    
    public function getLayout(){
        //print_r($this->themes->path);
        return $this->themes->layout;
    }
    
    public function getPath(){
        return $this->themes->path;
    }
    public function getMenus()
    {
        return $this->themes->menu;
    }
    public function loadMenu()
    {
        return "Okey";
    }
}


?>