<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];
    $sex = $_POST['gioitinh'];
    $email = $_POST['email'];
    $message = "Ok ssssssssssssssssss";
    $group = '0';
    $db = new Db($registry);
    $sql = "INSERT INTO rs_sys_user(`username`,`pass`,`email`,`group`) values('".$username."','".$passwd."','".$email."',0)";
    $db->query($sql);
}else{
    include_once('./libs/modules/register.html');
}
?>