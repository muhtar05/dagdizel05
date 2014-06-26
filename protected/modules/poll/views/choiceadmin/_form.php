<?php
/* @var $this ChoiceController */
/* @var $model Choice */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'choice-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'choice_text'); ?>
		<?php echo $form->textArea($model,'choice_text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'choice_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'votes'); ?>
		<?php echo $form->textField($model,'votes'); ?>
		<?php echo $form->error($model,'votes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'question_id'); ?>
		<?php echo $form->dropDownList($model,'question_id',CHtml::listData(Question::model()->findAll(),'id','question_text')); ?>
		<?php echo $form->error($model,'question_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->