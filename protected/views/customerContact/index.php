<?php
/* @var $this CustomerContactController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'customer_id', 'header' => $this->attributeLabels('id')),
        array('name' => 'customer_lastname', 'header' => $this->attributeLabels('lastname'), 'value' => '$data->customer->lastname'),
        array('name' => 'customer_firstname', 'header' => $this->attributeLabels('firstname'), 'value' => '$data->customer->firstname'),
        //array('name' => 'customer_id', 'header' => 'Клиент', 'value' => '$data->customer->lastname' . ' ' . '$data->customer->firstname'),
        array('name' => 'contact_type_id', 'header' => $this->attributeLabels('contact_type'), 'value' => '$data->contactType->value'),
        array('name' => 'value', 'header' => $this->attributeLabels('value')),
        array('name' => 'description', 'header' => $this->attributeLabels('description')),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array(
                'style'=>'width: 50px',
            ),
            //'template'=>'{view} {update} {delete}',
        )
    ),
));
