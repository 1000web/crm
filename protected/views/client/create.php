<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'Create',
);

$this->menu = $this->menuOperations('create');

?>

<h1>Create Client</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>