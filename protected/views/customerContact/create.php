<?php
/* @var $this CustomerContactController */
/* @var $model CustomerContact */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model' => $model));