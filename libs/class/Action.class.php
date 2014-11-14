<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 * @modify 20/12
 */

class Action
{
    private $themes;
    private $user;
    private $product;
    private $action;
    private $module;
    private $registry;
    private $catogory;
    public function __construct($registry)
    {
        $this->registry = $registry;
        $this->product = $registry->get('product');
        $this->themes = $registry->get('themes');
        $this->action= $registry->get('action');
        $this->user = $registry->get('user');
        $this->catogory = $registry->get('catogory'); 
        $q = '/\w+=\w+/';
        preg_match_all($q,$this->action,$matchs);
        $this->module = $matchs;        
    }
    
    
    
    public function output()
    {   
        global $themes_css,$themes_javascript,$user_detail,$matchs,$modules,$opt,$product_out;
        $themes = $this->themes;
        $themes_css = $this->themes->getCss();
        $themes_javascript = $this->themes->getJavascript();
        $user_detail = $this->user;
        $registry = $this->registry;
        $product_out = $this->product;
        ///
        
        ///
        $header;
        $menu = $this->catogory;
        if(file_exists(DIR_CLASS.'/Header.class.php')){
            include_once 'Header.class.php';
            $header = new Header($this->registry);
        }else{
            trigger_error("Can't include Header");
            exit();
        }
        $modules = explode('=',$this->module[0][0]);
        $opt = array();
        for($i=1;$i<count($this->module[0]);$i++){
            $opt1[$i-1] = $this->module[0][$i];
            $opt2 = explode('=',$opt1[$i-1]);
            $opt[$opt2[0]] = $opt2[1];
        }
        $header->setTitle('Trang chủ');
        ob_start();
        //header content;
        $header->output();
        //content;
        
        $layout = $themes->getLayout();
        $path = $themes->getPath();
        
        $menu = $themes->getMenus();
        $j = 0;
        for($i=1;$i<count($layout);$i+=2){
            //echo strcmp($layout['name'.$j],"c_content");
            if(strcmp($layout['name'.$j],"c_content") == 0){
                //echo "ok";
                if(!is_null($modules[1])){
                    $module = DIR_MODULES.'/'.$modules[1].'.php';
                    if(!file_exists("../../libs/modules/".$modules[1].".php"))
                    {
                        include_once $module;
                    }else{
                        trigger_error('Modules '.$modules[1].'.php in '.$module.' not found!!' );
                    }
                } else {
                    $module = DIR_MODULES.'/view.php';
                    if(!file_exists("../../libs/modules/view.php"))
                    {
                        include_once $module;
                    }else{
                        trigger_error('Modules view .php in '.$module.' not found!!' );
                    }
                }                         
            }else{
                $include = ROOT_DIR.'/'.$themes->getPath().'template/'.$layout['name'.$j].'.tpl';
                if(!file_exists($include)){
                    $err = ROOT_DIR.'/'.$themes->getPath().$layout['name'.$j].'.tpl';
                }else{
                    include_once $include;
                }
            }
            $j++;
        }          
        //footer content;
        echo "</div></div></body>\n</html>";
        ob_end_flush();   
    }
}

?>