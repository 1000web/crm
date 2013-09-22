<?php
/* @var $this OrganizationController */
/* @var $this ->_model Organization */
/* @var $contact OrganizationContact */
/* @var $account Account */
/* @var $customer Customer */
/* @var $deal_zakaz Deal */
/* @var $deal_gruz Deal */
/* @var $deal_pay Deal */
/* @var $deal_end Deal */
/* @var $deal_post Deal */

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
        ), true);
    }
    $customer_content .= '</h2>';
    $customer_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $customer,
    ), true);
    $content[] = array(
        'label' => 'Сотрудники',
        'content' => $customer_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$this->description =
    $this->widget('bootstrap.widgets.TbButton', array(
        'url' => array('/deal/create', 'zakaz_oid' => 1, 'post_oid' => $this->_model->id),
        'label' => 'Купить у них',
        'type' => 'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    ), true)
    . ' ' .
    $this->widget('bootstrap.widgets.TbButton', array(
        'url' => array('/deal/create', 'zakaz_oid' => $this->_model->id, 'post_oid' => 1),
        'label' => 'Продать им',
        'type' => 'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    ), true);

$controller = 'deal';
$this->columnLabels($controller);
if (MyHelper::checkAccess($controller, 'view')) {
    $deal_content = '<h2>Сделки (заказчик)</h2>';
    $deal_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $deal_zakaz,
    ), true);
    $content[] = array(
        'label' => 'Заказчик',
        'content' => $deal_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'deal';
$this->columnLabels($controller);
if (MyHelper::checkAccess($controller, 'view')) {
    $deal_content = '<h2>Сделки (грузополучатель)</h2>';
    $deal_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $deal_gruz,
    ), true);
    $content[] = array(
        'label' => 'Грузополучатель',
        'content' => $deal_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'deal';
$this->columnLabels($controller);
if (MyHelper::checkAccess($controller, 'view')) {
    $deal_content = '<h2>Сделки (плательщик)</h2>';
    $deal_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $deal_pay,
    ), true);
    $content[] = array(
        'label' => 'Плательщик',
        'content' => $deal_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'deal';
$this->columnLabels($controller);
if (MyHelper::checkAccess($controller, 'view')) {
    $deal_content = '<h2>Сделки (Конечный потребитель)</h2>';
    $deal_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $deal_end,
    ), true);
    $content[] = array(
        'label' => 'Потребитель',
        'content' => $deal_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'deal';
$this->columnLabels($controller);
if (MyHelper::checkAccess($controller, 'view')) {
    $deal_content = '<h2>Сделки (поставщик) ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $deal_content .= $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'oid' => $this->_model->id),
            'label' => 'Добавить',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ), true);
    }
    $deal_content .= '</h2>';
    $deal_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $deal_post,
    ), true);
    $content[] = array(
        'label' => 'Поставщик',
        'content' => $deal_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'tabs',
    'placement' => 'above', // above, below, right, left
    'tabs' => $content,
));
