<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Меню'=>array('admin'),
	'Управление',
);

$this->menu=array(
	array('label'=>'List Menu', 'url'=>array('index')),
	array('label'=>'Create Menu', 'url'=>array('create')),
);
?>
<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>

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

    $('#menu-grid table.items tbody').sortable({
        forcePlaceholderSize:true,
        forceHelperSize: true,
        items: 'tr',
        update : function() {
            serial = $('#menu-grid table.items tbody').sortable('serialize',{key:'items[]',attribute:'class'});
            $.ajax({
                'url': '".$this->createUrl('/menu/menu/sort')."',
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

<h1>Меню</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'menu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover items',
    'rowCssClassExpression'=>'"items[]_{$data->id}"',
	'columns'=>array(
		'id',
		'title',
		'href',
		'sort',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
            'buttons'=>array(

            ),
		),
	),
)); ?>
