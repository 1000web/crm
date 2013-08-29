<?php
/* @var $this ProductTypeController */
/* @var $dataProvider CActiveDataProvider */

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
