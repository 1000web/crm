<?php
/* @var $this ItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Пункты меню',
);

$this->menu = $this->menuOperations('index');

?>

<h1>Пункты меню</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'id', 'header' => $this->attributeLabels('id')),
        array('name' => 'parent_id', 'header' => $this->attributeLabels('parent_id')),
        array('name' => 'module', 'header' => $this->attributeLabels('module')),
        array('name' => 'controller', 'header' => $this->attributeLabels('controller')),
        array('name' => 'action', 'header' => $this->attributeLabels('action')),
        array('name' => 'value', 'header' => $this->attributeLabels('value')),
        array('name' => 'description', 'header' => $this->attributeLabels('description')),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array(
                'style'=>'width: 50px',
            ),
        )
    ),
)); ?>