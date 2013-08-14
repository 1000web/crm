<?php
/* @var $this OrganizationController */
/* @var $model Organization */
/* @var $dataProvider OrganizationContact */

$controller = 'organizationcontact';

?>

    <h2>Контакты Организации
        <?php
        if (true) {
            $this->widget('bootstrap.widgets.TbButton', array(
                'url' => array('/' . $controller . '/create', 'oid' => $model->id),
                'label' => 'Добавить контакт',
                'type' => 'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            ));
        }
        ?>
    </h2>

<?php

$buttons = array();
$this->addButtonTo($buttons, $controller, 'view');
$this->addButtonTo($buttons, $controller, 'update');
$this->addButtonTo($buttons, $controller, 'delete');

$template = '';
foreach ($buttons as $key => $value) {
    $template .= '{' . $key . '} ';
}
$columns = array(
    array('name' => 'contact_type_id', 'header' => 'Тип контакта', 'value' => '$data->contactType->value'),
    array('name' => 'value', 'header' => 'Наименование'),
    array('name' => 'description', 'header' => 'Описание'),
);

if (!empty($template)) array_push($columns,
    array(
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => $template,
        'buttons' => $buttons,
        'htmlOptions' => array(
            'style' => 'text-align:center; width: 50px',
        ),
    ));
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => $columns,
));
