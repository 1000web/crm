<?php
/* @var $this OrganizationController */
/* @var $this->_model Organization */
/* @var $contact OrganizationContact */
/* @var $customer Customer */
/* @var $deal Deal */
/* @var $account Account */

$this->addAttributes(array('organization_type_id','organization_group_id','organization_region_id'));

echo $this->renderPartial('../detail_view', array(
    'data' => $this->_model,
));

$controller = 'organizationcontact';
if (MyHelper::checkAccess($controller, 'view')) {
    echo '<h2>Контакты ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'oid' => $this->_model->id),
            'label' => 'Добавить контакт',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ));
    }
    echo '</h2>';
    echo $this->renderPartial('../'.$controller.'/index', array(
        'dataProvider' => $contact,
    ));
}
$controller = 'account';
if (MyHelper::checkAccess($controller, 'view')) {
    echo '<h2>Счета ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'oid' => $this->_model->id),
            'label' => 'Добавить счет',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ));
    }
    echo '</h2>';
    echo $this->renderPartial('../'.$controller.'/index', array(
        'dataProvider' => $account,
    ));
}
$controller = 'customer';
if (MyHelper::checkAccess($controller, 'view')) {
    echo '<h2>Клиенты  ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'oid' => $this->_model->id),
            'label' => 'Добавить клиента',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ));
    }
    echo '</h2>';
    echo $this->renderPartial('../'.$controller.'/index', array(
        'dataProvider' => $customer,
        //'dataProvider' => $this->_model->customers,
    ));
}
$controller = 'deal';
if (MyHelper::checkAccess($controller, 'view')) {
    echo '<h2>Сделки ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'oid' => $this->_model->id),
            'label' => 'Добавить сделку',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ));
    }
    echo '</h2>';
    echo $this->renderPartial('../'.$controller.'/index', array(
        'dataProvider' => $deal,
    ));
}
