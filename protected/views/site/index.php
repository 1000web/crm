<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<h1>Начало работы в <?php echo CHtml::encode(Yii::app()->name); ?></h1>
<table class="span-20">
<tr>
    <td class="span-4">Контакты</td>
    <td class="span-16">
        <h3>Контакты</h3>
        <p>Контакт - это люди в компании, с которыми вы общаетесь и взаимодействуете в рамках достижения бизнес-задач.</p>
        <p>
            <a href="/customer/create">Создать</a>
            или
            <a href="/customer">Список</a>
        </p>
    </td>
</tr>
<tr>
    <td class="span-4">Контрагенты</td>
    <td class="span-16">
        <h3>Контрагенты</h3>
        <p>Контрагент - это компании или корпоративные отделы, с которыми вы имеете деловые отношения.</p>
        <p>
            <a href="/organization/create">Создать</a>
            или
            <a href="/organization">Список</a>
        </p>
    </td>
</tr>
</table>

