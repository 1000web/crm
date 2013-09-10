<?php
/* @var $this TaskStageController */
/* @var $this->_model TaskStage */

$attr = array(
    array('name' => 'prior', 'label' => 'Приоритет'),
    array('name' => 'finished', 'label' => 'Активность', 'value' => ($this->_model->finished?'Неактивна':'Активна')),
    array('name' => 'value', 'label' => 'Значение'),
    array('name' => 'description', 'label' => 'Описание'),
);
if (MyHelper::checkAccess($this->id, 'log')) $attr = CMap::mergeArray(
    $this->created_updated($this->_model),
    $attr
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
    'data' => $this->_model,
));

