<?php
/* @var $this CustomerController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

/*
?>
    <div class="row">
        <div class="btn-toolbar span2">
            <?php
            $options = Organization::model()->getOptions();
            $this->buildFilterButton($options, 'organization');
            ?>
        </div>
    </div>
<?php
*/
if($this->checkAccess('organization', 'view')) {
    $buttons['list'] = array(
        'icon' => 'icon-list',
        'url'=>'Yii::app()->createUrl("organization/view", array("id"=>$data->organization_id))',
        'label' => $this->attributeLabels('organization'),
    );
}
$columns = array(
    array('name' => 'organization_id', 'header' => $this->attributeLabels('organization_id'), 'value' => '$data->organization->value'),
    array('name' => 'value', 'header' => $this->attributeLabels('value')),
    array('name' => 'position', 'header' => $this->attributeLabels('position')),
    array('name' => 'description', 'header' => $this->attributeLabels('description')),
);

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'buttons' => $buttons,
    'columns' => $columns,
));
