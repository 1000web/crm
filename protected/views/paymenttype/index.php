<?php
/* @var $this PaymentTypeController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'paymenttype';
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, PaymentType::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
