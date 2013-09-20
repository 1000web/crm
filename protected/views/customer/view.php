<?php
/* @var $this CustomerController */
/* @var $this ->_model Customer */
/* @var $contact CustomerContact */

$this->show_pagesize = false;

$content = array();


$content[] = array(
    'label' => 'Подробно',
    'content' => $this->renderPartial('../detail_view', NULL, TRUE),
    'active' => true,
);
//----------------------------------------------------------------------------------------------------------------------
$controller = 'customercontact';
$contact_content = '';
if (MyHelper::checkAccess($controller, 'view')) {
    /**/
    $contact_content .= '<h2>Контакты Клиента ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $contact_content .= $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'cid' => $this->_model->id),
            'label' => 'Добавить контакт',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ), true);
    }/**/
    $contact_content .= '</h2>';
    $contact_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $contact,
        //'dataProvider' => $this->_model->contacts,
    ), true);
    $content[] = array(
        'label' => 'Контакты',
        'content' => $contact_content,
    );

}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'deal';
$deal_content = '';
if (MyHelper::checkAccess($controller, 'view')) {
    /**/
    $deal_content .= '<h2>Сделки ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $deal_content .= $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'cid' => $this->_model->id, 'oid' => $this->_model->organization_id),
            'label' => 'Добавить сделку',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ), true);
    }
    $deal_content .= '</h2>';/**/
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