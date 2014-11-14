<?php
    class User{
        private $user;
        public function __construct($registry){
            include_once 'Db.class.php';
            $this->db = new Db($registry);
        }
        public function login($username,$passwd){
            $sql = "select * from rs_sys_user where username='" . $_POST['user'] . "' and pass='" . $_POST['passwd']."'";
            $login = $this->db->query($sql);
            return ($login->num_rows == 1)?true:false;
        }
        
        public function logout()
        {
            
        }
    }
?>