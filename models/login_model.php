<?php

class login_Model extends Model {

    public function __construct() {
        //echo 1111;
        //echo md5('admin');
        parent::__construct();
    }

    public function test() {
        //echo 'helo database';
    }

    public function run() {
        $_POST['login'];
        $_POST['password'];
        // if($_POST['login']==null||$_POST['password']==null）
        // {
              // 	return false;
              //}
        $sth = $this->db->prepare("SELECT * FROM users WHERE 
              login= :login AND password = md5(:password)");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => $_POST['password'],
        ));
        //$data = $sth->fetchAll();
        
       
        //print_r($data);
        //die();
        $count = $sth->rowCount();
        if ($count > 0) {
            Session::init();
            Session::set('loggedIn', true);
            Session::set('hospital_id', $data['hospital_id']);
            Session::set('id', $data['id']);
            Session::set('login', $data['login']);
            header('Location: ../dashboard');
           // echo 111;
        } else {
            //echo URL;
            header('Location: '.URL.'login', TRUE);
        }

        // print_r($data);
    }

}

?>
