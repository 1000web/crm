<?php
/* @var $this CustomerContactController */
/* @var $this->_model CustomerContact */

$attr = array(
    array('name' => 'customer_id', 'label' => 'Клиент', 'value' => $model->customer->value),
//        array('name' => 'value', 'label' => 'Значение'),
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

