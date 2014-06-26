<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'players-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array("enctype" =>"multipart/form-data"),
)); ?>
    <?php echo $form->errorSummary($model); ?>



    <div class="control-group">
        <?php echo $form->labelEx($model,'firstname'); ?>
        <?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'firstname'); ?>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'lastname'); ?>
        <?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'lastname'); ?>
    </div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'born_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                  'language'=>'ru',
                  'model'=>$model,
                  'attribute'=>'born_date',

                  'options'=>array(
                         'showAnim'=>'fold',
                         'dateFormat'=> 'yy-mm-dd',
                         'changeMonth'=>true,
                         'changeYear'=> true,
                         'yearRange'=>'1940:2030'
                  ),
             ));
        ?>
		<?php echo $form->error($model,'born_date'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'amplua_id'); ?>
		<?php echo $form->dropDownList($model,'amplua_id',Lookup::items('PlayerAmplua')); ?>
		<?php echo $form->error($model,'amplua_id'); ?>
	</div>



    <div class="control-group">
        <?php echo $form->labelEx($model,'number'); ?>
        <?php echo $form->textField($model,'number',array('size'=>20,'maxlength'=>20)); ?>
        <?php echo $form->error($model,'number'); ?>
    </div>



    <div class="control-group">
		<?php echo $form->labelEx($model,'height'); ?>
		<?php echo $form->textField($model,'height',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'height'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->fileField($model,'img',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'img'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'info'); ?>
		<?php echo $form->textArea($model,'info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'info'); ?>
	</div>

    <div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->