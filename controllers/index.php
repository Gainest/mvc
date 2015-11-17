<?php

class Index extends Controller {

    function __construct() {
       parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == FALSE) {
            Session::destroy();
            header('Location:login');
            exit;
        }
    }

    function index() {
        $this->view-> __CLASS__ = __CLASS__  ; 
        $this->view->msg = "we are in index</br>";
        $this->view->render(1);
    }

    function detail() {
         $this->view->msg = "we are in detail</br>";
        $this->view->render('index/index');
    }

}

?>
