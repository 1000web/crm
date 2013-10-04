<?php
/* @var $this PaymentTypeController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'paymenttype';
$this->columnLabels($controller);
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, PaymentType::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
