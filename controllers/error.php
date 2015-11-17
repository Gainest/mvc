<?php
class Error extends Controller{

    function __construct() {
        parent::__construct();
         
       // echo 'this is an error';
       
    }
       function index(){
         $this->view->msg='this page dose not exit';
                $this->view-> __CLASS__= __CLASS__;
        $this->view->render(1);
    }

}

?>
