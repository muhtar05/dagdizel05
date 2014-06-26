/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var $photosId = 0;
$(document).ready(function(){
        $photosId = $('#files #fileFieldList div').length;

        $('.photos :checkbox').on('click', function(){
                
                var checkedId = this.id;
                
                $('.photos :checkbox').each(function(){
                        if (this.id != checkedId) {
                                $(this).attr('checked', false);
                        }
                });
        });

        $('a.deletePhoto').click(function(){
                if (confirm('Вы действительно хотите удалить фото?')) {
                        var _Url = $(this).attr('href');
                        var divIdBlock = $(this).parent('div').parent('div').attr('id');

                        $.ajax({
                                type: "POST",
                                url: _Url,
                                success : function (msg) {
                                        if (msg == 'ok') {
                                                $('#'+divIdBlock).hide('slow');
                                        } else {
                                                alert(msg);
                                        }
                                }
                        });
                }                
                return false;
        });
        $('a.editPhoto').click(function(){
                var isMain = $(this).prev().prev().prev();
                //value="'+(isMain.children('span').text() == "Да" ? "1" : "0" )+'"
                checkbox = '<input type="checkbox" value="1" '+(isMain.children('span').text() == "Да" ? "checked='checked'" : "" )+'  name="Photos_isMain" id="Photos_isMain" />';
                isMain.children('span').html(checkbox);

                var description = $(this).prev().prev();
                textarea = '<textarea rows="3" cols="35" name="description" id="Photos_description">'+description.text()+'</textarea>';
                description.html(textarea);
                $(this).prev().show();
                $(this).hide();
                return false;
        });
        $('a.savePhoto').click(function(){
                var link = $(this);
                var _Url = $(this).attr('href');
                var isMain = $(this).prev().prev().children('span');
                var description = $(this).prev();
                var divIdBlock = $(this).parent('div').parent('div').attr('id');
                
                $.ajax({
                        type: "POST",
                        url: _Url,
                        data: "isMain="+(isMain.children('input').is(":checked") == true ? "1" : "0" )+"&description="+description.children('textarea').get(0).value,
                        success : function (msg) {
//                                alert(msg);
                                if (msg == 'ok') {

                                        isMain.html(isMain.children('input').is(":checked") == true ? "Да" : "Нет");
                                        description.html(description.children('textarea').get(0).value);
                                        $('.photos').each(function(){
                                                if ($(this).attr('id') != divIdBlock) {
                                                        $(this).children('div').children('.isMainPhoto').children('span').html("Нет");
                                                }
                                        });
                                        link.hide();
                                        link.next().show();
                                } else {
                                        alert(msg);
                                }
                        }
                });
                return false;
        });

});
function addFileField() {
        
        html = '';
        html = '<div id="photo-'+$photosId+'" class="photos">';
        html = html + '<label for="Photos_isMain_'+$photosId+'" class="required" style="display:inline; cursor:pointer;">Главная фотография</label> <input value="1" name="PSPhotos[isMain]['+$photosId+']" id="Photos_isMain_'+$photosId+'" type="checkbox"> ';
        html = html + '<label for="ytPhotos_photoUrl_'+$photosId+'" class="required">Фото <span class="required">*</span></label>';
        html = html + '<input id="ytPhotos_photoUrl_'+$photosId+'" value="" name="PSPhotos[photoUrl]['+$photosId+']" type="hidden"><input name="PSPhotos[photoUrl]['+$photosId+']" id="Photos_photoUrl_'+$photosId+'" type="file">';
        html = html + '<label for="Photos_description" class="required">Описание </label> <textarea rows="1" cols="40" name="PSPhotos[description]['+$photosId+']" id="Photos_description_'+$photosId+'"></textarea>';
        html = html + '</div>';
        $('.photos:last').after(html);
        $photosId = $photosId + 1;
}

