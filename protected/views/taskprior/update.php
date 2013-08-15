<?php
/* @var $this TaskPriorController */
/* @var $model TaskPrior */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model' => $model));