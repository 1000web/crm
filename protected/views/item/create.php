<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Пункты меню'=>array('index'),
	'Создать',
);

$this->menu = $this->menuOperations('create');

?>

<h1>Создать Пункт меню</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>