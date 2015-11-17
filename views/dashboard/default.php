<!DOCTYPE html>
<script type="text/javascript" src="<?php echo URL ?>views/dashboard/js/dashboard.js"></script>

<script type="text/javascript">
    function delet(i,name){
        var id="ul-"+i;
        $('#'+id).parent().parent().remove();
        $('#panel-'+i).remove();       // 这里莫名其妙 出了错 小心
         init();
        init2();
    }
    function add(i,name,url){
        //$("#ul").append('<li class="active"><a href="#panel-'+i+'" data-toggle="tab" data-toggle="tab">'+name+'<span onclick="delet('+i+');" id="panel-'+i+'" class="label label-important">&times</span></a></li>');
        $("#panel").append('<div class="tab-pane active " id="panel-'+i+'"><iframe src="'+url+'" name="show" height="500px" width="100%"frameborder="0" scrolling="auto" id="frmDialog"></iframe></div>');
        // alert(name);
        $("#ul").append('<li class="active"><a href="#panel-'+i+'" data-toggle="tab">'+name+'<span onclick="delet('+i+');" id="ul-'+i+'" class="label label-important">&times</span></a></li>');
        // $("#panel").append(' <div class="tab-pane active" id="panel-'+i+'" ><iframe src="'+url+'" name="show" height="500px" width="100%"frameborder="0" scrolling="auto" id="frmDialog"></iframe></div>');
    }
    jQuery(function($){
        
        //添加行
        var eq0=0;
        var eq1=0;
        var eq2=0;
        var eq3=0;
        var eq4=0;
        var i=0;
        $("ul li:eq(0)").click(function(){  
            
            var volume=$("#ul li").length;
            //alert(volume);
            if(eq0!=0){
                delet(eq0);
                init();
                add(eq0,"添加客户",'<?php echo URL; ?>dashboard/add_customer'); 
                //add();
            }else{
                for(i=0;i<=volume;i++){
                    if($("#ul li:eq("+i+")").length > 0){
                        // alert("存在");
                    }else{
                        //alert( "不存在"); 
                        if(eq0==0){
                            init();
                            add(i,"添加客户",'<?php echo URL; ?>dashboard/add_customer');
                            //add();
                            eq0=i;// return 0;
                        }
                
                    }
                }
            }
                 
        });
        $("ul li:eq(1)").click(function(){   
            
            var volume=$("#ul li").length;
            //alert(volume);
            if(eq1!=0){
                delet(eq1);
                init();
                add(eq1,"添加医院",'<?php echo URL; ?>dashboard/add_hospital'); 
            }else{
                for(i=0;i<=volume;i++){
                    if($("#ul li:eq("+i+")").length > 0){
                        //alert("存在");
                    }else{
                        //alert( "不存在"); 
                        if(eq1==0){
                            init();
                            add(i,"添加医院",'<?php echo URL; ?>dashboard/add_hospital');
                            eq1=i;// return 0;
                        }
                
                    }
                }
            }
               
        });
        $("ul li:eq(2)").click(function(){   
            
            var volume=$("#ul li").length;
            //alert(volume);
            if(eq2!=0){
                delet(eq2);
                init();
                add(eq2,"添加系统用户",'<?php echo URL; ?>dashboard/add_user'); 
            }else{
                for(i=0;i<=volume;i++){
                    if($("#ul li:eq("+i+")").length > 0){
                        //alert("存在");
                    }else{
                        //alert( "不存在"); 
                        if(eq2==0){
                            init();
                            add(i,"添加系统用户",'<?php echo URL; ?>dashboard/add_user');
                            eq2=i;// return 0;
                        }
                
                    }
                }
            }
               
        });
        //***---------------
        //  alert( "不存在"); 
        //              if(eq0==0){  init();i=0;add(i);eq0=1;i++// return 0;
        //             }else{
        //                    if(eq0>=1){
        //                      i=0; delet(i); init(); add(i); eq0=2; }
        //          
        //              }
        
        //  -------------***/
        //------------------------------------------
        //$("ul li:eq(2)").click(function(){     
        //   if(eq2==0){init();i=2; add(i);eq2=1;;// return 0;
        //  }else{
        //     if(eq2>=1){
        //        i=2; delet(i); init(); add(i); eq2=2; }
        //}         
        //});
        $("ul li:eq(3)").click(function(){  
            //var name=this.attr("id");
            //alert(name);
            var volume=$("#ul li").length;
            //alert(volume);
            if(eq3!=0){
                delet(eq3);
                init();
                add(eq3,"查看用户",'<?php echo URL; ?>dashboard/check_customer'); 
            }else{
                for(i=0;i<=volume;i++){
                    if($("#ul li:eq("+i+")").length > 0){
                        //alert("存在");
                    }else{
                        //alert( "不存在"); 
                        if(eq3==0){
                            init();
                            add(i,"查看用户",'<?php echo URL; ?>dashboard/check_customer');
                            eq3=i;// return 0;
                        }
                
                    }
                }
            }     
        });
        
        
    });
</script>
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
        <div class="span2">

            <ul class="nav  nav-list " >

                <li <?PHP if($_SESSION['hospital_id']!=0){echo 'style="display:none"';}?>>
                    <a href="#"   >添加客户信息</a>
                </li>
<!---
添加医院这类 操作只能管理员权限才能操作
----->
                <li <?PHP if($_SESSION['hospital_id']!=0){echo 'style="display:none"';}?>>
                    <a href="#"   >添加医院</a>
                </li>

                <li <?PHP if($_SESSION['hospital_id']!=0){echo 'style="display:none"';}?>>
                    <a href="#"  >添加系统用户</a>
                <li>
                    <a href="#">查看用户</a>
                </li>
                <li class="nav-header">
                    功能列表
                </li>
                <li>
                    <a href="#">资料</a>
                </li>
                <li>
                    <a href="#">设置</a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="#">帮助</a>
                </li>
            </ul>
        </div>

        <div class="span10">
            <div class="tabbable" id="tabs-1">
                <ul class="nav nav-tabs" id="ul">

                    <li class="active">
                        <a href="#panel-5" data-toggle="tab">第一部分</a>
                    </li>

                    <!--- <li>

                        <a href="#panel-2" data-toggle="tab">第二部分<span class="label label-important">&times;</span></a>
                    </li>
                    <li>
                        <a href="#panel-3" data-toggle="tab">第3部分<span class="label label-important">&times;</span></a>
                    </li>--->

                </ul>
                <div class="tab-content" id="panel">


                    <div class="tab-pane active" id="panel-5">
                        注意检查您收到的信息！
                    </div>

                    <!---  <div class="tab-pane" id="panel-2">
                          <p>
                              第二部分内容.
                          </p>
                      </div>
                      <div class="tab-pane" id="panel-3">
                          <p>
                              第3部分内容.
                          </p>
                      </div>--->
                </div>
            </div>
        </div>
    </div>
</div>