<?php
/* @var $this MenuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Меню',
);

$this->menu = $this->menuOperations('index');

?>

<h1>Меню</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'id', 'header' => '#'),
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