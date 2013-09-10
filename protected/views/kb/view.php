<?php
/* @var $this KbController */
/* @var $this->_model Kb */

$attr = array(
    array('name' => 'state', 'label' => 'State'),
    array('name' => 'value', 'label' => 'Значение'),
    array('name' => 'question', 'label' => 'Question'),
    array('name' => 'answer', 'label' => 'Answer'),
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
