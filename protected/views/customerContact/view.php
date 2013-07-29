<?php
/* @var $this CustomerContactController */
/* @var $model CustomerContact */

$this->breadcrumbs=array(
	'Customer Contacts'=>array('index'),
	$model->id,
);

$this->menu = $this->menuOperations('view', $model->id);

?>

<h1>View CustomerContact #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'create_time',
		'update_time',
		'create_user_id',
		'update_user_id',
		'contact_type_id',
		'customer_id',
		'value',
		'description',
	),
)); ?>
