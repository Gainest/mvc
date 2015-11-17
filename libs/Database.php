<?php

class Database extends PDO {

    function __construct() {
        //parent::__construct('mysql:host=localhost;dbname=mvc', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8';")); // 必须要这样做否则乱码无数
         parent::__construct('mysql:host='.SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT.';dbname='.SAE_MYSQL_DB, SAE_MYSQL_USER, SAE_MYSQL_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8';"));// 心里app 的配置
    }

}

?>
