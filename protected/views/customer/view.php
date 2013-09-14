<?php
/* @var $this CustomerController */
/* @var $this ->_model Customer */
/* @var $contact CustomerContact */

$this->show_pagesize = false;

echo $this->renderPartial('../detail_view');


$controller = 'customercontact';
if (MyHelper::checkAccess($controller, 'view')) {
    echo '<h2>Контакты Клиента ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'cid' => $this->_model->id),
            'label' => 'Добавить контакт',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ));
    }
    echo '</h2>';
    echo $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $contact,
        //'dataProvider' => $this->_model->contacts,
    ));
}

$controller = 'deal';
if (MyHelper::checkAccess($controller, 'view')) {
    echo '<h2>Сделки ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'cid' => $this->_model->id, 'oid' => $this->_model->organization_id),
            'label' => 'Добавить сделку',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ));
    }
    echo '</h2>';
    echo $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $deal,
    ));
}


