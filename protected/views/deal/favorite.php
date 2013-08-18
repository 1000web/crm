<?php
/* @var $this DealController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_favorite', array(
    'dataProvider' => $dataProvider,
));
