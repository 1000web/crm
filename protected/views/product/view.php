<?php
/* @var $this ProductController */
/* @var $model Product */

$attr = array(
    array('name' => 'product_type_id', 'label' => 'Тип Продукции', 'value' => $model->product_type->value),
    array('name' => 'value', 'label' => 'Значение'),
    array('name' => 'description', 'label' => 'Описание'),
);
if (MyHelper::checkAccess($this->id, 'log')) $attr = CMap::mergeArray(
    $this->created_updated($model),
    $attr
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));
