<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
    'Комментарии'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Редактирование',
);
?>

<h1>Редактировать</h1>

<?php $this->renderPartial('_formUpdate', array('model'=>$model)); ?>