<?php
/* @var $this OnlineMatchPlayersController */
/* @var $model OnlineMatchPlayers */
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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'team_id'); ?>
		<?php echo $form->textField($model,'team_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'goal'); ?>
		<?php echo $form->textField($model,'goal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'yelow_card'); ?>
		<?php echo $form->textField($model,'yelow_card'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'red_card'); ?>
		<?php echo $form->textField($model,'red_card'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'change'); ?>
		<?php echo $form->textField($model,'change'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'team_composition'); ?>
		<?php echo $form->textField($model,'team_composition'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->