/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function showModulesWindow(_this, _id) {
        $.ajax({
                type:"post",
                url:"/admin/modules/getall/",
                data:"id="+_id,
                success:function(msg){
                        $('#overflow').remove();
                        $('#loadAjaxFrom').append(msg);
                }
                
        });
}


