<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('_filter_buttons');

$this->buttons = $this->columns = array();
$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns(array('product_type_id', 'value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
