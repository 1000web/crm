<?php
/* @var $this Controller */
/* @var $dataProvider CActiveDataProvider */

$template = '';
$width = 15;
foreach ($this->buttons as $key => $value) {
    $template .= '{' . $key . '} ';
    $width += 15;
}

if (!empty($template)) array_push($this->columns,
    array(
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => $template,
        'buttons' => $this->buttons,
        'htmlOptions' => array(
            'style' => 'text-align:center; width: ' . $width . 'px;',
        ),
    ));
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => '{summary}{pager}{items}{pager}',
    'enablePagination' => true,
    'columns' => $this->columns,
    'pager' => array(
        //'maxButtonCount' => Yii::app()->controller->isMobile?4:10,
        'maxButtonCount' => 10,
        'class' => 'bootstrap.widgets.TbPager',
    ),
));


