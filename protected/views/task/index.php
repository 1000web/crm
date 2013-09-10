<?php
/* @var $this TaskController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('../task/_filter_buttons');

$this->buttons = $this->columns = array();

$this->addButtons('task', array('view', 'update', 'delete', 'log'));

$this->addColumns($this->getColumns('task_columns',Task::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
