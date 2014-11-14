<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */

class Product{
    private $product;
    private $db;
    private $catogory;
    public function __construct($registry){
        include_once 'Db.class.php';
        $this->db  = new Db($registry);
    }
    
    public function getProduct($sql){
        $db =  $this->db->query($sql);
        $data = array();
        $i = 0;
        foreach($db->data as $product){
            $data[$i]['id'] = $product['id'];
            $data[$i]['name'] = $product['name'];
            $data[$i]['description'] = $product['description'];
            $data[$i]['show'] = $product['show'];
            $data[$i]['userpost'] = $product['userpost'];
            $data[$i]['time'] = $product['time'];
            $data[$i]['body'] = $product['body'];
            $data[$i]['image'] = $product['img'];
            $i++;
        }
        unset($db);
        $obj = new stdClass();
        $obj->num = $i;
        $obj->data = $data;
        unset($data);
        $this->product = $obj;
        return $obj;
    }
    
    public function getCatogory(){
        $sql = "select * from rs_content_product_catogory";
        $datas = $this->db->query($sql);
        $data = array();
        $i = 0;
        foreach($datas as $value){
            $data[$i]['id'] = $value['id'];
            $data[$i]['name'] = $value['name'];
            $i++;
        }
        unset($datas);
        $obj = new stdClass();
        $obj->num_rows = $i;
        $obj->data = $data;
        $this->catogory = $obj;
        return $obj;
    }
    public function getName($id){
        return $this->product[$id];
    }
    
    public function getDes($id){
        return $this->product[$id];
    }
    public function setComment($comment,$id){
        $sql = "SELECT * FROM rs_content_comment WHERE id = ".$id;
        $data = $this->db->query($sql);
        $comments = array();
        $i = 0;
        foreach($data->data as $comment)
        {
             $comments[$i]['userpost'] = $comment['userpost'];
             $comments[$i]['body'] = $comment['body'];
             $comments[$i]['time'] = $comment['time'];
             $i++;
        }
        $cm = new stdClass();
        $cm->data = $comments;
        unset($comments);
        return $cm;
    }
    public function getDetails($id){
        session_start();
        $com ="";
        if(session_is_registered('user')){
            $com = '<dl><form action="libs/modules/comment.php" method="post" class="cm ' .$id. '">
                        <input type="text" name="user" class="comment_hiden" value="'.$_SESSION['user'].'"/>
                        <input type="text" name="id_menu" class="comment_hiden" value="' .$id. '"/>
                        <input type="text" size="80%" name="comment_text" class="text_comment"/><input name="commented" type="button" value="Submit" onclick="return checkcomment('.$id.')"/>
                    </form></dl>';
        }
        $return = "<dl class=\"product_detail ".$id."\">
                        <dt class=\"product_id\"><a href=\"index.php?module=view&amp;id=".$id."\">".$this->name."</a></dt>
                        <dd class=\"product_name\">".$this->name."</dd>
                        <dd class=\"product_des\">".$this->des."</dd>
                        <dd class=\"product_comment ".$id."\">
                        ".$this->comment.$com."
                            <div class=\"clr\"><div>
                        </dd>
                    </dl>";
        return $return;
    }
    public function getItemRss(){
        $return = "<item>
                    <title>".$this->name."</title>
                    <link>http://".$_SERVER['SERVER_NAME']."/Web/index.php?module=view&amp;id=".$this->id."</link>
                    <guid isPermaLink=\"false\">http://".$_SERVER['SERVER_NAME']."/modules.php?id=".$this->id."</guid>
                    <category><![CDATA[Salads]]></category>
                    <description><![CDATA[
                        <p>".$this->name."</p>
                        <div name=\"menuimage\"><img src=\"http://".$_SERVER['SERVER_NAME']."/Web/img.jpg\"/></div>
                        <div name=\"menuprice\">".$this->des."</div>
                        <div name=\"product_comment\">".$this->comment."</div>
                    ]]></description>
                </item>";
        return $return;
    }
}

?>