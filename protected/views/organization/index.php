<?php
/* @var $this OrganizationController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

?>

<div class="row">
<div class="btn-toolbar span2">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'Тип организации', 'url'=>'#'),
            array('items'=>array(
                array('label'=>'Партнер', 'url'=>'#'),
                array('label'=>'Заказчик', 'url'=>'#'),
                array('label'=>'Поставщик', 'url'=>'#'),
                //'---',
                //array('label'=>'АтомСпецСервис', 'url'=>'#'),
            )),
        ),
    )); ?>
</div>

<div class="btn-toolbar span2">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'Регион', 'url'=>'#'),
            array('items'=>array(
                array('label'=>'Россия', 'url'=>'#'),
                array('label'=>'Украина', 'url'=>'#'),
                array('label'=>'Зарубежье', 'url'=>'#'),
            )),
        ),
    )); ?>
</div>

<div class="btn-toolbar span2">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'Группа контрагентов', 'url'=>'#'),
            array('items'=>array(
                array('label'=>'1', 'url'=>'#'),
                array('label'=>'2', 'url'=>'#'),
                array('label'=>'3', 'url'=>'#'),
            )),
        ),
    )); ?>
</div>
</div>

<?php

$columns = array(
        array('name' => 'id', 'header' => $this->attributeLabels('id')),
        array('name' => 'value', 'header' => $this->attributeLabels('value')),
        array('name' => 'organization_type_id', 'header' => $this->attributeLabels('type'), 'value' => '$data->organizationType->value'),
        array('name' => 'organization_group_id', 'header' =>$this->attributeLabels('group'), 'value' => '$data->organizationGroup->value'),
        array('name' => 'organization_region_id', 'header' => $this->attributeLabels('region'), 'value' => '$data->organizationRegion->value'),
        array('name' => 'description', 'header' => $this->attributeLabels('description'))
);

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'columns' => $columns,
));
