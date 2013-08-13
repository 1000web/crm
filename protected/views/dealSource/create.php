<?php
/* @var $this DealSourceController */
/* @var $model DealSource */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model' => $model));