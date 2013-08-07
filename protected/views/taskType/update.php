<?php
/* @var $this TaskTypeController */
/* @var $model TaskType */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model' => $model));