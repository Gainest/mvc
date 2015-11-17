<script style="text\javascript">
    $(document).ready(function() { 
        var old = null; 
        //$("#count-row").hide(); 
        $("input").each(function(){
            if(this.checked){  
                old = this; //如果当前对象选中，保存该对象  
            } 
            this.onclick = function(){  
                if(this == old){//如果点击的对象原来是选中的，取消选中  
                    this.checked = false;  
                    old = null;  
                } else{  
                    old = this;  
                }  
            }  
            // $("input").click(function(){
                
            ///   $id=$(this).attr("value");
            //alert(id);
            //  var old=$("#hospital_"+$id);
            //  old
            // $length=$("#hospital_"+$id).attr("checked");
            // var list= $('input:radio[id="'+$test+'"]:checked').val();
            // if(list!=null){
            //     $("#hospital_"+$id).attr("checked",false);
            //  }
           
        });
    }); 

 
    $(document).ready(function(){  
        var old = null; //用来保存原来的对象  
        $("input[name='sex']").each(function(){//循环绑定事件  
            if(this.checked){  
                old = this; //如果当前对象选中，保存该对象  
            }  
            this.onclick = function(){  
                if(this == old){//如果点击的对象原来是选中的，取消选中  
                    this.checked = false;  
                    old = null;  
                } else{  
                    old = this;  
                }  
            }  
        });  
    });  
</script>

<?php
foreach ($this->data as $kye => $value) {
    echo '<span class="help-block"><input type="radio" id="hospital_' . $value[0] . '" name="' . $value[0] . '" value="' . $value[1] . '" />' . $value[1] . '</span>';
}
?>
