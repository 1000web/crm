<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs = array(
    'Tasks' => array('index'),
    'Create',
);

$this->menu = $this->menuOperations('create');

?>

    <h1>Create Task</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>