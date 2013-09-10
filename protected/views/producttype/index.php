<?php
/* @var $this ProductTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addButtons('producttype', array('view', 'update', 'delete', 'log'));

$this->addColumns($this->getColumns('producttype_columns',ProductType::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
