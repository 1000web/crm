<?php
/* @var $this ProductController */
/* @var $this->_model Product */

$attr = array(
    array('name' => 'product_type_id', 'label' => 'Тип Продукции', 'value' => $this->_model->product_type->value),
    array('name' => 'value', 'label' => 'Значение'),
    array('name' => 'description', 'label' => 'Описание'),
);
if (MyHelper::checkAccess($this->id, 'log')) $attr = CMap::mergeArray(
    $this->created_updated($this->_model),
    $attr
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $this->_model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));
