<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <form class="form-horizontal" action="add_hospital_form" method="POST">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">医院名称</label>
                    <div class="controls">
                        <input id="inputEmail" type="text" name="hospital_name" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">所在地区</label>
                    <div class="controls">
                        <input id="inputPassword" type="text" name="address_name" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">地区编号</label>
                    <div class="controls">
                        <input id="inputPassword" type="text" name="address_id" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">医院编号</label>
                    <div class="controls">
                        <input id="inputEmail" type="text" name="hospital_id" />
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