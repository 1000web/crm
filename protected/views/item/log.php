<?php
/* @var $this ItemController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('_filter_buttons');

$columns_list = array('id', 'parent_id', 'module', 'controller', 'action', 'icon', 'value', 'title');

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'columns_list' => $columns_list,
));
