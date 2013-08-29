<?php
/* @var $this ContacttypeController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

//$this->addButtons($this->id, array('view', 'update', 'delete'));

$this->addColumns(array('log_datetime', 'log_user_id', 'value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
