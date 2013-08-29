<?php
/* @var $this MenuItemController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('_filter_buttons');

$columns_list = array('menu_id', 'id', 'parent_id', 'prior', 'visible');

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'columns_list' => $columns_list,
));
