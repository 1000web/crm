<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Tasks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Task', 'url'=>array('index')),
	array('label'=>'Create Task', 'url'=>array('create')),
	array('label'=>'Update Task', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Task', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Task', 'url'=>array('admin')),
);
?>

<h1>View Task #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'create_time',
		'update_time',
		'create_user_id',
		'update_user_id',
		'task_type_id',
		'datetime',
		'user_id',
		'value',
		'description',
	),
)); ?>
