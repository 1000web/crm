<?php
/* @var $this DealController */
/* @var $this ->_model Deal */
/* @var $payment Payment */

$this->show_pagesize = false;

echo $this->renderPartial('../detail_view');


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
    echo $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $payment,
        //'dataProvider' => $this->_model->contacts,
    ));
}


