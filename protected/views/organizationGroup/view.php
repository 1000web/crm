<?php
/* @var $this OrganizationGroupController */
/* @var $model OrganizationGroup */

$this->breadcrumbs=array(
	'Organization Groups'=>array('index'),
	$model->id,
);

$this->menu = $this->menuOperations('view', $model->id);

?>

<h1>View OrganizationGroup #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'create_time',
		'update_time',
		'create_user_id',
		'update_user_id',
		'value',
		'description',
	),
)); ?>
