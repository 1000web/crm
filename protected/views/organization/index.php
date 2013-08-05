<?php
/* @var $this OrganizationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs  = $this->make_breadcrumbs('index');;
$this->menu         = $this->menuOperations('index');

?>

<table class="span-20">
    <tr>
        <td class="span-4">
            <img src="/images/organization-150x150.jpg" />
        </td>
        <td class="span-16">
            <h1>Организации</h1>
            <h2>Заключайте сделки с Организациями</h2>
            Организации - это компании или корпоративные отделы, с которыми вы имеете деловые отношения.
        </td>
    </tr>
</table>

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

<?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('organization_type_id')); ?>:</b>
<?php echo CHtml::encode($data->organizationType->value); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('organization_group_id')); ?>:</b>
<?php echo CHtml::encode($data->organizationGroup->value); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('organization_region_id')); ?>:</b>
<?php echo CHtml::encode($data->organizationRegion->value); ?>
    <br/>
/**/?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'id', 'header' => $this->attributeLabels('id')),
        array('name' => 'value', 'header' => $this->attributeLabels('value')),
        array('name' => 'organization_type_id', 'header' => $this->attributeLabels('type'), 'value' => '$data->organizationType->value'),
        array('name' => 'organization_group_id', 'header' =>$this->attributeLabels('group'), 'value' => '$data->organizationGroup->value'),
        array('name' => 'organization_region_id', 'header' => $this->attributeLabels('region'), 'value' => '$data->organizationRegion->value'),
        array('name' => 'description', 'header' => $this->attributeLabels('description')),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array(
                'style'=>'width: 50px',
            ),
        )
    ),
)); ?>