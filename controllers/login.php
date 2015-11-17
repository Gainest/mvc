<?php

class login extends Controller {

    function __construct() {
        parent::__construct();

        // $this->view->render('login/index');
    }

    function index() {
       // require 'models/login_model.php';
        //$model = new Login_Model();
        $this->model->test();
        $this->view->render(0,'login/index');
    }
    function run(){
        $this->model->run();
    }
}

?>
