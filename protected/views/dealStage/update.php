<?php
/* @var $this DealStageController */
/* @var $model DealStage */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model' => $model));