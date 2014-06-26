<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<?php

$this->breadcrumbs=array(
	'Table Results'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TableResult', 'url'=>array('index')),
	array('label'=>'Create TableResult', 'url'=>array('create')),
);
?>

<h1>Таблица результатов</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'table-result-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,

	'columns'=>array(
		array(
          'name'=>'id',
          'htmlOptions'=>array(
              'id'=>'columnId',
          )
        ),
		'name',
        array(
            'name'=>'team_1',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_1',
            ),
        ),
        array(
            'name'=>'team_2',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_2',
            ),
        ),

        array(
            'name'=>'team_3',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_3',
            ),
        ),
        array(
            'name'=>'team_4',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_4',
            ),
        ),
        array(
            'name'=>'team_5',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_5',
            ),
        ),
        array(
            'name'=>'team_6',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_6',
            ),
        ),
        array(
            'name'=>'team_7',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_7',
            ),
        ),

        array(
            'name'=>'team_8',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_8',
            ),
        ),
        array(
            'name'=>'team_9',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_9',
            ),
        ),
        array(
            'name'=>'team_10',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_10',
            ),
        ),
        array(
            'name'=>'team_11',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_11',
            ),
        ),
        array(
            'name'=>'team_12',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_12',
            ),
        ),

        array(
            'name'=>'team_13',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_13',
            ),
        ),
        array(
            'name'=>'team_14',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_14',
            ),
        ),
        array(
            'name'=>'team_15',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_15',
            ),
        ),
        array(
            'name'=>'team_16',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_16',
            ),
        ),
		array(
            'name'=>'team_17',
            'type'=>'raw',
            'htmlOptions'=>array(
               'class'=>'team_17',
            ),
        ),

        array(
            'name'=>'team_18',
            'type'=>'raw',
            'htmlOptions'=>array(
                'class'=>'team_18',
            ),
        ),

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


<script type="text/javascript">
    $(function(){
        $("#table-result-grid tr td").dblclick(function(){
           var valueCurrent = $(this).html();
           var rowId = $(this).siblings("#columnId").html();
           var htmlCurrent = '<form><input type="text" size="7" name="result" id="result" value="'+ valueCurrent +'" /> <input type="hidden"  name="columnName" id="columnName" value="'+ $(this).attr('class') +'" />  <input type="hidden" size="7" name="resultId" id="resultId" value="'+ rowId +'" /> <button>Ок</button></form>';
           $(this).html(htmlCurrent);
        });


        $("#table-result-grid tr td button").live('click',function(){
            var th = $(this);
            var dates = $(this).parents("form").serialize();
            $.ajax({
               url:'<?php echo CHtml::normalizeUrl(array('saveresult'));?>',
               type: "POST",
               data: dates,
               success: function(data){
                  th.parent().parent().html(data);
               }
            });

            return false;
        });

    });
</script>