<?php
/* @var $this MenuController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();
$this->addButtons('menu', array('view', 'update', 'delete', 'log'));
$this->addColumns(array('value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
