<?php
/* @var $this OrganizationContactController */
/* @var $model OrganizationContact */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

echo $this->renderPartial('_form', array('model' => $model));