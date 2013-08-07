<?php
/* @var $this OrganizationTypeController */
/* @var $model OrganizationType */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model' => $model));