<?php

class Bootstrap {

    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        //print_r($url);
        //$url = isset($_GET['url'])?$_GET['url']:null;
        $url = rtrim($url, '/');

        //print_r($url);
        $url = explode('/', $url);
        //print_r($url);
        //echo $url;
        if (empty($url[0])) {
            require 'controllers/index.php';
            $controller = new index();
            $controller->index();
            return false;
            //$this->error();
        }
        $file = 'controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            $this->error();
        }

        $controller = new $url[0];
        $controller->loadModel($url[0]);
        /* 判断对象中的函数是否存在 */
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                //echo "11111111";
                $controller->{$url[1]}($url[2]);
                return false;
            } else {//echo "11111111";
                $this->error();
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                    return false;
                } else {
                    //echo "11111111";
                    $this->error();
                }
                //  $controller->{$url[1]}(); 
                return false; //执行到这里，意味着进入了，“主控制器”以下的其他控制器。
                //$controller->index();
            }
        }
        $controller->index();
    }

    function error() {
        require 'controllers/error.php';
        $controller = new Error();
        $controller->index();
        exit();
    }

}

?>
