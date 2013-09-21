<?php
/* @var $this DealController */
/* @var $this ->_model Deal */
/* @var $payment Payment */
/* @var $total_paid float */
/* @var $awaiting float */

$this->show_pagesize = false;

$content = array();
$detail_content = $this->renderPartial('../detail_view', NULL, true);
$content[] = array(
    'label' => 'Подробно',
    'content' => $detail_content,
    'active' => true,
);
//----------------------------------------------------------------------------------------------------------------------
$controller = 'payment';
$this->columnLabels($controller);
if (MyHelper::checkAccess($controller, 'view')) {
    $payment_content = '';
    $payment_content .= '<h2>Платежи по договору ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $payment_content .= $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'did' => $this->_model->id),
            'label' => 'Добавить платеж',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ), true);
    }
    $payment_content .= '</h2>';

    if ($total_paid > 0) {
        $payment_content .= '<h4 class="text-success">';
        if ($this->_model->amount == $total_paid) $payment_content .= 'Оплачено полностью ';
        else $payment_content .= 'Всего оплачено ';
        $payment_content .= MyHelper::number_format($total_paid).' рублей.</h4>';
    }
    if ($awaiting > 0) $payment_content .= '<h4 class="text-info">Ожидаются платежи на сумму ' . MyHelper::number_format($awaiting) . ' рублей.</h4>';
    $summa = $total_paid + $awaiting;
    if ($this->_model->amount > $summa) $payment_content .= '<h4 class="text-warning">Нужно доплатить ' . MyHelper::number_format($this->_model->amount - $summa) . ' рублей.</h4>';
    if ($this->_model->amount < $summa) $payment_content .= '<h4 class="text-error">Переплата ' . MyHelper::number_format($summa - $this->_model->amount) . ' рублей.</h4>';

    $payment_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $payment,
    ), true);
    $content[] = array(
        'label' => 'Платежи',
        'content' => $payment_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'specification';
$this->columnLabels($controller);
if (MyHelper::checkAccess($controller, 'view')) {
    $specification_content = '';
    $specification_content .= '<h2>Спецификации ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $specification_content .= $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'did' => $this->_model->id),
            'label' => 'Добавить спецификацию',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ), true);
    }
    $specification_content .= '</h2>';

    $specification_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $specification,
    ), true);
    $content[] = array(
        'label' => 'Спецификации',
        'content' => $specification_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'tabs',
    'placement' => 'above', // above, below, right, left
    'tabs' => $content,
));



