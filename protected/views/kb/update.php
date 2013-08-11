<?php
/* @var $this KbController */
/* @var $model Kb */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model'=>$model)); ?>