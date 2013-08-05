<?php
/* @var $this OrganizationContactController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Контакты Организаций',
);

$this->menu = $this->menuOperations('index');

?>

<h1>Контакты Организаций</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'id', 'header' => $this->attributeLabels('id')),
        array('name' => 'organization_id', 'header' => $this->attributeLabels('organization_id'), 'value' => '$data->organization->value'),
        array('name' => 'contact_type_id', 'header' => $this->attributeLabels('contact_type_id'), 'value' => '$data->contactType->value'),
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
