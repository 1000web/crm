<?php

class MyHelper {
    public static function action_icon($action)
    {
        $icons = array(
            'create' => 'icon-plus',
            'index' => 'icon-list',
            'admin' => 'icon-wrench',
            'update' => 'icon-pencil',
            'view' => 'icon-eye-open',
            'delete' => 'icon-trash',
            'log' => 'icon-share-alt',
            'column' => 'icon-list',
            'favorite_add' => 'icon-star-empty',
            'favorite_del' => 'icon-star',
            'favorite' => 'icon-star',
        );
        return $icons[$action];
    }

    public static function checkAccess($param1, $param2, $param3 = NULL)
    {
        $param = '';
        if ($param3 !== NULL) {
            // прилетело 3 параметра
            // param1 = module, $param2 = controller, param3 = action
            // первый параметр непустой
            if(!empty($param1)) $param = $param1 . '.';
            // приклеиваем два оставшихся параметра
            $param .= $param2 . '.' . $param3;
        } else {
            // прилетело 2 параметра
            // $param1 = controller, param2 = action
            $param = $param1 . '.' . $param2;
        }
        return Yii::app()->user->checkAccess($param);
    }

    public static function createURL($param1, $param2, $param3 = NULL)
    {
        $url = '';
        if ($param3 !== NULL) {
            // прилетело 3 параметра
            // param1 = module, $param2 = controller, param3 = action
            // первый параметр непустой
            if(!empty($param1)) $url = '/' . $param1;
            // приклеиваем два оставшихся параметра
            $url .= '/' . $param2 . '/' . $param3;
        } else {
            // прилетело 2 параметра
            // $param1 = controller, param2 = action
            $url = '/' . $param1 . '/' . $param2;
        }
        return array($url);
    }

    public static function labels()
    {
        return array(
            'id' => '#',
            'value' => 'Значение',
            'organization_type_id' => 'Тип',
            'organization_group_id' => 'Группа',
            'organization_region_id' => 'Регион',
            'description' => 'Описание',

            'activkey' => 'Activkey',
            'answer' => 'Ответ',
            'amount' => 'Стоимость',

            'bank' => 'Название банка',
            'bik' => 'БИК',
            'inn' => 'ИНН',
            'kpp' => 'КПП',
            'korr' => 'Корр.счет',
            'schet' => 'Счет',

            'create_at' => 'Дата создания',
            'create_time' => 'Дата создания',
            'create_user_id' => 'Кто создал',
            'close_date' => 'Дата закрытия',
            'contact_type_id' => 'Тип контакта',
            'customer' => 'Клиент',
            'customer_id' => 'Клиент',

            'date' => 'Дата',
            'time' => 'Время',

            'deal_source_id' => 'Источник',
            'deal_stage_id' => 'Стадия',
            'deal_status' => 'Активность',
            'datetime' => 'Дата/время',
            'log_datetime' => 'Дата/время',

            'deleted' => 'Удалено',
            'email' => 'Email',
            'external_number' => 'Номер договора',
            'favadd' => 'Добавить в Избранное',
            'favdel' => 'Удалить из Избранного',
            'first_name' => 'Имя',
            'state' => 'Статус',

            'item_id' => 'item',
            'item_parent_id' => 'Parent',
            'item_module' => 'Module',
            'item_controller' => 'Controller',
            'item_action' => 'Action',

            'icon' => 'Icon',
            'inner_number' => 'Внутр.номер',
            'last_name' => 'Фамилия',
            'lastvisit_at' => 'Lastvisit At',
            'log_id' => 'Log #',
            'menu' => 'Menu #',
            'menu_id' => 'Menu #',
            'open_date' => 'Дата договора',
            'organization' => 'Организация',
            'organization_id' => 'Организация',
            'owner_id' => 'Владелец',
            'type' => 'Тип',
            'group' => 'Группа',
            'region' => 'Регион',
            'parent' => 'Родитель',
            'parent_id' => 'Родитель',
            'password' => 'Пароль',
            'probability' => 'Вероятность, %',
            'position' => 'Должность',
            'product_type_id' => 'Тип продукта',
            'status' => 'Статус',
            'superuser' => 'Суперпользователь',

            'task_type_id' => 'Тип задачи',
            'task_stage_id' => 'Этап',
            'task_prior_id' => 'Приоритет',
            'task_owner_id' => 'Владелец',
            'task_user_id' => 'Исполнитель',
            'task_status' => 'Активность',

            'update_time' => 'Дата изменения',
            'update_user_id' => 'Кто изменил',
            'log_user_id' => 'Пользователь',
            'user_id' => 'Пользователь',
            'username' => 'Имя пользователя',
            'question' => 'Вопрос',

            'prior' => 'Приоритет',
            'visible' => 'Видимость',
            'title' => 'Title',
            'h1' => 'H1',
            'module' => 'Module',
            'controller' => 'Controller',
            'action' => 'Action',
            'url' => 'Url',
            'guest_only' => 'Только гость',

        );
    }


}