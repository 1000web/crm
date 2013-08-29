<?php
/* @var $this OrganizationController */
/* @var $model Organization */
/* @var $dataProvider Deal */

$controller = 'deal';

?>

    <h2>Сделки
        <?php
        if ($this->checkAccess($controller, 'create')) {
            $this->widget('bootstrap.widgets.TbButton', array(
                'url' => array('/' . $controller . '/create', 'oid' => $model->id),
                'label' => 'Добавить сделку',
                'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            ));
        }
        ?>
    </h2>

<?php

$this->addButtons($controller, array('view', 'update', 'delete'));

$template = '';
foreach ($this->buttons as $key => $value) {
    $template .= '{' . $key . '} ';
}
$this->columns = array(
    array('name' => 'value', 'header' => 'Значение/имя'),
    array('name' => 'position', 'header' => 'Должность'),
    array('name' => 'description', 'header' => 'Описание'),
);

if (!empty($template)) array_push($columns,
    array(
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => $template,
        'buttons' => $this->buttons,
        'htmlOptions' => array(
            'style' => 'text-align:center; width: 50px',
        ),
    ));
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => $this->columns,
));