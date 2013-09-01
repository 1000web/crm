<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('_filter_buttons');

$this->buttons = $this->columns = array();
$this->addButtons('product', array('view', 'update', 'delete', 'log'));
$this->addColumns(array('product_type_id', 'value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
