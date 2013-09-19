<?php
/* @var $this SafetyclassController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = array();
$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns($this->getColumns('safetyclass', Safetyclass::model()->getAvailableAttributes()), true);

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
