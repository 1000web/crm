<?php
/* @var $this PaymentController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'payment';
if($this->getAction()->getId() != 'search') echo $this->renderPartial('../' . $controller . '/_filter_buttons');
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Payment::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
