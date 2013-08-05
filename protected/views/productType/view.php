<?php
/* @var $this ProductTypeController */
/* @var $model ProductType */

$this->breadcrumbs = array(
    'Типы Продукции' => array('index'),
    $model->id,
);

$this->menu = $this->menuOperations('view', $model->id);

?>

<h1><?php echo $model->value; ?></h1>

<?php
$attr = CMap::mergeArray(
    $this->created_updated($model),
    array(
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
