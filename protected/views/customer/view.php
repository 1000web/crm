<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $contact CustomerContact */

$this->show_pagesize = false;

$attr = array(
    array('name' => 'organization_id', 'label' => $this->attributeLabels('organization_id'), 'value' => $model->organization->value),
    array('name' => 'position', 'label' => $this->attributeLabels('position')),
    array('name' => 'value', 'label' => $this->attributeLabels('value')),
    array('name' => 'description', 'label' => $this->attributeLabels('description')),
);

if ($this->checkAccess($this->id, 'log')) $attr = CMap::mergeArray(
    $this->created_updated($model),
    $attr
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));
/*
if($this->checkAccess('customercontact', 'view'))
    echo $this->renderPartial('_contact', array(
    'dataProvider' => $contact,
    'model' => $model,
));/**/
$controller = 'customercontact';
if ($this->checkAccess($controller, 'view')) {
    echo '<h2>Контакты Клиента ';
    if ($this->checkAccess($controller, 'create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'cid' => $model->id),
            'label' => 'Добавить контакт',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ));
    }
    echo '</h2>';
    echo $this->renderPartial('../customercontact/index', array(
        'dataProvider' => $contact,
    ));
}

$controller = 'deal';
if ($this->checkAccess($controller, 'view')) {
    echo '<h2>Сделки ';
    if ($this->checkAccess($controller, 'create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'cid' => $model->id, 'oid' => $model->organization_id),
            'label' => 'Добавить сделку',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ));
    }
    echo '</h2>';
    echo $this->renderPartial('../deal/index', array(
        'dataProvider' => $deal,
        //'model' => $model,
    ));
}


