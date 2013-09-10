<?php
/* @var $this OrganizationController */
/* @var $this->_model Organization */
/* @var $contact OrganizationContact */
/* @var $customer Customer */
/* @var $deal Deal */

$this->addAttribute('organization_type_id',$this->_model->organization_type->value);
$this->addAttribute('organization_group_id',$this->_model->organization_group->value);
$this->addAttribute('organization_region_id',$this->_model->organization_region->value);
$this->addAttribute('description');


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
