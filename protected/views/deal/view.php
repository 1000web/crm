<?php
/* @var $this DealController */
/* @var $model Deal */

if (!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

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
    array('name' => 'value', 'label' => $this->attributeLabels('value')),
    array('name' => 'owner_id', 'label' => $this->attributeLabels('owner_id'), 'value' => $model->owner->username),
    array('name' => 'organization_id', 'label' => $this->attributeLabels('organization_id'), 'value' => $model->organization->value),
    array('name' => 'customer_id', 'label' => $this->attributeLabels('customer_id'), 'value' => $model->customer->value),
    array('name' => 'deal_source_id', 'label' => $this->attributeLabels('deal_source_id'), 'value' => $model->dealSource->value),
    array('name' => 'deal_stage_id', 'label' => $this->attributeLabels('deal_stage_id'), 'value' => $model->dealStage->value),
    array('name' => 'amount', 'label' => $this->attributeLabels('amount')),
    array('name' => 'probability', 'label' => $this->attributeLabels('probability')),
    array('name' => 'close_date', 'label' => $this->attributeLabels('close_date'), 'value' => $model->close_date),
    array('name' => 'description', 'label' => $this->attributeLabels('description')),
);
if ($this->checkAccess($this->id, 'log')) $attr = CMap::mergeArray(
    $this->created_updated($model),
    $attr
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));