<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('../product/_filter_buttons');

$this->buttons = $this->columns = array();

$this->addButtons('product', array('view', 'update', 'delete', 'log'));

$this->addColumns($this->getColumns('product_columns',Product::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
