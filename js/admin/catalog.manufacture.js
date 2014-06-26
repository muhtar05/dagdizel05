/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function showAddManufactureForm() {
    $.ajax({
        type:"POST",
        url:"/admin/manufacture/create/",
        success:function(msg) {
            $('.action-form').empty();
            $('.action-form').append(msg);
            $('.action-form').show();
        }
    });
}
function closeManufactForm() {
    $('.action-form').empty();
    $('.action-form').hide();
}
function saveManufacture() {
    var href = $('#manufacture-form').attr('action');
    $.post(href, $('#manufacture-form').serialize(), function(msg){
        if (msg == 'create' || msg == 'update') {
            $('.action-form').empty();
            showManufactureListForm();
        } else {
            $('.action-form').empty();
            $('.action-form').append(msg);
        }
    });
}
function addCountry() {
    $(document).ready(function(){
        if ($('#Country_name').get(0) == undefined){
                $('#Manufacture_countryId').after(' <input type="text" name="Country[name]" id="Country_name" value="" /> ');
                $('#addCountryButton').after('<button type="button" name="cancel" id="closeAddCountryForm" >Отмена</button>')
        }
        if ($('#Country_name').attr('value') != "") {
                
            $.ajax({
                type: "POST",
                url:"/admin/country/create",
                data: 'Country[name]='+$('#Country_name').attr('value'),
                success : function(msg) {
                    if (msg.match(/((\"[a-zA-ZА-Яа-я0-9\s]*\")\:*)((\"[a-zA-ZА-Яа-я0-9\s]*\")\:*)/)) {
                        $('#Manufacture_countryId option').each(function(){
                            $(this).remove();
                        });
                        var select = $.evalJSON(msg);

                        for(i = 0; i < select.length; i++) {
                            $('#Manufacture_countryId').append($('<option value="'+select[i]['id']+'" '+(select[i]['selected'] == "true" ? 'selected="selected"' : "")+' >'+select[i]['name']+'</option>'));
                        }
                        $('#Manufacture_countryId').prepend('<option value="">-- пусто --</option>');
                        $('#Country_name').remove();
                        $('#closeAddCountryForm').remove();
                    } else {
                        //alert(res);
                        
                    }
                }
            });
        }
    });
}

$(document).ready(function(){
   $('#closeAddCountryForm').on('click', function(){
        $('#Country_name').remove();
        $('#closeAddCountryForm').remove();
   })
});
