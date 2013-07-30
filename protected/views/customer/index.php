<?php
/* @var $this CustomerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Контакты',
);

$this->menu = $this->menuOperations('index');

?>

<table width="80%">
    <tr>
        <td width="170" rowspan="2">
            <img src="/images/customer-150x150.jpg" />
        </td>
        <td colspan="2">
            <h1>Контакты</h1>
        </td>
    </tr>
    <tr>
        <td>
            <h2>Упорядочивайте свои Контакты</h2>
            Контакты - это люди в компании, с которыми вы общаетесь и взаимодействуете в рамках достижения бизнес-задач.
        </td>
    </tr>
</table>


<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
