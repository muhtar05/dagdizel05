$('table.treetable tr').click(function(){
    $('table.treetable tr').each(function(){
        var cssclass = $(this).attr('class');
        cssclass = cssclass.replace('selected', '');
        $(this).attr('class', cssclass);
    });
    $(this).addClass('selected');
});
$('table.treetable tr').each(function(i){
    $(this).attr('class', (i % 2 == 0 ? "odd" : "even"));
});

function updateNavigationPosition($elementId) {
    
    var input = $("#position_"+$elementId);
    var position = $("#position_"+$elementId).attr('value');
    var objId = $elementId;
    
    $.ajax({
        type: "POST",
        url:"/admin/navigation/updateposition/id/"+objId,
        data:"Navigation[position]="+position,
        success : function(msg){
            if (msg == "yes") {
                input.css('background-color', '#BCE774');
            } else {
                input.css('background-color', 'red');
            }

        }
    });
}