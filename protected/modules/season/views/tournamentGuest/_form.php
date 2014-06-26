<?php
/* @var $this TournamentGuestController */
/* @var $model TournamentGuest */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tournament-guest-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'place'); ?>
		<?php echo $form->textField($model,'place'); ?>
		<?php echo $form->error($model,'place'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_name'); ?>
		<?php echo $form->textField($model,'team_name'); ?>
		<?php echo $form->error($model,'team_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_matches'); ?>
		<?php echo $form->textField($model,'total_matches'); ?>
		<?php echo $form->error($model,'total_matches'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'win'); ?>
		<?php echo $form->textField($model,'win'); ?>
		<?php echo $form->error($model,'win'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'draw'); ?>
		<?php echo $form->textField($model,'draw'); ?>
		<?php echo $form->error($model,'draw'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'defeat'); ?>
		<?php echo $form->textField($model,'defeat'); ?>
		<?php echo $form->error($model,'defeat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'goal_stat'); ?>
		<?php echo $form->textField($model,'goal_stat',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'goal_stat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'points'); ?>
		<?php echo $form->textField($model,'points'); ?>
		<?php echo $form->error($model,'points'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->