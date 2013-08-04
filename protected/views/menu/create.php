<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs = array(
	'Меню' => array('index'),
	'Создать',
);

$this->menu = $this->menuOperations('create');

?>

<h1>Создать Меню</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>