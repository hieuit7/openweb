<?php
    if(!file_exists('../config/config1.php')){
        header('Location: ../install.php');
    }
    @include_once '../libs/class/Regitry.class.php';
    @include_once '../libs/class/Db.class.php';
    @include_once '../libs/class/MySql.class.php';
?>