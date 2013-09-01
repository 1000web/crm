<?php
/* @var $this SiteController */
?>

<div class="span12">
    <div class="row">
        <div class="span1"><img src="/images/75x75/customer/index.jpg"/></div>
        <div class="span11">
            <h3>Клиенты</h3>

            <p>Клиенты - это люди в компании, с которыми вы общаетесь и взаимодействуете в рамках достижения
                бизнес-задач.</p>

            <p>
                <?php
                if (Yii::app()->user->checkAccess('customer.create')) echo '<a href="/customer/create">Создать</a>&nbsp;&nbsp;&nbsp;';
                if (Yii::app()->user->checkAccess('customer.index')) echo '<a href="/customer/index">Список</a>&nbsp;&nbsp;&nbsp;';
                if (Yii::app()->user->checkAccess('customer.admin')) echo '<a href="/customer/admin">Управление</a>&nbsp;&nbsp;&nbsp;';
                ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="span1"><img src="/images/75x75/organization/index.jpg"/></div>
        <div class="span11">
            <h3>Организации</h3>

            <p>Организации - это компании или корпоративные отделы, с которыми вы имеете деловые отношения.</p>

            <p>
                <?php
                if (Yii::app()->user->checkAccess('organization.create')) echo '<a href="/organization/create">Создать</a>&nbsp;&nbsp;&nbsp;';
                if (Yii::app()->user->checkAccess('organization.index')) echo '<a href="/organization/index">Список</a>&nbsp;&nbsp;&nbsp;';
                if (Yii::app()->user->checkAccess('organization.admin')) echo '<a href="/organization/admin">Управление</a>&nbsp;&nbsp;&nbsp;';
                ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="span1"><img src="/images/75x75/task/index.jpg"/></div>
        <div class="span11">
            <h3>Задачи</h3>

            <p>Задачи - перечень или реестр задач, событий и звонков, связанных с записями CRM, относящимися к различным
                модулям.</p>

            <p>
                <?php
                if (Yii::app()->user->checkAccess('task.create')) echo '<a href="/task/create">Создать</a>&nbsp;&nbsp;&nbsp;';
                if (Yii::app()->user->checkAccess('task.index')) echo '<a href="/task/index">Список</a>&nbsp;&nbsp;&nbsp;';
                if (Yii::app()->user->checkAccess('task.admin')) echo '<a href="/task/admin">Управление</a>&nbsp;&nbsp;&nbsp;';
                ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="span1"><img src="/images/75x75/deal/index.jpg"/></div>
        <div class="span11">
            <h3>Потенциальные сделки</h3>

            <p>Потенциальные сделки - это сделки с организациями или людьми, приносящие доход вашей организации.</p>

            <p>
                <?php
                if (Yii::app()->user->checkAccess('deal.create')) echo '<a href="/deal/create">Создать</a>&nbsp;&nbsp;&nbsp;';
                if (Yii::app()->user->checkAccess('deal.index')) echo '<a href="/deal/index">Список</a>&nbsp;&nbsp;&nbsp;';
                if (Yii::app()->user->checkAccess('deal.admin')) echo '<a href="/deal/admin">Управление</a>&nbsp;&nbsp;&nbsp;';
                ?>
            </p>
        </div>
    </div>
</div>


