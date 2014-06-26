<?php
/* @var $this TableresultController */
/* @var $data TableResult */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_1')); ?>:</b>
	<?php echo CHtml::encode($data->team_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_2')); ?>:</b>
	<?php echo CHtml::encode($data->team_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_3')); ?>:</b>
	<?php echo CHtml::encode($data->team_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_4')); ?>:</b>
	<?php echo CHtml::encode($data->team_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_5')); ?>:</b>
	<?php echo CHtml::encode($data->team_5); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('team_6')); ?>:</b>
	<?php echo CHtml::encode($data->team_6); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_7')); ?>:</b>
	<?php echo CHtml::encode($data->team_7); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_8')); ?>:</b>
	<?php echo CHtml::encode($data->team_8); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_9')); ?>:</b>
	<?php echo CHtml::encode($data->team_9); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_10')); ?>:</b>
	<?php echo CHtml::encode($data->team_10); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_11')); ?>:</b>
	<?php echo CHtml::encode($data->team_11); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_12')); ?>:</b>
	<?php echo CHtml::encode($data->team_12); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_13')); ?>:</b>
	<?php echo CHtml::encode($data->team_13); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_14')); ?>:</b>
	<?php echo CHtml::encode($data->team_14); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_15')); ?>:</b>
	<?php echo CHtml::encode($data->team_15); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_16')); ?>:</b>
	<?php echo CHtml::encode($data->team_16); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_17')); ?>:</b>
	<?php echo CHtml::encode($data->team_17); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_18')); ?>:</b>
	<?php echo CHtml::encode($data->team_18); ?>
	<br />

	*/ ?>

</div>