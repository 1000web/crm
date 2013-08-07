<?php
/* @var $this ProductController */
/* @var $model Product */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$attr = CMap::mergeArray(
    $this->created_updated($model),
    array(
        array('name' => 'product_type_id', 'label' => 'Тип Продукции', 'value' => $model->productType->value),
        array('name' => 'value', 'label' => 'Значение'),
        array('name' => 'description', 'label' => 'Описание'),
    )
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));
