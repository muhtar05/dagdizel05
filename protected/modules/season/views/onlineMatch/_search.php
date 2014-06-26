<?php
/* @var $this OnlineMatchController */
/* @var $model OnlineMatch */
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
		<?php echo $form->label($model,'match_id'); ?>
		<?php echo $form->textField($model,'match_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'team_home'); ?>
		<?php echo $form->textField($model,'team_home'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'team_guest'); ?>
		<?php echo $form->textField($model,'team_guest'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->