/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
        
        $('#seo_attributes div.content').hide();
        $('#seo_attributes legend').on('click', function(){
                var display = $('#seo_attributes .content').css('display');
                if (display == 'none') {
                        $('#seo_attributes .content').slideDown('slow');
                } else {
                        $('#seo_attributes .content').slideUp('slow');
                }
        });
//        $('#top-menus ul li').mouseover(function(){
//                $(this).children('ul').show();
//        });
//        $('#top-menus ul li').mouseout(function(){
//                $(this).children('ul').hide();
//        });

        $("#loadingImg").ajaxStart(function(){
                $(this).show();
        });
        $("#loadingImg").ajaxStop(function(){
                $(this).hide();
        });
        
        $('ul.categoryList li input[type="checkbox"]').on('click',function(){
                var li = $(this).parent('span').parent('li');
                if ($(this).is(':checked')) {
                    li.addClass('selected');
                } else {
                    li.removeClass('selected');    
                }
        });
        
});
function closeForm (form) {
        $('#'+form).remove();
}
function updatePosition($element, $path) {

        var input = $($element);
        var elementName = $($element).attr('name');
        var position = $($element).attr('value');
        var objId = elementName.split("_")[1];
        var level = elementName.split("_")[2];
        $.ajax({
                type: "POST",
                url:$path+"updateposition/id/"+objId+"/position/"+position+"/level/"+level,
                //data:"CatalogCategory[position]="+position+"&CatalogCategory[level]="+level,
                //data:"CatalogCategory[position]="+position,
                success : function(msg){
                        if (msg == "yes") {
                                input.css('background-color', '#BCE774');
                        } else {
                                input.css('background-color', 'red');
                        }

                }
        });
}