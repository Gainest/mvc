<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>派单系统</title>



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
    <?php Session::init(); ?>
    <body>
<div class="container-fluid" id="top">
    <div class="row-fluid">
        <div class="span12">
            <h3>
                派单系统
            </h3>
        </div>
    </div>
</div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span6">
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a href="<?php echo URL ?>index">Index</a>
                        </li>
                        <li>
                            <a href="<?php echo URL ?>help">help</a>
                        </li>
                        <li class="disabled">
                            <?php if (Session::get('loggedIn') == true): ?>
                                <a href="<?php echo URL; ?>dashboard/logout">Logout</a>
                            <?php else: ?>
                                <a href="<?php echo URL ?>login">login</a>
                            <?php endif; ?>
                        </li>
                        <li class="dropdown pull-right">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">下拉<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">操作</a>
                                </li>
                                <li>
                                    <a href="#">设置栏目</a>
                                </li>
                                <li>
                                    <a href="#">更多设置</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">分割线</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="span6">
                </div>
            </div>
        </div>