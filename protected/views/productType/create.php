<?php
/* @var $this ProductTypeController */
/* @var $model ProductType */

$this->breadcrumbs=array(
	'Product Types'=>array('index'),
	'Create',
);

$this->menu = $this->menuOperations('create');

?>

<h1>Create ProductType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>