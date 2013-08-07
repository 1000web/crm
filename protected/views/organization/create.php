<?php
/* @var $this OrganizationController */
/* @var $model Organization */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model' => $model));