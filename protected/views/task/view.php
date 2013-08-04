<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs = array(
    'Операции' => array('index'),
    $model->id,
);

$this->menu = $this->menuOperations('view');

?>

<h1><?php echo $model->value; ?></h1>

<?php
$attr = CMap::mergeArray(
    $this->created_updated($model),
    array(
        array('name' => 'task_type_id', 'label' => 'Тип задачи', 'value' => $model->taskType->value),
        array('name' => 'datetime', 'label' => 'Дата/время', 'value' => $model->datetime),
        array('name' => 'user_id', 'label' => 'Пользователь', 'value' => $model->user->username),
        array('name' => 'value', 'label' => 'Значение'),
        array('name' => 'description', 'label' => 'Описание'),
    )
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));
?>