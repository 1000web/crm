<?php
/* @var $this OrganizationContactController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('_filter_buttons');

$this->buttons = $this->columns = array();

if($this->checkAccess('organization', 'view')) {
    $this->buttons['list'] = array(
        'icon' => 'icon-list',
        'url'=>'Yii::app()->createUrl("organization/view", array("id"=>$data->organization_id))',
        'label' => $this->attributeLabels('organization'),
    );
}
$this->addButtons('organizationcontact', array('view','update','delete'));

$this->addColumns(array(
    'id',
    'organization_id',
    'contact_type_id',
    'value',
    'description',
));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
