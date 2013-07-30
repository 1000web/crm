<?php
/* @var $this TaskController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Tasks',
);

$this->menu = $this->menuOperations('index');

?>

<table class="span-20">
    <tr>
        <td class="span-4">
            <img src="/images/task-150x150.jpg" />
        </td>
        <td class="span-16">
            <h1>Операции</h1>
            <h2>Отслеживайте свои Операции</h2>
            Операции - перечень или реестр задач, событий и звонков, связанных с записями CRM, относящимися к различным модулям.
        </td>
    </tr>
</table>


<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
