<?php
/* @var $this TaskTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Типы задач',
);

$this->menu = $this->menuOperations('index');

?>

<h1>Типы задач</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'id', 'header' => $this->attributeLabels('id')),
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
