<?php
/* @var $this DealController */
/* @var $dataProvider CActiveDataProvider */

echo $this->renderPartial('_filter_buttons');

$this->buttons = $this->columns = array();

$this->addColumns(array(
    'inner_number',
    'external_number',
    'open_date',
    'organization_id',
    'customer_id',
    'deal_source_id',
    'deal_stage_id',
    'value',
    //array('name' => 'description', 'header' => $this->attributeLabels('description')),
));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
