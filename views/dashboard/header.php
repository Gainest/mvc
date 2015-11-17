<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Dashboard</title>



        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>public/css/bootstrap.min.css">

        <script type="text/javascript" src="<?php echo URL ?>public/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo URL ?>public/js/bootstrap.min.js"></script>
       <!-- <script type="text/javascript">
               $(function(){
                alert(1);
            });
       <link rel="stylesheet" type="text/css" href="<?php echo URL ?>public/css/default.css">
        </script>-->
        <style type="text/css">
            #top {
                padding-top: 50px;
            }
        </style>
    </head>

    <body>
        <?php if (isset($this->feedback)): ?>
            <?php if (!$this->feedback): ?>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <h4>
                                    提示!
                                </h4> <strong>警告!</strong> 数据有误.
                            </div>

                        <?php else : ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <h4>
                                    提示!
                                </h4> <strong>成功!</strong> 添加成功.<?php //echo $this->feedback;       ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>