<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Продукты' => array('index'),
	'Создать',
);

$this->menu = $this->menuOperations('create');

?>

<h1>Создать продукт</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>