<?php
/* @var $this TaskPriorController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addButtons('taskstage', array('view', 'update', 'delete', 'log'));

$this->addColumns($this->getColumns('taskprior_columns',TaskPrior::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
