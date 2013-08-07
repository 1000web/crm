<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'create_time',
		'update_time',
		'create_user_id',
		'update_user_id',
		'parent_id',
		'menu_id',
		'item_id',
		'prior',
		'visible',
	),
));