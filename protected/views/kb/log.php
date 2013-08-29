<?php
/* @var $this KbController */
/* @var $dataProvider CActiveDataProvider */

$columns_list = array('state', 'value', 'question', 'answer', 'description');

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'columns_list' => $columns_list,
));
