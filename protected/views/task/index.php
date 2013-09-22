<?php
/* @var $this TaskController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'task';
if($this->getAction()->getId() != 'search') $this->renderPartial('../'.$controller.'/_filter_buttons');
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Task::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
