<?php
/* @var $this TaskTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addButtons('tasktype', array('view', 'update', 'delete', 'log'));

$this->addColumns($this->getColumns('tasktype_columns',TaskType::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
