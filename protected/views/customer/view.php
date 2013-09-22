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
        'label' => 'Контакты ('.count($contact->getData()).')',
        'content' => $contact_content,
    );

}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'deal';
$deal_content = '';
if (MyHelper::checkAccess($controller, 'view')) {
    $deal_content .= '<h2>Сделки (заказчик)</h2>';
    $deal_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $deal_zakaz,
    ), true);
    $content[] = array(
        'label' => 'Заказчик ('.count($deal_zakaz->getData()).')',
        'content' => $deal_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'deal';
$deal_content = '';
if (MyHelper::checkAccess($controller, 'view')) {
    $deal_content .= '<h2>Сделки (Грузополучатель)</h2>';
    $deal_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $deal_gruz,
    ), true);
    $content[] = array(
        'label' => 'Грузополучатель ('.count($deal_gruz->getData()).')',
        'content' => $deal_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'deal';
$deal_content = '';
if (MyHelper::checkAccess($controller, 'view')) {
    $deal_content .= '<h2>Сделки (плательщик)</h2>';
    $deal_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $deal_pay,
    ), true);
    $content[] = array(
        'label' => 'Плательщик ('.count($deal_pay->getData()).')',
        'content' => $deal_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'deal';
$deal_content = '';
if (MyHelper::checkAccess($controller, 'view')) {
    $deal_content .= '<h2>Сделки (Конечный потребитель)</h2>';
    $deal_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $deal_end,
    ), true);
    $content[] = array(
        'label' => 'Потребитель ('.count($deal_end->getData()).')',
        'content' => $deal_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'deal';
$deal_content = '';
if (MyHelper::checkAccess($controller, 'view')) {
    $deal_content .= '<h2>Сделки (Поставщик)</h2>';
    $deal_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $deal_post,
    ), true);
    $content[] = array(
        'label' => 'Поставщик ('.count($deal_post->getData()).')',
        'content' => $deal_content,
    );

}
//----------------------------------------------------------------------------------------------------------------------
$this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'tabs',
    'placement' => 'above', // above, below, right, left
    'tabs' => $content,
));