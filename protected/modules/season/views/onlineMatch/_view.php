<?php
/* @var $this OnlineMatchController */
/* @var $data OnlineMatch */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('match_id')); ?>:</b>
	<?php echo CHtml::encode($data->match_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_home')); ?>:</b>
	<?php echo CHtml::encode($data->team_home); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_guest')); ?>:</b>
	<?php echo CHtml::encode($data->team_guest); ?>
	<br />


</div>