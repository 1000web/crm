<?php
/* @var $this CustomerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Контакты',
);

$this->menu = $this->menuOperations('index');

?>

<table class="span10">
    <tr>
        <td class="span2">
            <img src="/images/customer-150x150.jpg" />
        </td>
        <td class="span8">
            <h1>Контакты</h1>
            <h2>Упорядочивайте свои Контакты</h2>
            Контакты - это люди в компании, с которыми вы общаетесь и взаимодействуете в рамках достижения бизнес-задач.
        </td>
    </tr>
</table>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
