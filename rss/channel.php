<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */
include_once '../libs/class/Rss.class.php';
include_once '../config/config_new.php';

    
        $rss = new Rss($_GET['id'], $CONFIG);
        if (is_null($rss->getRss())) {
            echo "null";
        } else {
            echo $rss->getRss();
        }
?>