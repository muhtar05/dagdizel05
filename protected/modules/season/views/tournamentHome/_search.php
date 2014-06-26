<?php
/* @var $this TournamentHomeController */
/* @var $model TournamentHome */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'place'); ?>
		<?php echo $form->textField($model,'place'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'team_name'); ?>
		<?php echo $form->textField($model,'team_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_matches'); ?>
		<?php echo $form->textField($model,'total_matches'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'win'); ?>
		<?php echo $form->textField($model,'win'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'draw'); ?>
		<?php echo $form->textField($model,'draw'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'defeat'); ?>
		<?php echo $form->textField($model,'defeat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'goal_stat'); ?>
		<?php echo $form->textField($model,'goal_stat',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'points'); ?>
		<?php echo $form->textField($model,'points'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->