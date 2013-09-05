<?php
/* @var $this TaskStageController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();
$this->addButtons('taskstage', array('view', 'update', 'delete', 'log'));
$this->addColumns(array('prior', 'value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
