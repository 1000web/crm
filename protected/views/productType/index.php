<?php
/* @var $this ProductTypeController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
