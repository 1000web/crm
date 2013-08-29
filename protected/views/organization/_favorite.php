<?php
/* @var $this OrganizationController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('_filter_buttons');

$controller = 'organization';

if($this->checkAccess($controller, 'favorite')) $buttons['favorite'] = array(
    'icon' => 'icon-star',
    'url'=>'Yii::app()->createUrl("'.$controller.'/favorite", array("del"=>$data->id))',
    'label' => $this->attributeLabels('favdel'),
);
$this->addButtons($controller, array('view','update','delete'));

$this->addColumns(array(/*'id', */'value', /*'organization_type_id', 'organization_region_id', 'organization_group_id', */'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
