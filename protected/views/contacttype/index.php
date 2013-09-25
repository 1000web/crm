<?php
/* @var $this ContacttypeController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'contacttype';
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, ContactType::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
