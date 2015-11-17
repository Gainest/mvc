<?php //print_r($this->data);     ?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">

            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>
                            姓名
                        </th>
                        <th>
                            性别
                        </th>
                        <th>
                            电话
                        </th>
                        <th>
                            咨询项目
                        </th>
                        <th>
                            派单单位
                        </th>
                        <th>
                            跟踪客服
                        </th>
                        <th>
                            状态
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->data as $key => $value): ?>
                        <tr  <?php
                    if (($key % 2) == 0) {
                        echo 'class="success"';
                    } else {
                        echo 'class="error"';
                    }
                        ?>  >
                            <td>
                                <?PHP echo $value['name']; ?>
                            </td>
                            <td>
                                <?PHP $value['gender'] == 1 ? print("男")  : print("女"); ?>
                            </td>
                            <td>
                                <?PHP echo $value['telephone']; ?>
                            </td>
                            <td>
                                <?PHP echo $value['consult']; ?>
                            </td>
                            <td>
                                <?PHP
                                //print_R($value['distribute_id']);
                                $data1 = unserialize($value['distribute_id']);

                                foreach ($data1 as $key1 => $value1) {
                                    if ($_SESSION['hospital_id'] == 0) {
                                        echo $value1 . "&nbsp";
                                    } else {
                                        if ($_SESSION['hospital_id'] == $key1) {
                                            echo $data1[$key1];
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?PHP echo $value['customer_server']; ?>
                            </td>
                            <td>
                                <?PHP echo $value['state']; ?>
                            </td>
                            <td>
                                <a href="<?PHP echo URL . 'dashboard/check_customer_detail/' . $value['oder_number']; ?>">查看</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>