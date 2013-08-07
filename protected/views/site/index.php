<?php
/* @var $this SiteController */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

?>

<table class="span10">
<tr>
    <td class="span1"><img src="/images/75x75/customer/index.jpg" /></td>
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
    <td class="span1"><img src="/images/75x75/organization/index.jpg" /></td>
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
    <td class="span1"><img src="/images/75x75/task/index.jpg" /></td>
    <td class="span9">
        <h3>Задачи</h3>
        <p>Задачи - перечень или реестр задач, событий и звонков, связанных с записями CRM, относящимися к различным модулям.</p>
        <p>
            <a href="/task/create">Создать</a>
            или
            <a href="/task">Список</a>
        </p>
    </td>
</tr>
<tr>
    <td class="span1"><img src="/images/75x75/deal/index.jpg" /></td>
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

