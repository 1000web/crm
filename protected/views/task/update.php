<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs = array(
    'Tasks' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = $this->menuOperations('update');

?>

    <h1>Update Task <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>