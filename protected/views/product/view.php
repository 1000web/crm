<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->id,
);

$this->menu = $this->menuOperations('view', $model->id);

?>

<h1><?php echo $model->value; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_type_id',
		'value',
		'description',
	),
)); ?>
