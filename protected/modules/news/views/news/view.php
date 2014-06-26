<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Новости'=>array('index'),
	$model->title,
);
?>

<h1><?php echo $model->title;?></h1>

<?php echo $model->text;?>
