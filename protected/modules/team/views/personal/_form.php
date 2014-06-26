<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personal-form',
    'htmlOptions' => array("enctype" =>"multipart/form-data"),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="control-group">
		<?php echo $form->labelEx($model,'fio'); ?>
		<?php echo $form->textField($model,'fio',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'fio'); ?>
	</div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'personal_type'); ?>
        <?php echo $form->dropDownList($model,'personal_type',array(
                                                         Personal::PERSONAL_PERSONAL=>'Персонал',
                                                         Personal::PERSONAL_LEADING=>'Руководство',
        )); ?>
        <?php echo $form->error($model,'personal_type'); ?>
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
                'yearRange'=>'1930:2030'
            ),
        ));
        ?>
        <?php echo $form->error($model,'born_date'); ?>
    </div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'info'); ?>
		<?php echo $form->textArea($model,'info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'info'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->fileField($model,'img',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'img'); ?>
	</div>

    <div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->