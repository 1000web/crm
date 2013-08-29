<?php
/* @var $this TaskPriorController */
/* @var $dataProvider CActiveDataProvider */

$columns_list = array('prior','value', 'description');

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'columns_list' => $columns_list,
));
