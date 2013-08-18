<?php
/* @var $this Controller */
/* @var $customer CActiveDataProvider */
/* @var $organization CActiveDataProvider */
/* @var $task CActiveDataProvider */
/* @var $deal CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

?>
    <h2>Клиенты</h2>
<?php
echo $this->renderPartial('../customer/_favorite', array(
    'dataProvider' => $customer,
));
?>
    <h2>Организации</h2>
<?php
echo $this->renderPartial('../organization/_favorite', array(
    'dataProvider' => $organization,
));
?>
    <h2>Задачи</h2>
<?php
echo $this->renderPartial('../task/_favorite', array(
    'dataProvider' => $task,
));
?>
    <h2>Сделки</h2>
<?php
echo $this->renderPartial('../deal/_favorite', array(
    'dataProvider' => $deal,
));
