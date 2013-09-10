<?php
/* @var $this KbController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addButtons('kb', array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns('kb_columns',Kb::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
