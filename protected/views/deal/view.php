<?php
/* @var $this DealController */
/* @var $this->_model Deal */

$attr = array(
    /*
        'owner_id',
        'organization_id',
        'customer_id',
        'deal_source_id',
        'deal_stage_id',
        'amount',
        'probability',
        'close_date',
    /**/
    array('name' => 'inner_number', 'label' => $this->attributeLabels('inner_number')),
    array('name' => 'external_number', 'label' => $this->attributeLabels('external_number')),
    array('name' => 'open_date', 'label' => $this->attributeLabels('open_date')),
    array('name' => 'close_date', 'label' => $this->attributeLabels('close_date'), 'value' => $this->_model->close_date),
    array('name' => 'value', 'label' => $this->attributeLabels('value')),
    array('name' => 'owner_id', 'label' => $this->attributeLabels('owner_id'), 'value' => $this->_model->owner->username),
    array('name' => 'organization_id', 'label' => $this->attributeLabels('organization_id'), 'value' => $this->_model->organization->value),
    array('name' => 'customer_id', 'label' => $this->attributeLabels('customer_id'), 'value' => $this->_model->customer->value),
    array('name' => 'deal_source_id', 'label' => $this->attributeLabels('deal_source_id'), 'value' => $this->_model->deal_source->value),
    array('name' => 'deal_stage_id', 'label' => $this->attributeLabels('deal_stage_id'), 'value' => $this->_model->deal_stage->value),
    array('name' => 'amount', 'label' => $this->attributeLabels('amount')),
    array('name' => 'probability', 'label' => $this->attributeLabels('probability')),
    array('name' => 'description', 'label' => $this->attributeLabels('description')),
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
