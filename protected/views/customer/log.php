<?php
/* @var $this CustomerController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

if($this->checkAccess('organization', 'view')) {
    $this->buttons['list'] = array(
        'icon' => 'icon-list',
        'url'=>'Yii::app()->createUrl("organization/view", array("id"=>$data->organization_id))',
        'label' => $this->attributeLabels('organization'),
    );
}
//$this->addButtons($this->id, array('view', 'update', 'delete', 'log'));
/*
$this->columns = array(
    array('name' => 'log_datetime', 'header' => $this->attributeLabels('datetime'), 'value' => 'date("Y-m-d H:i:s", $data->log_datetime)'),
    array('name' => 'log_user_id', 'header' => $this->attributeLabels('user_id'), 'value' => '$data->user->username'),
    array('name' => 'organization_id', 'header' => $this->attributeLabels('organization_id'), 'value' => '$data->organization->value'),
    array('name' => 'value', 'header' => $this->attributeLabels('value')),
    array('name' => 'position', 'header' => $this->attributeLabels('position')),
    array('name' => 'description', 'header' => $this->attributeLabels('description')),
);/**/
$this->addColumns(array('log_datetime', 'log_user_id', 'organization_id', 'value', 'position', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
