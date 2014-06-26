<?php
/* @var $this OnlineMatchPlayersController */
/* @var $data OnlineMatchPlayers */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_id')); ?>:</b>
	<?php echo CHtml::encode($data->team_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('goal')); ?>:</b>
	<?php echo CHtml::encode($data->goal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('yelow_card')); ?>:</b>
	<?php echo CHtml::encode($data->yelow_card); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('red_card')); ?>:</b>
	<?php echo CHtml::encode($data->red_card); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('change')); ?>:</b>
	<?php echo CHtml::encode($data->change); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('team_composition')); ?>:</b>
	<?php echo CHtml::encode($data->team_composition); ?>
	<br />

	*/ ?>

</div>