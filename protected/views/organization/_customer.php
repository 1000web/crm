<?php
/* @var $this OrganizationController */
/* @var $dataProvider Customer */
?>

    <h2>Контактные лица</h2>

<?php

$buttons = array();

$controller = 'customer';
$this->addButtonTo($buttons, $controller, 'view');
$this->addButtonTo($buttons, $controller, 'update');
$this->addButtonTo($buttons, $controller, 'delete');

$template = '';
foreach ($buttons as $key => $value) {
    $template .= '{' . $key . '} ';
}
$columns = array(
    array('name' => 'value', 'header' => 'Значение/имя'),
    array('name' => 'position', 'header' => 'Должность'),
    array('name' => 'description', 'header' => 'Описание'),
);

if (!empty($template)) array_push($columns,
    array(
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => $template,
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