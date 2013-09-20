<?php
/* @var $this OrganizationController */
/* @var $this ->_model Organization */
/* @var $contact OrganizationContact */
/* @var $customer Customer */
/* @var $deal Deal */
/* @var $account Account */

$content = array();
$detail_content = $this->renderPartial('../detail_view', NULL, true);
$content[] = array(
    'label' => 'Подробно',
    'content' => $detail_content,
    'active' => true,
);
//----------------------------------------------------------------------------------------------------------------------
$controller = 'organizationcontact';
$this->columnLabels($controller);
if (MyHelper::checkAccess($controller, 'view')) {
    $contact_content = '<h2>Контакты ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $contact_content .= $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'oid' => $this->_model->id),
            'label' => 'Добавить контакт',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ), true);
    }
    $contact_content .= '</h2>';
    $contact_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $contact,
    ), true);
    $content[] = array(
        'label' => 'Контакты',
        'content' => $contact_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'account';
$this->columnLabels($controller);
if (MyHelper::checkAccess($controller, 'view')) {
    $account_content =  '<h2>Счета ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $account_content .= $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'oid' => $this->_model->id),
            'label' => 'Добавить счет',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ), true);
    }
    $account_content .=  '</h2>';
    $account_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $account,
    ), true);
    $content[] = array(
        'label' => 'Счета',
        'content' => $account_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'customer';
$this->columnLabels($controller);
if (MyHelper::checkAccess($controller, 'view')) {
    $customer_content = '<h2>Клиенты  ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $customer_content .= $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'oid' => $this->_model->id),
            'label' => 'Добавить клиента',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ), true);
    }
    $customer_content .= '</h2>';
    $customer_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $customer,
        //'dataProvider' => $this->_model->customers,
    ), true);
    $content[] = array(
        'label' => 'Сотрудники',
        'content' => $customer_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'deal';
$this->columnLabels($controller);
if (MyHelper::checkAccess($controller, 'view')) {
    $deal_content = '<h2>Сделки ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $deal_content .= $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'oid' => $this->_model->id),
            'label' => 'Добавить сделку',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ), true);
    }
    $deal_content .= '</h2>';
    $deal_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $deal,
    ), true);
    $content[] = array(
        'label' => 'Сделки',
        'content' => $deal_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'tabs',
    'placement' => 'above', // above, below, right, left
    'tabs' => $content,
));
