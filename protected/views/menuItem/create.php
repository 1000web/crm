<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model'=>$model));