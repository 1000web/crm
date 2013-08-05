<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs = array(
    'Задачи' => array('index'),
    'Создать',
);

$this->menu = $this->menuOperations('create');

?>

    <h1>Создать Задачу</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>