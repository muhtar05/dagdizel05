<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с  <span class="required">*</span> обязательны для заполнения</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="control-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'language'=>'ru',
            'model'=>$model,
            'attribute'=>'date',
            'options'=>array(
                'dateFormat'=> 'yy-mm-dd',
                'showAnim'=>'fold',
                'changeMonth'=>true,
                'changeYear'=> true,
            ),
        ));
        ?>
        <?php echo $form->error($model, 'date'); ?>
    </div>
    <div class="control-group">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textField($model,'content',array('style'=>'width:500px;')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>


    <div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->