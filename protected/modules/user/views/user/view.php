<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('admin'),
	$model->id,
);

?>
<?php print User::model()->getUsersAccessArrayByRole(User::USER);?>
<h1>Пользователь #<?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'fio',
		'password',
		'email',
		'roleId',
		'ip_address',
		'last_visit',
		'registration_date',
		'ban',
	),
)); ?>
