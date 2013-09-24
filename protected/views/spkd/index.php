<?php
/* @var $this SpkdController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'spkd';
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Spkd::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
