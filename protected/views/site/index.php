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
            <?php
            if(Yii::app()->user->checkAccess('customer.create')) echo '<a href="/customer/create">Создать</a>';
            if(Yii::app()->user->checkAccess('customer.index')) echo '<a href="/customer/index">Список</a>';
            if(Yii::app()->user->checkAccess('customer.admin')) echo '<a href="/customer/admin">Управление</a>';
            ?>
        </p>
    </td>
</tr>
<tr>
    <td class="span1"><img src="/images/75x75/organization/index.jpg" /></td>
    <td class="span9">
        <h3>Организации</h3>
        <p>Организации - это компании или корпоративные отделы, с которыми вы имеете деловые отношения.</p>
        <p>
            <?php
            if(Yii::app()->user->checkAccess('organization.create')) echo '<a href="/organization/create">Создать</a>';
            if(Yii::app()->user->checkAccess('organization.index')) echo '<a href="/organization/index">Список</a>';
            if(Yii::app()->user->checkAccess('organization.admin')) echo '<a href="/organization/admin">Управление</a>';
            ?>
        </p>
    </td>
</tr>
<tr>
    <td class="span1"><img src="/images/75x75/task/index.jpg" /></td>
    <td class="span9">
        <h3>Задачи</h3>
        <p>Задачи - перечень или реестр задач, событий и звонков, связанных с записями CRM, относящимися к различным модулям.</p>
        <p>
            <?php
            if(Yii::app()->user->checkAccess('task.create')) echo '<a href="/task/create">Создать</a>';
            if(Yii::app()->user->checkAccess('task.index')) echo '<a href="/task/index">Список</a>';
            if(Yii::app()->user->checkAccess('task.admin')) echo '<a href="/task/admin">Управление</a>';
            ?>
        </p>
    </td>
</tr>
<tr>
    <td class="span1"><img src="/images/75x75/deal/index.jpg" /></td>
    <td class="span9">
        <h3>Потенциальные сделки</h3>
        <p>Потенциальные сделки - это сделки с организациями или людьми, приносящие доход вашей организации.</p>
        <p>
            <?php
            if(Yii::app()->user->checkAccess('deal.create')) echo '<a href="/deal/create">Создать</a>';
            if(Yii::app()->user->checkAccess('deal.index')) echo '<a href="/deal/index">Список</a>';
            if(Yii::app()->user->checkAccess('deal.admin')) echo '<a href="/deal/admin">Управление</a>';
            ?>
        </p>
    </td>
</tr>
</table>

