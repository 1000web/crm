<?php
/* @var $this TaskTypeController */
/* @var $dataProvider CActiveDataProvider */

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
