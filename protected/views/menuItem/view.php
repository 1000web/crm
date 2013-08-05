<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

$this->breadcrumbs=array(
	'Menu Items'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MenuItem', 'url'=>array('index')),
	array('label'=>'Create MenuItem', 'url'=>array('create')),
	array('label'=>'Update MenuItem', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MenuItem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MenuItem', 'url'=>array('admin')),
);
?>

<h1>View MenuItem #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'create_time',
		'update_time',
		'create_user_id',
		'update_user_id',
		'parent_id',
		'menu_id',
		'item_id',
		'prior',
		'visible',
	),
)); ?>
