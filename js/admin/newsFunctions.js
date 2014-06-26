/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $('#seo_attributes').on('click', function() {
        $(this).next('div.seo_attributes').toggle('slow');
    });
    if ($('#News_title_keyWords').val() != "" || $('#News_title_description').val() != "" ) {
         $('div.seo_attributes').show();
    }
});

