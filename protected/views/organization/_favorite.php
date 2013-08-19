<?php
/* @var $this OrganizationController */
/* @var $dataProvider CActiveDataProvider */
?>
    <div class="row">
        <div class="btn-toolbar span3">
            <?php
            $this->buildFilterButton(OrganizationType::model()->getOptions(), 'organizationtype');
            ?>
        </div>
        <div class="btn-toolbar span3">
            <?php
            $this->buildFilterButton(OrganizationRegion::model()->getOptions(), 'organizationregion');
            ?>
        </div>
        <div class="btn-toolbar span3">
            <?php
            $this->buildFilterButton(OrganizationGroup::model()->getOptions(), 'organizationgroup');
            ?>
        </div>
    </div>

<?php
$controller = 'organization';
$buttons = array();
if($this->checkAccess($controller, 'favorite')) $buttons['favorite'] = array(
    'icon' => 'icon-star',
    'url'=>'Yii::app()->createUrl("'.$controller.'/favorite", array("del"=>$data->id))',
    'label' => $this->attributeLabels('favdel'),
);
foreach(array('view','update','delete') as $action){
    $this->addButtonTo($buttons, $controller, $action);
}

$columns = array(
    array('name' => 'id', 'header' => $this->attributeLabels('id')),
    array('name' => 'value', 'header' => $this->attributeLabels('value')),
    array('name' => 'organization_type_id', 'header' => $this->attributeLabels('type'), 'value' => '$data->organizationType->value'),
    array('name' => 'organization_region_id', 'header' => $this->attributeLabels('region'), 'value' => '$data->organizationRegion->value'),
    array('name' => 'organization_group_id', 'header' => $this->attributeLabels('group'), 'value' => '$data->organizationGroup->value'),
    array('name' => 'description', 'header' => $this->attributeLabels('description'))
);
echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'buttons' => $buttons,
    'buttons_list' => false,
    'columns' => $columns,
));
