<?php
/* @var $this OrganizationController */
/* @var $dataProvider customer */
?>

    <h2>Контактные лица</h2>

<?php

$buttons = array();

$controller = 'customer';
$this->addButtonTo($buttons, $controller, 'view');
$this->addButtonTo($buttons, $controller, 'update');
$this->addButtonTo($buttons, $controller, 'delete');

$t = '';
foreach ($buttons as $key => $value) {
    $t .= '{' . $key . '} ';
}
$columns = array(
    //array('name' => 'id', 'header' => '#'),
    array('name' => 'value', 'header' => 'Значение/имя'),
    array('name' => 'position', 'header' => 'Должность'),
    array('name' => 'description', 'header' => 'Описание'),
);

if (!empty($t)) array_push($columns,
    array(
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => $t,
        'buttons' => $buttons,
        'htmlOptions' => array(
            'style' => 'width: 50px',
        ),
    ));
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => $columns,
));