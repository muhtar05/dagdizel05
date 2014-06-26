/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//$('#Navigation_moduleId ').live('change', function(){
//    alert($(this).get(0).tagName);
//});

$("#loading").ajaxStart(function(){
    $(this).show();
 });
$("#loading").ajaxComplete(function(request, settings){
    $(this).hide();
});

//$('#Navigation_moduleId').live('change', function(){
//    alert();
//    var moduleId = $('#Navigation_moduleId option:selected').val();
//
//    $.ajax({
//        type:"POST",
//        data:"moduleId="+moduleId,
//        url: "/index.php/admin/navigation/loadmodule/",
//        success:function (msg) {
//
//        }
//    });
//});

//########################### добавление модуля ################################
$('#Navigation_moduleId').live('change', function(){
    alert();
    var moduleId = $('#Navigation_moduleId option:selected').val();

    $.ajax({
        type:"POST",
        data:"moduleId="+moduleId,
        url: "/index.php/admin/navigation/loadmodule/",
        success:function (msg) {

        }
    });
});


//########################### END добавление модуля ############################
