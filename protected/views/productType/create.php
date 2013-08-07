<?php
/* @var $this ProductTypeController */
/* @var $model ProductType */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model' => $model));