<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->breadcrumbs=array(
	'Organizations'=>array('index'),
	$model->name,
);

$this->menu = $this->menuOperations('view', $model->id);

?>

<h1>View Organization #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'create_time',
		'update_time',
		'create_user',
		'update_user',
		'name',
	),
)); ?>
