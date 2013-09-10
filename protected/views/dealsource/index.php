<?php
/* @var $this DealSourceController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addButtons('dealsource', array('view', 'update', 'delete', 'log'));

$this->addColumns($this->getColumns('dealsource_columns',DealSource::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
