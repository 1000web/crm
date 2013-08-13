<?php
/* @var $this DealStageController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$columns_list = array('prior','value', 'description');

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'columns_list' => $columns_list,
));
