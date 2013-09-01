<?php
/* @var $this Controller */
/* @var $customer CActiveDataProvider */
/* @var $organization CActiveDataProvider */
/* @var $task CActiveDataProvider */
/* @var $deal CActiveDataProvider */
?>
    <h2>Клиенты</h2>
<?php
echo $this->renderPartial('../customer/index', array(
    'dataProvider' => $customer,
));
?>
    <h2>Организации</h2>
<?php
echo $this->renderPartial('../organization/index', array(
    'dataProvider' => $organization,
));
?>
    <h2>Задачи</h2>
<?php
echo $this->renderPartial('../task/index', array(
    'dataProvider' => $task,
));
?>
    <h2>Сделки</h2>
<?php
echo $this->renderPartial('../deal/index', array(
    'dataProvider' => $deal,
));
