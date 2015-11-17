<?php
//print_r($this->data);
foreach ($this->data[0] as $key => $value) {
    $data[$key] = $value;
}
?>
<?php //echo $data["name"];               ?>

<?php
//echo $data["oder_number"];
$this->model->bbs_insert($data["distribute_id"], $data["oder_number"]);
?>

<legend>添加新客户</legend> 
<div class="container-fluid">
    <div class="row-fluid">

        <fieldset>
            <div class="span4">
                <span class="help-block">姓名：<?php echo $data["name"]; ?></span>
                <span class="help-block">年龄：<?php echo $data["age"]; ?></span>

                <span class="help-block">地址：<?php echo $data["address"]; ?></span>
                <span class="help-block">来源：<?php echo $data["source"]; ?></span>
                <span class="help-block">QQ：<?php echo $data["qq"]; ?></span>

            </div>
            <div class="span4">
                <span class="help-block">咨询项目：<?php echo $data["consult"]; ?></span>
                <span class="help-block">跟进客服：<?php echo $data["customer_server"]; ?></span>
                <span class="help-block">性别：<?php $data["gender"] == 1 ? print("男")  : print("女"); ?></span>
                <span class="help-block">电话：<?php echo $data["telephone"]; ?></span>
                <span class="help-block">预算：<?php echo $data["budget"]; ?></span>



            </div>
            <div class="span4">
                <label>咨询内容：</label>

                <span class="help-block">
                    <textarea rows="3" cols="20" name="consult_content">
                        <?php echo $data["consult_content"]; ?>
                    </textarea></span>
                <label>分配医院：</label>

                <?php
                //print_r($this->bbs);
                //print_r($test);
                $test = unserialize($data["distribute_id"]);
                //print_r($test);
                // $i=0;
                $dialog = array();
                foreach ($test as $key => $value) {
                    if ($_SESSION['hospital_id'] == 0) {
                        echo $value . "&nbsp";
                    } else {
                        if ($_SESSION['hospital_id'] == $key) {
                            echo $test[$key];
                        }
                    }
                    foreach ($this->bbs as $bbs) {
                        // print_r($bbs['From']);
                        if ($bbs['From'] == $key || $bbs['To'] == $key) {
                            //echo $bbs['From'];
                            $dialog[$key][] = $bbs;
                        }
                    }
                    //$i++;
                }
                ?>
            </div>

        </fieldset>
        <?php //echo URL.$_GET['url'];  ?>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <?php
            //print_r($this->bbs);
            //print_r($dialog);
            ?>
            <?php if ($_SESSION['hospital_id'] == 0): ?>
                <?php foreach ($test as $key => $value): ?>
                    <form action="<?php echo URL . $_GET['url']; ?>" method="POST">
                        <fieldset>
                            <?php if ($dialog != null): ?>
                                <?php foreach ($dialog[$key] as $result): ?>
                                    <?php if ($result['From'] == 0): ?>
                                        <label class=" alert-success">我对<?php echo $value; ?>说:"<?php echo $result['content']; ?>"-<?php echo date('Y-m-d h:i:s', $result['time']); ?></label>
                                    <?php else: ?>
                                        <label class="alert-info"><?php echo $value; ?>对我说:"<?php echo $result['content']; ?>"-<?php echo date('Y-m-d h:i:s', $result['time']); ?></label>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <input type="text" name="<?php echo $key; ?>"/> 
                            <button type="submit" class="btn ">提交</button>
                        </fieldset>
                    </form>
                <?php endforeach; ?>
            <?Php else: ?>
                <form action="<?php echo URL . $_GET['url']; ?>" method="POST">
                    <fieldset>
                        <?php if ($dialog != null): ?>
                            <?php foreach ($dialog[$_SESSION['hospital_id']] as $result): ?>
                                <?php // print_r($result) ?>
                                <?php if ($result['From'] == $_SESSION['hospital_id']): ?>
                                    <label class=" alert-success"><?php echo $test[$_SESSION['hospital_id']]; ?>对管理员说:"<?php echo $result['content']; ?>"-<?php echo date('Y-m-d h:i:s', $result['time']); ?></label>
                                <?php else: ?>
                                    <label class="alert-info">管理员对<?php echo $test[$_SESSION['hospital_id']]; ?>说:"<?php echo $result['content']; ?>"-<?php echo date('Y-m-d h:i:s', $result['time']); ?></label>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <input type="text" name="<?php echo 0; ?>"/> <!--将来根据需求修改--->
                        <button type="submit" class="btn " onclick="click()">提交</button>
                    </fieldset>
                </form>

            <?php endif; ?>

        </div>
    </div>
    <script type="text/javascript">
        function refresh(){
            
            windowl.location.href=window.location.href;
        }

        function click(){
            setTimeout(refresh(),3000);
        }
    </script>
</div>