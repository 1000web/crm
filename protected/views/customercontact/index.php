<?php
/* @var $this CustomerContactController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'customercontact';
echo $this->renderPartial('../' . $controller . '/_filter_buttons');
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, CustomerContact::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
