<?php
/* @var $this DealController */
/* @var $dataProvider CActiveDataProvider */

echo $this->renderPartial('../deal/_filter_buttons');

$this->buttons = $this->columns = array();

$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns(array('inner_number', 'external_number', 'open_date','organization_id', 'customer_id','deal_source_id', 'deal_stage_id', 'value'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
