<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */
 
if (isset($_POST['submit'])) {
    if(isset($_POST['host'])&&isset($_POST['user'])&&isset($_POST['passwd'])&&isset($_POST['db'])){
        /**
         * Creating resource
         * 
         * 
         * 
         * 
         */ 
        $host = $_SERVER['SERVER_NAME'];
        $dir = realpath(dirname(__FILE__));
        $wf = fopen("config/config1.php", "w");
        fwrite($wf, "<?php\n");
        fwrite($wf, "define(\"EXIST\",true);\n");
        fwrite($wf,"define(\"VERSION\",\"1.0\");\n");
        fwrite($wf,"define(\"HOSTNAME\",\"$host\");\n");
        fwrite($wf,"define(\"ROOT_DIR\",\"$dir\");\n");
        fwrite($wf,"define(\"DIR_CLASS\",\"$dir.\\libs/class\");\n");
        fwrite($wf,"define(\"DIR_MODULES\",\"$dir.\\libs/modules\");\n");
        fwrite($wf,"define(\"DB\",\"$_POST[db]\");\n");
        fwrite($wf,"define(\"DB_HOST\",\"$_POST[host]\");\n");
        fwrite($wf,"define(\"DB_USER\",\"$_POST[user]\");\n");
        fwrite($wf,"define(\"DB_PASSWD\",\"$_POST[passwd]\");\n");
        fwrite($wf, "?>");
        include_once("start.php");
        
        
        $registry = new Registry();
        $db = array('host'=>$_POST['host'],'user'=>$_POST['user'],'passwd'=>$_POST['passwd'],'db'=>$_POST['db']);
        $registry->set('db',$db);
        $db = new Db($registry);
        
        
        
        
        
        
        /*
        $list = array(
            0 => "host",
            "user",
            "passwd",
            "db");
        $i = 0;
        for ($i; $i <= 3; $i++) {
            fwrite($wf, "\$CONFIG['" . $list[$i] . "'] = '" . $_POST[$list[$i]] . "';\n");
        }
        fwrite($wf, "?>");
        $resource = mysql_connect($_POST['host'], $_POST['user'], $_POST['passwd']);
        if (mysql_ping($resource)) {
            $sql = "CREATE DATABASE " . $_POST['db'];
            $result = mysql_query($sql, $resource);
            if ($result) {
                $sql1 = "CREATE TABLE MENU(ID INTEGER NOT NULL PRIMARY KEY, NAME TEXT, DES TEXT)";
                mysql_db_query($_POST['db'], $sql1);
                $sql2 = "INSERT INTO menu VALUES(1,'kaka','koko')";
                mysql_query($sql2, $resource);
                header("Location: index.php");
            } else {
                header("Location: index.php");
            }
        }*/
    }else{
        header("Location: index.php");
    }
} else {
    include 'setup/set.html';

}




?>
