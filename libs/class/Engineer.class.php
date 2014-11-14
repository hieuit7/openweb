<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */


/**
 * Engineer
 *
 * @package
 * @author Web
 * @copyright hieu nguyen
 * @version 2013
 * @access public
 */
/**
 * Engineer
 * 
 * @package   
 * @author intime
 * @copyright hieu nguyen
 * @version 2013
 * @access public
 */
class Engineer
{
    private $connect;
    private $db;
    private $style;
    private $style_link;
    private $title;
    private $config;
    private $agrs;
    /**
     * Engineer::__construct()
     * Khoi tao Engineer
     * @param mixed $agrs
     * @return
     */
    function __construct($agrs)
    {
        $this->connect = mysql_connect($agrs['host'], $agrs['user'], $agrs['passwd']) or
            die("die");
        $this->db = $agrs['db'];
        $this->agrs = $agrs;
    }
    /**
     * Engineer::init()
     * @todo ket noi toi csdl voi thong so $agrs truyen vao la thong so cau hinh.  Gan gia tri tra ve cho $this->connect và db là this->db
     * @param mixed $agrs
     * @return void
     */

    function init($agrs)
    {
        $this->connect = mysql_connect($agrs['host'], $agrs['user'], $agrs['passwd']) or
            die("die");
        $this->db = $agrs['db'];
    }


    /**
     * Engineer::getConnect()
     * @todo Lay gia tri của this->connect
     * @return resource
     */
    public function getConnect()
    {
        return $this->connect;
    }

    /**
     * Engineer::setConnect()
     * @todo dat lai this->connect
     * @param mixed $resouce
     * @return resource
     */
    public function setConnect($resouce)
    {
        $this->connect = $resouce;
    }

    // @__call()
    /**
     * Engineer::getDb()
     * @todo tra ve gia tri cua this->db
     * @return string
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Engineer::getDb()
     * 
     * @todo Get config themes from database!!!
     * @return array
     */

    public function getConfig()
    {
        $this->loadModules("Db.class.php");
        $sql_themes = "SELECT id FROM rs_sys_themes WHERE isuse = 1";
        $db = new Db($sql_themes,$this->agrs);
        $themes = $db->getResult();
        $id_css = $themes['id'];
        $sql_themes_css = "SELECT * FROM rs_sys_themes WHERE id = 0";
        $cssObj = $db->exec_array($sql_themes_css); 
        $c = $cssObj->data;
        
        
        /*$c = array();
        $c['title'] = "index.php";
        $c['link'] = array(
            "themse/default/css/product.css",
            "themse/default/css/layout.css",
            "themse/default/css/form.css");
        $c['style'] = array(
            0 => '.menuitem{
                                            background: purple;
                                            color: lime;
                                        }',
            '.menuitem1{
                                            background: purple;
                                            color: lime;
                                        }',
            '#addcomment{
                                            display: none;
                                        }');
        $c['script'] = array("themse/default/js/jquery-1.9.1.js",
                "themse/default/js/cm.js");*/
        $this->config = $c;
        return $c;
    }

    /**
     * Engineer::loadModules()
     * 
     * @param mixed $module_name
     * @return
     */
    public function loadModules($module_name)
    {
        if (is_array($module_name))
        {
            foreach ($module_name as $module)
            {
                include "$module";
            }
        }

    }
    /**
     * Engineer::loadMenu()
     * @todo get menu from data base
     * @return array
     */
    public function loadMenu()
    {


        $sql = "SELECT * FROM menu";


        $link = "http://localhost/Web";

        $menu = array(
            "<a href=" . $link . ">menu 1</a>",
            "<a href=" . $link . ">menu 2</a>",
            "<a href=" . $link . ">menu 3</a>");

        return $menu; //'<div class="menu_item">menu<div>';
    }

    /**
     * Engineer::loadMenus()
     * @todo Building menu form database. Convert to object that create menu!!!
     * @return void
     */
    public function loadMenus()
    {


        $this->getConnect();

        $menu = array(
            "Trang chủ",
            "Giới thiệu",
            "Đào tạo",
            "Thông báo",
            "Tổ chức",
            "Hoạt động");
        $menu_v = "<ul>\n";
        $menu_sub = array();
        foreach ($menu as $value)
        {
            $menu_sub[$value] = array("giới thiệu", "acb");
        }
        foreach ($menu as $m)
        {
            $menu_v .= "<li>" . $m . "\n";
            if ($menu_sub[$m] != null)
            {
                $menu_v .= "<ul style=\"top: 34px; box-shadow: 5px 5px 5px rgb(170, 170, 170); visibility: visible; left: 0px; width: 192px; display: none;\"\n";
                foreach ($menu_sub as $value_sub)
                {
                    $menu_v .= "<li>\n" . $value_sub . "</li>\n";
                }
                $menu_v .= "</ul>";
                //"</li>\n";
            }
            $menu_v .= "</li>";
        }
        $menu_v .= "</ul>";
        echo $menu_v;
    }
    /**
     * Engineer::load_class()
     * @todo Load class $classname
     * @param mixed $classname
     * @return void
     */
    public function load_class($classname)
    {
        if (is_array($classname))
        {
            foreach ($classname as $class)
            {
                include "$class";
            }
        } else
        {
            include "$classname";
        }
    }
}

?>