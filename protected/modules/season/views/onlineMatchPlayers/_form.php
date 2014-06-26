<?php
/* @var $this OnlineMatchPlayersController */
/* @var $model OnlineMatchPlayers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'online-match-players-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
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
		<?php echo $form->labelEx($model,'team_id'); ?>
		<?php echo $form->textField($model,'team_id'); ?>
		<?php echo $form->error($model,'team_id'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'goal'); ?>
		<?php echo $form->textField($model,'goal'); ?>
		<?php echo $form->error($model,'goal'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'yelow_card'); ?>
		<?php echo $form->textField($model,'yelow_card'); ?>
		<?php echo $form->error($model,'yelow_card'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'red_card'); ?>
		<?php echo $form->textField($model,'red_card'); ?>
		<?php echo $form->error($model,'red_card'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'change'); ?>
		<?php echo $form->textField($model,'change'); ?>
		<?php echo $form->error($model,'change'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'team_composition'); ?>
		<?php echo $form->textField($model,'team_composition'); ?>
		<?php echo $form->error($model,'team_composition'); ?>
	</div>

    <div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->