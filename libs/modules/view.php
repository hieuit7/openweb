<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */
 /*
include_once $_SERVER['DOCUMENT_ROOT'] . '/Web/libs/class/Db.class.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Web/libs/class/Product.class.php';
if (isset($_GET['id']))
{
    $get_id = $_GET['id'];
    #if(is_int($get_id)){
    $sql = "select * from menu where id=" . $_GET['id'];
    $db = new Db($sql, $CONFIG);
    $pro = new Product($db->getResult());

    $sql = "select * from comment_menu where id_menu=" . $_GET['id'];
    $pross = $db->exec_array($sql);
    $comment = "";
    $pros = $pross->data;
    if (is_array($pros))
    {
        foreach ($pros as $pro_detail)
        {
            $comment .= "<dl class=\"menu_comment " . $_GET['id'] . "\">
                    
                    <hr/>
                    <dt class=\"comment_user\">" . $pro_detail['user'] . "</dt>
                    <hr/>
                    <dd class=\"comment_body\">" . $pro_detail['body'] . "</dd>
                </dl>";
        }

    }
    $pro->setComment($comment);
    echo $pro->getDetails($_GET['id']);
    if ($_SESSION['user'])
        ;
    #}else{
    #    include "pagenotfound.html";
    #}
}
*/
if(is_array($opt)){
    $len = count($opt);
    if($len > 1){
        if(isset($opt['opt'])&&isset($opt['id']))
        {
            switch($opt['opt']){
                case "detail":
                {
                    $detail = $this->product->data[$opt['id']];
                    
                    ob_start();
                    extract($detail);
                    $header->setTitle($name);
                    include_once ROOT_DIR.'/themse/default/template/product_detail.tpl';
                    ob_end_flush();
                }
                break;
                case "comment":
                {
                    if(isset($_POST['commented'])){
                        $message = "Thanks";
                    }else{
                        $message = "sr";
                    }
                }
                break;
            }
        }
    }else{
        if(!is_null($this->product)){
            $datas = $this->product->data;
            $header->setTitle("Tất cả sản phẩm");
            include_once ROOT_DIR.'/themse/default/template/product_all.tpl';
        }else{
            echo "Product not found!!!";
        }
    }

}
?>