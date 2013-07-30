<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs = array(
    'Tasks' => array('index'),
    $model->id,
);

$this->menu = $this->menuOperations('view');

?>

<h1>View Task #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'create_time',
        'update_time',
        'create_user_id',
        'update_user_id',
        'task_type_id',
        'datetime',
        'user_id',
        'value',
        'description',
    ),
)); ?>
