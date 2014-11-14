<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */
include_once ("../class/Db.class.php");
include_once ("../../config/config_new.php");
if (isset($_POST['comment_text']))
{

    $tbl = "comment_menu";
    $field = array(
        "user",
        "body",
        "id_menu");
    $value = array(
        $_POST['user'],
        $_POST['comment_text'],
        $_POST['id_menu']);
    $db = new Db("select * from " . $tbl, $CONFIG);
    $ok = $db->sql_insert($tbl, $field, $value);
    //header("Location: http://".$_SERVER['QUERY_STRING']);
    if ($ok)
    {
        echo "<dl class=\"menu_comment " . $_POST['id_menu'] . "\">
                    
                    <hr/>
                    <dt class=\"comment_user\">" . $_POST['user'] . "</dt>
                    <hr/>
                    <dd class=\"comment_body\">" . $_POST['comment_text'] .
            "</dd>
                </dl>";
    }
}

?>