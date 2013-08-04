<?php
/* @var $this OrganizationContactController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Контакты Организаций',
);

$this->menu = $this->menuOperations('index');

?>

<h1>Контакты Организаций</h1>

<?php
/*
    <b><?php echo CHtml::encode($data->getAttributeLabel('organization_id')); ?>:</b>
    <?php echo CHtml::encode($data->organization->value); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('contact_type_id')); ?>:</b>
    <?php echo CHtml::encode($data->contactType->value); ?>
    <br/>
/**/
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'id', 'header' => '#'),
        array('name' => 'organization_id', 'header' => 'Организация', 'value' => '$data->organization->value'),
        array('name' => 'contact_type_id', 'header' => 'Тип контакта', 'value' => '$data->contactType->value'),
        array('name' => 'value', 'header' => 'Значение'),
        array('name' => 'description', 'header' => 'Описание'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array(
                'style'=>'width: 50px',
            ),
        )
    ),
)); ?>
