<?php
/* @var $this TaskStageController */
/* @var $model TaskStage */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model' => $model));