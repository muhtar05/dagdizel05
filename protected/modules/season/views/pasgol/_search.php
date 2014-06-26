<?php
/* @var $this PasgolController */
/* @var $model Pasgol */
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
		<?php echo $form->label($model,'player_name'); ?>
		<?php echo $form->textField($model,'player_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'goal'); ?>
		<?php echo $form->textField($model,'goal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pas'); ?>
		<?php echo $form->textField($model,'pas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->