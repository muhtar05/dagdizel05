<?php
/* @var $this TournamentGuestController */
/* @var $data TournamentGuest */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('place')); ?>:</b>
	<?php echo CHtml::encode($data->place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_name')); ?>:</b>
	<?php echo CHtml::encode($data->team_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_matches')); ?>:</b>
	<?php echo CHtml::encode($data->total_matches); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('win')); ?>:</b>
	<?php echo CHtml::encode($data->win); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('draw')); ?>:</b>
	<?php echo CHtml::encode($data->draw); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('defeat')); ?>:</b>
	<?php echo CHtml::encode($data->defeat); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('goal_stat')); ?>:</b>
	<?php echo CHtml::encode($data->goal_stat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('points')); ?>:</b>
	<?php echo CHtml::encode($data->points); ?>
	<br />

	*/ ?>

</div>