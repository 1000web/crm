<?php
/* @var $this CustomerContactController */
/* @var $model CustomerContact */

$attr = array(
    array('name' => 'customer_id', 'label' => 'Клиент', 'value' => $model->customer->value),
//        array('name' => 'value', 'label' => 'Значение'),
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

