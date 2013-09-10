<?php
/* @var $this DealStageController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns($this->getColumns('dealstage_columns',DealStage::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
