<?php
/* @var $this SpecificationController */
/* @var $this ->_model Specification */
/* @var $product Product */

$this->show_pagesize = false;

$content = array();

$content[] = array(
    'label' => 'Подробно',
    'content' => $this->renderPartial('../detail_view', NULL, TRUE),
    'active' => true,
);
//----------------------------------------------------------------------------------------------------------------------
$controller = 'product';
$this->columnLabels($controller);
$product_content = '';
if (MyHelper::checkAccess($controller, 'view')) {
    /**/
    $product_content .= '<h2>Продукция ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $product_content .= $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'sid' => $this->_model->id),
            'label' => 'Добавить',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ), true);
    }/**/
    $product_content .= '</h2>';
    $product_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $product,
        //'dataProvider' => $this->_model->contacts,
    ), true);
    $content[] = array(
        'label' => 'Продукция ('.count($product->getData()).')',
        'content' => $product_content,
    );
}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'daval';
$this->columnLabels($controller);
$daval_content = '';
if (MyHelper::checkAccess($controller, 'view')) {
    /**/
    $daval_content .= '<h2>Давальческие ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $daval_content .= $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'sid' => $this->_model->id),
            'label' => 'Добавить',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ), true);
    }/**/
    $daval_content .= '</h2>';
    $daval_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $daval,
        //'dataProvider' => $this->_model->contacts,
    ), true);
    $content[] = array(
        'label' => 'Давальческие ('.count($daval->getData()).')',
        'content' => $daval_content,
    );

}
//----------------------------------------------------------------------------------------------------------------------
$controller = 'shipping';
$this->columnLabels($controller);
$shipping_content = '';
if (MyHelper::checkAccess($controller, 'view')) {
    /**/
    $shipping_content .= '<h2>Отгрузки ';
    if (MyHelper::checkAccess($controller, 'create')) {
        $shipping_content .= $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('/' . $controller . '/create', 'sid' => $this->_model->id),
            'label' => 'Добавить',
            'type' => '', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        ), true);
    }/**/
    $shipping_content .= '</h2>';
    $shipping_content .= $this->renderPartial('../' . $controller . '/index', array(
        'dataProvider' => $shipping,
        //'dataProvider' => $this->_model->contacts,
    ), true);
    $content[] = array(
        'label' => 'Отгрузки ('.count($shipping->getData()).')',
        'content' => $shipping_content,
    );

}
//----------------------------------------------------------------------------------------------------------------------
$this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'tabs',
    'placement' => 'above', // above, below, right, left
    'tabs' => $content,
));