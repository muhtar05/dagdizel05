
<div class="view">
	<?php echo CHtml::link(CHtml::encode($data->question_text), array('view', 'id'=>$data->id)); ?><br />
	<b>Опрос открыт</b>
	<?php echo CHtml::encode($data->pub_date); ?>
</div>