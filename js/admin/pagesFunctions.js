$(document).ready(function(){
    $('#seo_attributes').on('click', function() {
        $(this).next('div.seo_attributes').toggle('slow');
    });
    if ($('#Pages_title_keyWords').val() != "" || $('#Pages_title_description').val() != "" ) {
         $('div.seo_attributes').show();
    }
});