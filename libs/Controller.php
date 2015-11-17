<?php

class Controller {
    //public $model;
    function __construct() {
        //echo 'Main controller</br>';
        //print_r($this);
       // ECHO 'HELLO';
       $this->view=new View();
        
     
    }
    public function loadModel($name){
        
        $path='models/'.$name.'_model.php';
        if(file_exists($path)){
           require 'models/'.$name.'_model.php';
           
           $modelName=$name.'_Model';
           //echo $modelName;
           $this->model=new $modelName();
           //$this->model->test();
       }
    }
     
}
?>
