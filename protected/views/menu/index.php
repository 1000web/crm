<?php
/* @var $this MenuController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addButtons('menu', array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns('menu_columns',Menu::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
