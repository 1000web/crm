<?php
/* @var $this KbController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();
$this->addButtons('kb', array('view', 'update', 'delete', 'log'));
$this->addColumns(array('state', 'value', 'question', 'answer', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
