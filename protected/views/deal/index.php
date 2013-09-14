<?php
/* @var $this DealController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'deal';
echo $this->renderPartial('../' . $controller . '/_filter_buttons');
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Deal::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
