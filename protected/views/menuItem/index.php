<?php
/* @var $this MenuItemController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$columns_list = array('id', 'parent_id', 'menu_id', 'prior', 'visible');

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'columns_list' => $columns_list,
));
