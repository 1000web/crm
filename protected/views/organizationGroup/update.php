<?php
/* @var $this OrganizationGroupController */
/* @var $model OrganizationGroup */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model' => $model));