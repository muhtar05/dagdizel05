<?php
/* @var $this PasgolController */
/* @var $model Pasgol */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pasgol-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'place'); ?>
		<?php echo $form->textField($model,'place'); ?>
		<?php echo $form->error($model,'place'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'player_name'); ?>
		<?php echo $form->textField($model,'player_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'player_name'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'goal'); ?>
		<?php echo $form->textField($model,'goal'); ?>
		<?php echo $form->error($model,'goal'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'pas'); ?>
		<?php echo $form->textField($model,'pas'); ?>
		<?php echo $form->error($model,'pas'); ?>
	</div>
    <div class="control-group">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

    <div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->