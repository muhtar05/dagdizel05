<?php
/* @var $this PasgolController */
/* @var $data Pasgol */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('place')); ?>:</b>
	<?php echo CHtml::encode($data->place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('player_name')); ?>:</b>
	<?php echo CHtml::encode($data->player_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('goal')); ?>:</b>
	<?php echo CHtml::encode($data->goal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pas')); ?>:</b>
	<?php echo CHtml::encode($data->pas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />


</div>