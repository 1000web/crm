<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

$this->breadcrumbs  = $this->make_breadcrumbs('view', $model);
$this->menu         = $this->menuOperations('view', $model->id);

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
