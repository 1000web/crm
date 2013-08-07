<?php
/* @var $this ItemController */
/* @var $model Item */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model'=>$model)); ?>