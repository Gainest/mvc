<?php

class Help extends Controller {

    function __construct() {
        parent::__construct();
        //echo "we are inside help</br>";
    }

    function index() {
        $this->view->blah = $this->model->blah();
        $this->view->render(0, 'help/index');
    }

    public function other($arg = false) {
        //$this->view->render('help/index');
        echo 'we are inside other</br>';
        echo 'optional:' . $arg . '</br>';

        // $this->model->blah();
        $this->view->blah = $this->model->blah();
        $this->view->render('help/index', 0);
    }

}

?>
