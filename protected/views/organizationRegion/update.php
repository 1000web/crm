<?php
/* @var $this OrganizationRegionController */
/* @var $model OrganizationRegion */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model' => $model));