<?php
/* @var $this OrganizationController */
/* @var $dataProvider contact */
?>

    <h2>Контакты Клиента</h2>

<?php

$buttons = array();

$controller = 'customerContact';
$this->addButtonTo($buttons, $controller, 'view');
$this->addButtonTo($buttons, $controller, 'update');
$this->addButtonTo($buttons, $controller, 'delete');

$t = '';
foreach ($buttons as $key => $value) {
    $t .= '{' . $key . '} ';
}
$columns = array(
    array('name' => 'contact_type_id', 'header' => 'Тип контакта', 'value' => '$data->contactType->value'),
    array('name' => 'value', 'header' => 'Наименование'),
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
