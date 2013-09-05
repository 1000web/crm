<?php
/* @var $this TaskTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();
$this->addButtons('tasktype', array('view', 'update', 'delete', 'log'));
$this->addColumns(array('prior', 'value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
