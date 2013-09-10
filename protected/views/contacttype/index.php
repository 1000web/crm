<?php
/* @var $this ContacttypeController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addButtons('contacttype', array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns('contacttype_columns',ContactType::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
