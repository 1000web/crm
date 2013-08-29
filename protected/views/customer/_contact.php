<?php
/* @var $this OrganizationController */
/* @var $model Customer */
/* @var $dataProvider CustomerContact */

$controller = 'customercontact';

?>

    <h2>Контакты Клиента
        <?php
        if ($this->checkAccess($controller, 'create')) {
            $this->widget('bootstrap.widgets.TbButton', array(
                'url' => array('/' . $controller . '/create', 'cid' => $model->id),
                'label' => 'Добавить контакт',
                'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            ));
        }
        ?>
    </h2>

<?php

$this->addButtons($controller, array('view', 'update', 'log', 'delete'));

$template = '';
foreach ($this->buttons as $key => $value) {
    $template .= '{' . $key . '} ';
}
$this->addColumns(array('contact_type_id', 'value', 'description'));

if (!empty($template)) array_push($this->columns,
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
