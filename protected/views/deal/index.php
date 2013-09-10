<?php
/* @var $this DealController */
/* @var $dataProvider CActiveDataProvider */

echo $this->renderPartial('../deal/_filter_buttons');

$this->buttons = $this->columns = array();

$this->addButtons('deal', array('view', 'update', 'delete', 'log'));

$this->addColumns($this->getColumns('deal_columns',Deal::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
