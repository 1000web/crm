<?php
/* @var $this KbController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns($this->getColumns('kb_columns',Kb::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
