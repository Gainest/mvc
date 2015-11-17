<script style="text\javascript">
    $(document).ready(function() { 
        //$("#count-row").hide(); 
        $("#woman").click(function(){   
            $("#man").attr("checked",false);
        }) 
        $("#man").click(function(){   
            $("#woman").attr("checked",false); 
        }) 
        $("#yes").click(function(){   
            $("#no").attr("checked",false);
        }) 
        $("#no").click(function(){   
            $("#yes").attr("checked",false); 
        }) 
        $("#yes2").click(function(){   
            $("#no2").attr("checked",false);
        }) 
        $("#no2").click(function(){   
            $("#yes2").attr("checked",false); 
        }) 
    });
     
    
</script>


<legend>添加新客户</legend> 
<div class="container-fluid">
    <div class="row-fluid">
        <form action="run" method="POST">
            <fieldset>
                <div class="span4">
                    <span class="help-block">姓名：<input type="text" name="name" /></span>
                    <span class="help-block">年龄：<input type="text" name="age" /></span>

                    <span class="help-block">地址：<input type="text" name="address" /></span>
                    <span class="help-block">来源：<input type="text" name="source" /></span>
                    <span class="help-block">QQ：<input type="text" name="qq"/></span>
                    <span class="help-block">咨询项目：<input type="text" name="consult"/></span>
                    <span class="help-block">跟进客服：<input type="text" name="customer_server"/></span>
                </div>
                <div class="span4">
                    <span class="help-block">性别：<input type="radio" id="woman" name="gender" value="0" />女<input type="radio" id="man" name="gender" value="1" />男</span>
                    <span class="help-block">电话：<input type="text" name="telephone" /></span>
                    <span class="help-block">预算：<select name="budget">
                            <option value ="5000">0-5000</option>
                            <option value ="10000">5000-10000</option>
                            <option value="20000">10000-20000</option>
                            <option value="100000">20000-100000</option>
                            <option value="1000000">100000以上</option>
                        </select></span>
                    <span class="help-block">短信通知：<input type="radio" id="yes" value="1" />是<input type="radio" id="no" value="0" />否</span>
                    <span class="help-block">短信通知跟进单位：<input type="radio" id="yes2" value="1" />是<input type="radio" id="no2" value="0" />否</span>
                    <span class="help-block">邮件通知跟进单位：<input type="radio" id="yes2" value="1" />是<input type="radio" id="no2" value="0" />否</span>

                </div>
                <div class="span4">
                    <label>咨询内容：</label>

                    <span class="help-block">
                        <textarea rows="3" cols="20" name="consult_content">
                          在w3school，你可以找到你所需要的所有的网站建设教程。
                        </textarea></span>
                    <label>分配医院：</label>
                    <div class="ajax">
                        
                        <select name="address" id="local">
                            <?php foreach($this->address as $key => $value):?>
                            <?php //echo $value[0];?>
                            <option value =" <?php echo $value[1];?>"><?php echo $value[0];?></option>
                                <?php endforeach;?>
                           
                        </select>

                        <div id="out"></div>

                    </div>
                </div>

            </fieldset>
            <button class="btn btn-large btn-primary" type="submit">提交</button>
        </form>
        <script type="text/javascript">
            jQuery(function($){
                
                $('#local option').click(function(){
                    //alert($(this).val());
                     $value = $(this).attr('value');
                    $('#out').empty().load('<?php echo URL; ?>dashboard/ajax_display',{ value : $value });// 载入地址
                });
            });
            
        </script>

    </div>
</div>