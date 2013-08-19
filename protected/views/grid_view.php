<?php
/* @var $this Controller */
/* @var $dataProvider CActiveDataProvider */
/* @var $buttons array */
/* @var $buttons_list array */
/* @var $columns array */
/* @var $columns_list array */

if(!isset($buttons)) $buttons = array();
if(!isset($buttons_list)) $buttons_list = array('view', 'update', 'delete');

if(!isset($columns)) $columns = array();
if(!isset($columns_list)) $columns_list = array();

$controller = $this->id;

if(is_array($buttons_list)) {
    foreach($buttons_list as $button){
        $this->addButtonTo($buttons, $controller, $button);
    }
}

$template = '';
$width = 15;
foreach ($buttons as $key => $value) {
    $template .= '{' . $key . '} ';
    $width += 15;
}

if(!$columns) {
    if(!$columns_list) $columns_list = array('id', 'value', 'description');
    foreach($columns_list as $col){
        $columns[] = array('name' => $col, 'header' => $this->attributeLabels($col));
    }
}

if (!empty($template)) array_push($columns,
    array(
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => $template,
        'buttons' => $buttons,
        'htmlOptions' => array(
            'style' => 'text-align:center; width: ' . $width . 'px;',
        ),
    ));
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => $columns,
    'pager' => array(
        //'maxButtonCount' => Yii::app()->controller->isMobile?4:10,
        'maxButtonCount' => 10,
        'class'          => 'bootstrap.widgets.TbPager',
    ),
));


