<?php
/* @var $this DealController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'deal';
$this->columnLabels($controller);
if($this->getAction()->getId() != 'search' AND !isset($no_filter_buttons)) $this->renderPartial('../' . $controller . '/_filter_buttons');
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Deal::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
