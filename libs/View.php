<?php

class View {

    function __construct() {
        //echo 'this is the view</br>';
    }

    public function render($noinclude = false, $name = null) {
        if ($noinclude == true && $name == null) {


            require 'views/header.php';
            require 'views/index.php';
            require 'views/footer.php';
        } else {
            require 'views/header.php';
            require 'views/' . $name . '.php';
            //echo $this->msg;
            require 'views/footer.php';
        }
    }

    public function dashboard_theme($noinclude = false, $name = null) {
        if ($noinclude == true) {
            require 'views/' . $name . '.php';
        } else {
            require 'views/dashboard/header.php';
            require 'views/' . $name . '.php';
            require 'views/dashboard/footer.php';
        }
    }

}

?>
