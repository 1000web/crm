<?php
/* @var $this KbController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = array();
$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns($this->getColumns('kb', Kb::model()->getAvailableAttributes()), true);

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
