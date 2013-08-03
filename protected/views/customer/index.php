<?php
/* @var $this CustomerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Клиенты',
);

$this->menu = $this->menuOperations('index');

?>

<table class="span10">
    <tr>
        <td class="span2">
            <img src="/images/customer-150x150.jpg" />
        </td>
        <td class="span8">
            <h1>Клиенты</h1>
            <h2>Упорядочивайте контакты Клиентов</h2>
            Клиенты - это люди в компании, с которыми вы общаетесь и взаимодействуете в рамках достижения бизнес-задач.
        </td>
    </tr>
</table>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
