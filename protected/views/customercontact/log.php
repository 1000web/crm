<?php
/* @var $this CustomerContactController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = array();
$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns($this->getColumns('customercontact', CustomerContact::model()->getAvailableAttributes()), true);

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
