<?php
/* @var $this DealController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

?>
    <div class="row">
        <div class="btn-toolbar span3">
            <?php
            // 'id','value','prior'
            $options = DealSource::model()->getOptions();
            $this->buildFilterButton($options, 'dealsource');
            ?>
        </div>
        <div class="btn-toolbar span3">
            <?php
            // 'id','value','prior'
            $options = DealStage::model()->getOptions();
            $this->buildFilterButton($options, 'dealstage');
            ?>
        </div>
    </div>

<?php
$columns = array(
    array('name' => 'inner_number', 'header' => $this->attributeLabels('inner_number')),
    array('name' => 'external_number', 'header' => $this->attributeLabels('external_number')),
    array('name' => 'open_date', 'header' => $this->attributeLabels('open_date')),
    array('name' => 'organization_id', 'header' => $this->attributeLabels('organization_id'), 'value' => '$data->organization->value'),
    array('name' => 'customer_id', 'header' => $this->attributeLabels('customer_id'), 'value' => '$data->customer->value'),
    array('name' => 'deal_source_id', 'header' => $this->attributeLabels('deal_source_id'), 'value' => '$data->dealSource->value'),
    array('name' => 'deal_stage_id', 'header' => $this->attributeLabels('deal_stage_id'), 'value' => '$data->dealStage->value'),
    array('name' => 'value', 'header' => $this->attributeLabels('value')),
    //array('name' => 'description', 'header' => $this->attributeLabels('description')),
);

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
//    'buttons' => $buttons,
    'columns' => $columns,
));

$this->widget('CLinkPager', array(
    'pages' => $pages,
));