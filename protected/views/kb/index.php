<?php
/* @var $this KbController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$columns_list = array('state', 'value', 'question', 'answer', 'description');

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'columns_list' => $columns_list,
));
