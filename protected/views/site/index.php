<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<h1>Начало работы в <?php echo CHtml::encode(Yii::app()->name); ?></h1>
<table class="span10">
<tr>
    <td class="span1"><img src="/images/customer-75x75.jpg" /></td>
    <td class="span9">
        <h3>Клиенты</h3>
        <p>Клиенты - это люди в компании, с которыми вы общаетесь и взаимодействуете в рамках достижения бизнес-задач.</p>
        <p>
            <a href="/customer/create">Создать</a>
            или
            <a href="/customer">Список</a>
        </p>
    </td>
</tr>
<tr>
    <td class="span1"><img src="/images/organization-75x75.jpg" /></td>
    <td class="span9">
        <h3>Организации</h3>
        <p>Организации - это компании или корпоративные отделы, с которыми вы имеете деловые отношения.</p>
        <p>
            <a href="/organization/create">Создать</a>
            или
            <a href="/organization">Список</a>
        </p>
    </td>
</tr>
<tr>
    <td class="span1"><img src="/images/task-75x75.jpg" /></td>
    <td class="span9">
        <h3>Операции</h3>
        <p>Операции - перечень или реестр задач, событий и звонков, связанных с записями CRM, относящимися к различным модулям.</p>
        <p>
            <a href="/task/create">Создать</a>
            или
            <a href="/task">Список</a>
        </p>
    </td>
</tr>
<tr>
    <td class="span1"><img src="/images/deal-75x75.jpg" /></td>
    <td class="span9">
        <h3>Потенциальные сделки</h3>
        <p>Потенциальные сделки - это сделки с организациями или людьми, приносящие доход вашей организации.</p>
        <p>
            <a href="/deal/create">Создать</a>
            или
            <a href="/deal">Список</a>
        </p>
    </td>
</tr>
</table>

