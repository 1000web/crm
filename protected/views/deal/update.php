<?php
/* @var $this DealController */
/* @var $model Deal */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model' => $model)); ?>