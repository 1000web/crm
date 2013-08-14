<?php
/* @var $this OrganizationController */
/* @var $dataProvider CActiveDataProvider */

if (!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

?>
    <div class="row">
        <div class="btn-toolbar span3">
            <?php
            $options = OrganizationType::model()->getOptions();
            $this->buildFilterButton($options, 'organizationtype');
            ?>
        </div>
        <div class="btn-toolbar span3">
            <?php
            $options = OrganizationRegion::model()->getOptions();
            $this->buildFilterButton($options, 'organizationregion');
            ?>
        </div>
        <div class="btn-toolbar span3">
            <?php
            $options = OrganizationGroup::model()->getOptions();
            $this->buildFilterButton($options, 'organizationgroup');
            ?>
        </div>
    </div>

<?php
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
    'columns' => $columns,
));
