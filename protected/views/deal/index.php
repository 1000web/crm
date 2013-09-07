<?php
/* @var $this DealController */
/* @var $dataProvider CActiveDataProvider */

echo $this->renderPartial('../deal/_filter_buttons');

$this->buttons = $this->columns = array();

/*
if(MyHelper::checkAccess($controller, 'favorite')) {
    $this->buttons['favorite'] = array(
        'icon' => 'icon-star',
        'url'=>'Yii::app()->createUrl("'.$controller.'/favorite", array("del"=>$data->id))',
        'label' => $this->attributeLabels('favdel'),
    );
}/**/

$this->addButtons('deal', array('view', 'update', 'delete', 'log'));
$this->addColumns(array('inner_number', 'external_number', 'open_date', 'close_date'));
if($this->id != 'organization') $this->addColumn('organization_id');
if($this->id != 'customer') $this->addColumn('customer_id');
$this->addColumns(array('deal_source_id', 'deal_stage_id', 'value'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
