<?php
/* @var $this ModulesController */
/* @var $model Modules */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'modules-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>522)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'code_name'); ?>
		<?php echo $form->textField($model,'code_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'code_name'); ?>
	</div>

    <div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->