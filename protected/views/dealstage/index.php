<?php
/* @var $this DealStageController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addButtons('dealstage', array('view', 'update', 'delete', 'log'));

$this->addColumns($this->getColumns('dealstage_columns',DealStage::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
