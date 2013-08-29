<?php
/* @var $this DealStageController */
/* @var $dataProvider CActiveDataProvider */

$this->addButtons('dealstage', array('view','update', 'delete'));
$this->addColumns(array('prior','value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
