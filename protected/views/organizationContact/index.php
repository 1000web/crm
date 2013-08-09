<?php
/* @var $this OrganizationContactController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

?>
    <div class="row">
        <div class="btn-toolbar span2">
            <?php
            $options = ContactType::model()->getOptions();
            $this->buildFilterButton($options, 'contacttype');
            ?>
        </div>
    </div>
<?php
if($this->checkAccess('organization', 'view')) {
    $buttons['list'] = array(
        'icon' => 'icon-list',
        'url'=>'Yii::app()->createUrl("organization/view", array("id"=>$data->organization_id))',
        'label' => $this->attributeLabels('organization'),
    );
}
$columns = array(
        array('name' => 'id', 'header' => $this->attributeLabels('id')),
        array('name' => 'organization_id', 'header' => $this->attributeLabels('organization_id'), 'value' => '$data->organization->value'),
        array('name' => 'contact_type_id', 'header' => $this->attributeLabels('contact_type_id'), 'value' => '$data->contactType->value'),
        array('name' => 'value', 'header' => 'Значение'),
        array('name' => 'description', 'header' => 'Описание'),
    );

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'buttons' => $buttons,
    'columns' => $columns,
));
