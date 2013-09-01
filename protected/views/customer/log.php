<?php
/* @var $this CustomerController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

if ($this->checkAccess('organization', 'view')) {
    $this->buttons['list'] = array(
        'icon' => 'icon-list',
        'url' => 'Yii::app()->createUrl("organization/view", array("id"=>$data->organization_id))',
        'label' => $this->attributeLabels('organization'),
    );
}
$this->addColumns(array('organization_id', 'value', 'position', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
