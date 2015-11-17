<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class dashboard_Model extends Model {

    static $error;

    public function __construct() {
        //echo 1111;
        //echo md5('admin');
        parent::__construct();
        //$error1++;
    }

    function run() {
        //echo "in the model run";
        // print_r($_POST['address']);
        $data = array();
        foreach ($_POST as $key => $value) {
            if (is_numeric($key)) {
                $data[$key] = $value;
            } else {
                $_POST[$key] = htmlspecialchars($value);
            }
        }
        //die();
        // print_R($data);
        $data_serialize = serialize($data);
        $oder_number = time();
        //print_R(md5($data));
        //$data=  unserialize($data);
        //print_R($data);
        if (!isset($_POST['gender'])) {
            //echo isset($_POST['gender']);
            $this->error = 0;
            //die();
            //echo $this->error;
            // header('Location: add_customer');
            return false;
        }
        //die();
        try {
            $sql = "insert into customer
                    (name,gender,age,address,source,qq,consult,customer_server,budget,consult_content,distribute_id,oder_number,telephone)
             values (:name,:gender,:age,:address,:source,:qq,:consult,:customer_server,:budget,:consult_content,:distribute_id,:oder_number,:telephone)";
            $sth = $this->db->prepare($sql);
            $sth->execute(array(
                ':name' => $_POST['name'],
                ':gender' => $_POST['gender'],
                ':age' => $_POST['age'],
                ':address' => $_POST['address'],
                ':source' => $_POST['source'],
                ':qq' => $_POST['qq'],
                ':consult' => $_POST['consult'],
                ':customer_server' => $_POST['customer_server'],
                ':budget' => $_POST['budget'],
                ':consult_content' => $_POST['consult_content'],
                ':distribute_id' => $data_serialize,
                ':oder_number' => $oder_number,
                ':telephone' => $_POST['telephone'],
            ));
            if (!($sth->rowCount())) {
                $this->error = 0;
                //die();
                return FALSE;
            } else {
                $sql_conbine = "INSERT INTO `distribution` (`id`, `distribute_id`, `hospital_id`, `oder_number`, `bbs_id`) 
                                                        VALUES (NULL,:distribute_id,:hospital_id,:oder_number,:bbs_id)";
                $bbs = "INSERT INTO `mvc`.`bbs` ( `From`, `To`, `content`, `time`, `distribute_id`, `order_number`)
                                VALUES ( :from, :to, :content, :time, :distribute_id, :order_number)";
                $sth_conbine = $this->db->prepare($sql_conbine);
                $sth_bbs = $sth = $this->db->prepare($bbs);
                $from = $_SESSION['hospital_id'];
                foreach ($data as $key => $value) {
                    $sth_conbine->execute(array(
                        ':distribute_id' => $data_serialize,
                        ':hospital_id' => $key,
                        ':oder_number' => $oder_number,
                        ':bbs_id' => $oder_number
                    ));
                    //-------------------------------------//


                    $sth_bbs->execute(array(
                        ':from' => $from,
                        ':to' => $key,
                        ':time' => $oder_number,
                        ':distribute_id' => $data_serialize,
                        ':content' => "有新用户发给你",
                        ':order_number' => $oder_number,
                    ));

                    //----------------------------------//
                }
                if (!($sth_bbs->rowCount())) {
                    $this->error = 0;

                    return FALSE;
                    //die();
                };
                if (!($sth_conbine->rowCount())) {
                    $this->error = 0;
                    //die();
                    return FALSE;
                }
            }
        } catch (PDOExecption $e) {

            print "Error!: " . $e->getMessage() . "</br>";
            die();
        }


        $this->success = 1;


        /*
          $data = $sth->fetchAll(); */
    }

    function select_address() {
        $sql = "SELECT DISTINCT `address_name`,`address_id` FROM `address_hospital` ";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        $data = $sth->fetchAll();
        // print_r($data);
        // die();

        return $data;
    }

    function select_hospital() {
        $sql = "SELECT DISTINCT `hospital_id`,`hospital_name` FROM `address_hospital` where `address_id`=:address_id  ";
        $sth = $this->db->prepare($sql);
        $sth->execute(array(':address_id' => $_POST['value']));
        $data = $sth->fetchAll();
        // print_r($data);
        // die();

        return $data;
    }

    function add_hospital_form() {
        //print_r($_POST);
        // foreach ($_POST as $key => $value) {
        //echo "':" . $key . "'=>" . '$_POST[\'' . $key . '\'],';
        //echo  $key . ",";
        // }
        if ($_POST['address_id'] == null) {
            //echo isset($_POST['gender']);
            $this->error = 0;
            //die();
            //echo $this->error;
            // header('Location: add_customer');
            return false;
        }
        try {
            $sql = "insert into address_hospital (hospital_name,address_name,address_id,hospital_id)
            values (:hospital_name,:address_name,:address_id,:hospital_id)";
            $sth = $this->db->prepare($sql);
            $sth->execute(array(
                ':hospital_name' => $_POST['hospital_name'],
                ':address_name' => $_POST['address_name'],
                ':address_id' => $_POST['address_id'],
                ':hospital_id' => $_POST['hospital_id'],
            ));
            //$data=$sth->fetchAll();
            // echo $sth->errorCode()."<br>";
            // echo $sth->rowCount();
            // die();
            if (!($sth->rowCount())) {
                $this->error = 0;
                return FALSE;
            };

            //die();
        } catch (PDOExecption $e) {

            print "Error!: " . $e->getMessage() . "</br>";
            die();
        }
        $this->success = 1;
        //die();
    }

    function add_user_form() {
        // print_r($_POST);
        // foreach ($_POST as $key => $value) {
        //echo "':" . $key . "'=>" . '$_POST[\'' . $key . '\'],';
        //echo  $key . ",";
        // }
        if ($_POST['hospital_id'] == null) {
            //echo isset($_POST['gender']);
            $this->error = 0;
            //die();
            //echo $this->error;
            // header('Location: add_customer');
            return false;
        }
        // die();
        $password = md5($_POST['password']);
        try {
            $sql = "insert into users (login,password,hospital_id)
                    values (:login,:password,:hospital_id)";
            $sth = $this->db->prepare($sql);
            $sth->execute(array(
                ':login' => $_POST['login'],
                ':password' => $password,
                ':hospital_id' => $_POST['hospital_id']
            ));
            //$data=$sth->fetchAll();
            // echo $sth->errorCode()."<br>";
            //echo $sth->rowCount();
            //die();
            if (!($sth->rowCount())) {
                $this->error = 0;

                return FALSE;
                //die();
            };

            //die();
        } catch (PDOExecption $e) {

            print "Error!: " . $e->getMessage() . "</br>";
            die();
        }
        $this->success = 1;
        //die();
    }

    function check_customer() {

        //print_r($_SESSION);
        //DIE();
        if ($_SESSION['hospital_id'] != 0) {
            $sql = "SELECT DISTINCT b.login ,a.*,c.oder_number FROM users b,`customer` a ,distribution c
            WHERE c.`oder_number`=a.`oder_number` and b.hospital_id=:id and  b.hospital_id=c.hospital_id";
        } else {
            $sql = "SELECT DISTINCT b.login ,a.*,c.oder_number FROM users b,`customer` a ,distribution c 
            WHERE c.`oder_number`=a.`oder_number` and b.hospital_id=:id ";
        }
        $sth = $sth = $this->db->prepare($sql);
        $sth->execute(array(
            ':id' => $_SESSION['hospital_id'],
        ));
        $data = $sth->fetchAll();
        //print_r($data);
        //die();
        return $data;
    }

    function check_customer_detail($oder_number) {

        //print_r($_SESSION);
        //DIE();
        $sql = "SELECT * FROM `customer` WHERE `oder_number`=:oder_number";
        $sth = $sth = $this->db->prepare($sql);
        $sth->execute(array(
            ':oder_number' => $oder_number,
        ));
        $data = $sth->fetchAll();
        //print_r($data);
        //die();
        return $data;
    }

    function bbs_insert($distribute_id, $oder_number) {
        //print_r($_POST);
        //die();
        if ($_POST == NULL) {
            return FALSE;
        }

        foreach ($_POST as $key => $value) {
            $to = $key;
            $content = $value;
        }
        if (!isset($_POST[$key]) || $_POST[$key] == NULL) {
            //die();
            return FALSE;
            //die();
        }
        // echo $to;
        // echo $content;
        //die();
        $from = $_SESSION['hospital_id'];
        $sql = "INSERT INTO `mvc`.`bbs` ( `From`, `To`, `content`, `time`, `distribute_id`, `order_number`)
                                VALUES ( :from, :to, :content, :time, :distribute_id, :order_number)";
        $sth = $sth = $this->db->prepare($sql);
        $sth->execute(array(
            ':from' => $from,
            ':to' => $to,
            ':time' => time(),
            ':distribute_id' => $distribute_id,
            ':content' => $content,
            ':order_number' => $oder_number,
        ));
        if (!($sth->rowCount())) {
            $this->error = 0;

            return FALSE;
            //die();
        };
        //print_r($_POST);
    }

    function bbs_select($oder_number, $id) {
        //echo $oder_number."<br>";
        //echo $id;
        $sql = "SELECT * FROM `bbs` WHERE `order_number`=:order_number and (  `From`=:from or `To`=:to )";
        $sth = $this->db->prepare($sql);
        $sth->execute(array(
            ':order_number' => $oder_number,
            ':from' => $id,
            ':to' => $id,
        ));
        $data = $sth->fetchAll();
        //print_r($data);
        //die();
        return $data;
    }

}

?>
