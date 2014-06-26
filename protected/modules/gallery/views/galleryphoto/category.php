<?php
$this->breadcrumbs=array(
    'Галереи'=>array('/gallery/gallery/admin'),
    $galleryName,
    'Управление',
);
?>
<div class="well" style="margin-top:20px; ">
    <?php echo CHtml::link('Добавить',array('create','gallery_id'=>$_GET['id']),array('class'=>'btn btn-primary'));?>
</div>


<?php
//Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js');
$str_js = "
    var fixHelper = function(e,ui) {
        ui.children().each(function(){
            $(this).width($(this).width());
        });
        return ui;
    };

    $('#gallery-photo-grid table.items tbody').sortable({
        forcePlaceholderSize:true,
        forceHelperSize: true,
        items: 'tr',
        update : function() {
            serial = $('#gallery-photo-grid table.items tbody').sortable('serialize',{key:'items[]',attribute:'class'});
            $.ajax({
                'url': '".$this->createUrl('/gallery/galleryphoto/sort')."',
                'type': 'post',
                'data': serial,
                'success': function(data){
                },
                'error':function(request,status,error){
                    alert('Error');
                }

            });
        },
        helper: fixHelper
    }).disableSelection();
";
Yii::app()->clientScript->registerScript('sortable-project',$str_js);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'gallery-photo-grid',
    'dataProvider'=>$dataProvider,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover items',
    'rowCssClassExpression'=>'"items[]_{$data->id}"',
    'columns'=>array(
        'id',
        array(
            'name'=>'img',
            'type'=>'html',
            'value'=>'CHtml::image($data->findIMGByResolution("100x100", "width"),"",array("style"=>"width:100px;height:100px;"))',
        ),

        array(
            'class'=>'CButtonColumn',
            'template'=>'{setmain}{update}{delete}',
            'buttons'=>array(
                 'setmain'=>array(
                     'label'=>'Установить обложкой',
                     'url'=>'Yii::app()->createUrl("gallery/galleryphoto/setmain", array("id"=>$data->id))',
                 ),
            ),
        ),
    ),
)); ?>

