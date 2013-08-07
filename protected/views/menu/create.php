<?php
/* @var $this MenuController */
/* @var $model Menu */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model'=>$model));