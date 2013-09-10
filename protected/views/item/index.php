<?php
/* @var $this ItemController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('../item/_filter_buttons');

$this->buttons = $this->columns = array();

$this->addButtons('item', array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns('item_columns',Item::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
