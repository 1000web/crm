<?php
/* @var $this CustomerController */
/* @var $dataProvider CActiveDataProvider */

if($this->checkAccess('organization', 'view')) {
    $buttons['list'] = array(
        'icon' => 'icon-list',
        'url'=>'Yii::app()->createUrl("organization/view", array("id"=>$data->organization_id))',
        'label' => $this->attributeLabels('organization'),
    );
}
$controller = 'customer';
$buttons = array();
if($this->checkAccess($controller, 'favorite')) $buttons['favorite'] = array(
    'icon' => 'icon-star',
    'url'=>'Yii::app()->createUrl("'.$controller.'/favorite", array("del"=>$data->id))',
    'label' => $this->attributeLabels('favdel'),
);
if($this->checkAccess($controller, 'view')) $buttons['view'] = array(
    'url'=>'Yii::app()->createUrl("'.$controller.'/view", array("id"=>$data->id))',
);
if($this->checkAccess($controller, 'update')) $buttons['update'] = array(
    'url'=>'Yii::app()->createUrl("'.$controller.'/update", array("id"=>$data->id))',
);
if($this->checkAccess($controller, 'delete')) $buttons['delete'] = array(
    'url'=>'Yii::app()->createUrl("'.$controller.'/delete", array("id"=>$data->id))',
);

$columns = array(
    array('name' => 'organization_id', 'header' => $this->attributeLabels('organization_id'), 'value' => '$data->organization->value'),
    array('name' => 'value', 'header' => $this->attributeLabels('value')),
    array('name' => 'position', 'header' => $this->attributeLabels('position')),
    array('name' => 'description', 'header' => $this->attributeLabels('description')),
);

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'buttons' => $buttons,
    'buttons_list' => false,
    'columns' => $columns,
));
