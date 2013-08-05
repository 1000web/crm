<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs = array(
    'Задачи' => array('index'),
    $model->value => array('view', 'id' => $model->id),
    'Редактировать',
);

$this->menu = $this->menuOperations('update');

?>

    <h1><?php echo $model->value; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>