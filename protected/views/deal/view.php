<?php
/* @var $this DealController */
/* @var $this ->_model Deal */
/* @var $payment Payment */
/* @var $total_paid float */
/* @var $awaiting float */

$this->show_pagesize = false;

$this->renderPartial('../detail_view');

$controller = 'payment';
if (MyHelper::checkAccess($controller, 'view')) {
    echo '<h2>Платежи по договору ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'did' => $this->_model->id),
            'label' => 'Добавить платеж',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ));
    }
    echo '</h2>';

    if ($total_paid > 0) {
        echo '<h4 class="text-success">';
        if ($this->_model->amount == $total_paid) echo 'Оплачено полностью ';
        else echo 'Всего оплачено ';
        echo MyHelper::number_format($total_paid).' рублей.</h4>';
    }
    if ($awaiting > 0) echo '<h4 class="text-info">Ожидаются платежи на сумму ' . MyHelper::number_format($awaiting) . ' рублей.</h4>';

    $summa = $total_paid + $awaiting;
    if ($this->_model->amount > $summa) {
        echo '<h4 class="text-warning">Нужно доплатить: ' . MyHelper::number_format($this->_model->amount - $summa) . ' рублей.</h4>';
    }
    if ($this->_model->amount < $summa) {
        echo '<h4 class="text-error">Переплата: ' . MyHelper::number_format($summa - $this->_model->amount) . ' рублей.</h4>';
    }

    echo $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $payment,
    ));
}


