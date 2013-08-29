<?php
/* @var $this MenuController */
/* @var $dataProvider CActiveDataProvider */

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
