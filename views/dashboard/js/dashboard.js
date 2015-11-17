/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 * function add(i,name){
    $("#ul").append('<li class="active"><a href="#panel-'+i+'" data-toggle="tab" data-toggle="tab">'+name+'部分<span onclick="delet('+i+');" id="panel-'+i+'" class="label label-important">&times</span></a></li>');
    $("#panel").append('<div  class="tab-pane active" id="panel-'+i+'">'+i+'<iframe src="<?php echo URL; ?>index" name="show" height="500px" width="100%"frameborder="0" scrolling="auto" id="frmDialog"></iframe></div>');
// alert(name);
}
 */
  
  
function iframe() {
    var winWidth = parseInt(document.documentElement.clientWidth);// 客户端浏览器宽度
    var winHeight = parseInt(document.documentElement.clientHeight);// 客户端浏览器高度
    // iframe全屏
    //document.getElementById("frmDialog").width = winWidth + "px";
    //document.getElementById("frmDialog").height = winHeight + "px";
    // iframe半屏
    document.getElementById("frmDialog").width = (winWidth*0.8) + "px";
    document.getElementById("frmDialog").height = (winHeight*0.8) + "px";
}; 
function init(){
    $("#ul li").removeClass("active"); 
    $("#panel div").removeClass("active");
}

function init2(){
    $("#ul li:eq(0)").addClass("active"); 
    $("#panel-5").addClass("active");
}

    


    

function findDetail(obj){
    var id = $(obj).attr("id");
    $('#'+id).parent().parent().remove();
    $('#'+id).remove();
       
}
   

    // $(function(){
    //    alert(1);
    //});
   

