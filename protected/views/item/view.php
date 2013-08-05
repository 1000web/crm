<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs = array(
    'Пункты меню' => array('index'),
    $model->value,
);

$this->menu = $this->menuOperations('update', $model->id);

?>

<h1><?php echo $model->value; ?></h1>

<?php
$attr = CMap::mergeArray(
    $this->created_updated($model),
    array(
        array('name' => 'module', 'label' => 'Значение'),
        array('name' => 'controller', 'label' => 'Значение'),
        array('name' => 'action', 'label' => 'Значение'),
        array('name' => 'title', 'label' => 'Title'),
        array('name' => 'h1', 'label' => 'H1'),
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

<?php
/*
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'parent_id',
        'create_time',
        'update_time',
        'create_user_id',
        'update_user_id',
        'module',
        'controller',
        'action',
        'title',
        'h1',
        'value',
        'description',
    ),
)); /**/?>
