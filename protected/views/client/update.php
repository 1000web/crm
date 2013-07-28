<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu = $this->menuOperations('update',$model->id);

?>

<h1>Update Client <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>