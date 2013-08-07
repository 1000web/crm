<?php
/* @var $this CustomerController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        /*
        array(
            'name' => 'organization_id',
            'header' => $this->attributeLabels('id'),
            //'encodeLabel' => false,
            'value' => 'Yii::app()->createUrl("organization/view", array("id"=>$data->organization_id))'
        ),/**/
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
            'buttons'=>array
            (
                'view' => array
                (
                    'icon' => 'icon-list',
                    'url'=>'Yii::app()->createUrl("organization/view", array("id"=>$data->organization_id))',
                    'label' => $this->attributeLabels('organization'),
                ),
            ),
            'htmlOptions'=>array(
                'style'=>'width: 5px; text-align:center;',
            ),
        ),/**/
        array('name' => 'organization', 'header' => $this->attributeLabels('organization'), 'value' => '$data->organization->value'),
        array('name' => 'value', 'header' => $this->attributeLabels('value')),
        array('name' => 'position', 'header' => $this->attributeLabels('position')),
        array('name' => 'description', 'header' => $this->attributeLabels('description')),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array(
                'style'=>'width: 50px',
            ),
            //'template'=>'{view} {update} {delete}',
            /*
            'buttons'=>array
            (
                'view' => array
                (
                    'url'=>'Yii::app()->createUrl("customer/view", array("id"=>$data->id))',
                ),
                'update' => array
                (
                    'url'=>'Yii::app()->createUrl("customer/update", array("id"=>$data->id))',
                ),
                'delete' => array
                (
                    'url'=>'Yii::app()->createUrl("customer/delete", array("id"=>$data->id))',
                ),
            ),/**/
        )
    ),
));