<?php
/* @var $this CustomerController */
/* @var $this->_model Customer */
/* @var $contact CustomerContact */

$this->show_pagesize = false;

$attr = array(
    array('name' => 'organization_id', 'label' => $this->attributeLabels('organization_id'), 'value' => $this->_model->organization->value),
    array('name' => 'position', 'label' => $this->attributeLabels('position')),
    array('name' => 'value', 'label' => $this->attributeLabels('value')),
    array('name' => 'description', 'label' => $this->attributeLabels('description')),
);

if (MyHelper::checkAccess($this->id, 'log')) $attr = CMap::mergeArray(
    $this->created_updated($this->_model),
    $attr
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $this->_model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));

$controller = 'customercontact';
if (MyHelper::checkAccess($controller, 'view')) {
    echo '<h2>Контакты Клиента ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'cid' => $model->id),
            'label' => 'Добавить контакт',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ));
    }
    echo '</h2>';
    echo $this->renderPartial('../'.$controller.'/index', array(
        'dataProvider' => $contact,
    ));
}

$controller = 'deal';
if (MyHelper::checkAccess($controller, 'view')) {
    echo '<h2>Сделки ';
    if (MyHelper::checkAccess($controller, 'create')) {
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


