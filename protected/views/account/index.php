<?php
/* @var $this AccountController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addButtons('account', array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns('account_columns', Account::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
