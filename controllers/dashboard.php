<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == FALSE) {
            //echo 111;
            Session::destroy();
            header('Location:http://localhost/MVC/login');
            //header('Location:login');
            //exit;
        }
    }

    function index() {
        //$this->view-> __CLASS__  =  __CLASS__ ;
        //$this->view->render(0,'dashboard/index');
        $this->view->dashboard_theme(0, 'dashboard/default');
    }

    function add_customer() {
        $this->view->address = $this->model->select_address();
        $this->view->dashboard_theme(0, 'dashboard/customer');
    }

    function run() {
        // print_r($_POST);

        $this->model->run();
        if (isset($this->model->error)) {
            $this->view->feedback = $this->model->error;
        } elseif (isset($this->model->success)) {
            $this->view->feedback = $this->model->success;
        }
        $this->add_customer();
    }

    function add_hospital() {
        $this->view->dashboard_theme(0, 'dashboard/add_hospital');
    }

    function add_hospital_form() {
        $this->model->add_hospital_form();
        if (isset($this->model->error)) {
            $this->view->feedback = $this->model->error;
        } elseif (isset($this->model->success)) {
            $this->view->feedback = $this->model->success;
        }
        $this->add_hospital();
    }

//我觉得这里应该属于model 环节 不能在控制器里面体现

    function ajax_display() {//customer页面ajax显示
        // print_r($_POST);
        $this->view->data = $this->model->select_hospital();

        $this->view->dashboard_theme(0, 'dashboard/ajax');
    }

    function add_user() {
        $this->view->dashboard_theme(0, 'dashboard/add_user');
    }

    function add_user_form() {
        $this->model->add_user_form();

        if (isset($this->model->error)) {
            $this->view->feedback = $this->model->error;
        } elseif (isset($this->model->success)) {
            $this->view->feedback = $this->model->success;
        }
        $this->add_user();
    }

    function check_customer() {
        $this->view->data = $this->model->check_customer();
        $this->view->dashboard_theme(0, 'dashboard/check_customer');
    }

    function check_customer_detail($data) {
        //echo $data;
        $this->view->bbs = $this->model->bbs_select($data, $_SESSION['hospital_id']);
        $this->view->data = $this->model->check_customer_detail($data);


        $this->view->model = $this->model;
        $this->view->dashboard_theme(0, 'dashboard/check_customer_detail');
    }

    function logout() {
        Session::destroy();
        header('location:../login');
        exit;
    }

}

?>
