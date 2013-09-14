<?php
/* @var $this TaskController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'task';
$this->renderPartial('../'.$controller.'/_filter_buttons');
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Task::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
