<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <form class="form-horizontal" action="add_user_form" method="POST">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">账号</label>
                    <div class="controls">
                        <input id="inputEmail" type="text" name="login" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">密码</label>
                    <div class="controls">
                        <input id="inputPassword" type="password" name="password" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="hospital_id">所属医院id</label>
                    <div class="controls">
                        <input id="inputPassword" type="text" name="hospital_id" />
                        <label class="alert label " for="hospital_id">如果为0则属于管理员账号</label>
                    </div>
                    
                </div>
               
                
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">添加</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>