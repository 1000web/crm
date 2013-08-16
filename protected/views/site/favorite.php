<?php
/* @var $this Controller */
/* @var $customer CActiveDataProvider */
/* @var $organization CActiveDataProvider */
/* @var $task CActiveDataProvider */
/* @var $deal CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

//$columns_list = array('prior','value', 'description');

?>
<h2>Клиенты</h2>
<?php
echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $customer,
//    'columns_list' => $columns_list,
));
?>
<h2>Организации</h2>
<?php
echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $organization,
//    'columns_list' => $columns_list,
));
?>
<h2>Задачи</h2>
<?php
echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $task,
//    'columns_list' => $columns_list,
));
?>
<h2>Сделки</h2>
<?php
echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $deal,
//    'columns_list' => $columns_list,
));
