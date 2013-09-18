<?php

class MyHelper
{
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
            if (!empty($param1)) $param = $param1 . '.';
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
            if (!empty($param1)) $url = '/' . $param1;
            // приклеиваем два оставшихся параметра
            $url .= '/' . $param2 . '/' . $param3;
        } else {
            // прилетело 2 параметра
            // $param1 = controller, param2 = action
            $url = '/' . $param1 . '/' . $param2;
        }
        return array($url);
    }

    public static function number_format($amount){
        if($amount == 0) return '&ndash;';
        if($amount == floor($amount)) $dec = 0; else $dec = 2;
        return number_format($amount , $dec, ',', ' ');
    }

    public static function datetime_format($timestamp){

        $cur_time = time();
        $date = '';
        if(($cur_time - $timestamp) < 60) $time = ' менее минуты назад';
        else {
            if(($cur_time - $timestamp) < (60 * 60)) {
                $n = floor(($cur_time - $timestamp)/60);
                $v = 'минут';
                if($n < 5 OR $n > 20) {
                    $i = $n%10;
                    /*if($i == 0) $v = 'минут';
                    else /**/ if($i == 1) $v = 'минуту';
                    else if($i >= 2 AND $i <= 4) $v = 'минуты';
                    //else if($i >= 5 AND $i <= 9) $v = 'минут';
                }
                $time = $n . ' ' . $v . ' назад';
            }
            else {
                $time = 'в ' . date('H:i', $timestamp);
                if(date('d-m-Y', $timestamp) == date('d-m-Y', $cur_time)) $date = 'сегодня';
                else {
                    if(date('d-m-Y', $timestamp) == date('d-m-Y', $cur_time - (24 * 60 * 60))) $date = 'вчера';
                    else {
                        if(date('Y', $timestamp) == date('Y', $cur_time)) $date = date('d-m', $timestamp);
                        else $date = date('d-m-Y', $timestamp);
                    }
                }
            }
        }
        return $date . ' ' . $time;
    }

    public static function labels($param = NULL)
    {
        $array = array(
            'id' => '#',
            'value' => 'Значение',
            'comment' => 'Комментарий',
            'organization_type_id' => 'Тип',
            'organization_group_id' => 'Группа',
            'organization_region_id' => 'Регион',
            'description' => 'Описание',

            'activkey' => 'Activkey',
            'answer' => 'Ответ',
            'amount' => 'Сумма, руб.',

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

            'deal_id' => 'Сделка',
            'deal_source_id' => 'Источник',
            'deal_stage_id' => 'Стадия',
            'deal_status' => 'Активность',
            'deal_probability' => 'Вероятность',
            'datetime' => 'Дата/время',
            'log_datetime' => 'Дата/время',

            'deleted' => 'Удалено',
            'email' => 'Email',
            'external_number' => 'Номер договора',
            'favadd' => 'Добавить в Избранное',
            'favdel' => 'Удалить из Избранного',
            'first_name' => 'Имя',
            'state' => 'Статус',

            'item_id' => 'Пункт',
            'item_parent_id' => 'Родитель',
            'item_module' => 'Модуль',
            'item_controller' => 'Контроллер',
            'item_action' => 'Действие',

            'icon' => 'Иконка',
            'inner_number' => 'Внутр.номер',
            'last_name' => 'Фамилия',
            'lastvisit_at' => 'Lastvisit At',
            'log_id' => 'Log #',
            'menu' => 'Меню #',
            'menu_id' => 'Меню #',
            'open_date' => 'Дата договора',
            'organization' => 'Организация',
            'organization_id' => 'Организация',

            'owner_id' => 'Менеджер',
            'performer_id' => 'Исполнитель',

            'type' => 'Тип',
            'group' => 'Группа',
            'region' => 'Регион',
            'menu_parent_id' => 'Родитель',
            'parent_id' => 'Родитель',
            'password' => 'Пароль',
            'probability' => 'Вероятность, %',
            'position' => 'Должность',
            'product_type_id' => 'Тип продукта',
            'payment_type_id' => 'Тип платежа',
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
            'title' => 'Заголовок',
            'h1' => 'H1',
            'module' => 'Модуль',
            'controller' => 'Контроллер',
            'action' => 'Действие',
            'url' => 'Url',
            'guest_only' => 'Только гость',

        );
        switch ($param) {
            case 'account':
                $array['value'] = 'Название счета';
                break;
            case 'customercontact':
            case 'organizationcontact':
                $array['value'] = 'Контактные данные';
                break;
            case 'customer':
                $array['value'] = 'Фамилия Имя Отчество';
                break;
            case 'deal':
                $array['value'] = 'Предмет договора';
                $array['customer_id'] = 'Исполнитель от клиента';
                break;
            case 'kb':
                $array['value'] = 'Краткое описание';
                $array['description'] = 'Полное описание';
                break;
            case 'payment':
                $array['value'] = 'Назначение платежа';
                break;
            case 'organization':
                $array['value'] = 'Название организации';
                break;
            case 'task':
                $array['value'] = 'Суть задачи';
                $array['user_id'] = 'Исполнитель';
                break;
            case 'taskstage':
                $array['value'] = 'Название этапа';
                break;
        }
        return $array;
    }

    public static function getValue($name, $myvar = '$data')
    {
        $datetime_format = 'Y-m-d H:i:s';
        switch ($name) {
            case 'organization_id':
                if (!self::checkAccess('organization', 'view')) $value = '$data->organization->value';
                else $value = 'CHtml::link(CHtml::encode($data->organization->value),array("/organization/view","id"=>$data->organization_id))';
                break;
            case 'user_id':
                $value = '$data->user?$data->user->username:""';
                //$value = '($data->user_id == Yii::app()->user->id)?"Я":$data->user->username';
                //$value = '$data->user->profiles->last_name $data->user->profiles->first_name ($data->user->username)';
                break;
            case 'owner_id':
                $value = '$data->owner->username';
                //$value = '($data->owner_id == Yii::app()->user->id)?"Я":$data->owner->username';
                break;
            case 'performer_id':
                $value = '$data->performer?$data->performer->username:""';
                //$value = '($data->performer_id == Yii::app()->user->id)?"Я":$data->performer->username';
                break;
            case 'log_user_id':
                $value = '$data->log_user->username';
                break;
            case 'create_user_id':
                $value = '$data->create_user->username';
                //$value = '$data->create_user->profiles->last_name $data->user->create_user->first_name ($data->create_user->username)';
                break;
            case 'update_user_id':
                $value = '$data->update_user->username';
                break;
            case 'customer_id':
                if (!self::checkAccess('customer', 'view')) $value = '$data->customer->value';
                else $value = 'CHtml::link(CHtml::encode($data->customer->value),array("/customer/view","id"=>$data->customer_id))';
                break;
            case 'amount':
                $value = 'MyHelper::number_format($data->amount)';
                break;
            case 'contact_type_id':
                $value = '$data->contact_type->value';
                break;
            case 'deal_id':
                if (!self::checkAccess('deal', 'view')) $value = '$data->deal->value';
                else $value = 'CHtml::link(CHtml::encode($data->deal->value),array("/deal/view","id"=>$data->deal_id))';
                break;
            case 'deal_source_id':
                $value = '$data->deal_source->value';
                break;
            case 'deal_stage_id':
                $value = '$data->deal_stage->value';
                break;
            case 'organization_type_id':
                $value = '$data->organization_type->value';
                break;
            case 'organization_region_id':
                $value = '$data->organization_region->value';
                break;
            case 'organization_group_id':
                $value = '$data->organization_group->value';
                break;
            case 'payment_type_id':
                $value = '$data->payment_type->value';
                break;
            case 'product_type_id':
                $value = '$data->product_type->value';
                break;
            case 'datetime':
                //$value = 'date("'.$datetime_format.'",$data->datetime)';
                $value = '$data->datetime';
                break;
            case 'create_time':
                $value = 'date("'.$datetime_format.'",$data->create_time)';
                break;
            case 'update_time':
                $value = 'date("'.$datetime_format.'",$data->update_time)';
                break;
            case 'log_datetime':
                $value = 'date("'.$datetime_format.'",$data->log_datetime)';
                break;
            case 'task_type_id':
                $value = '$data->task_type->value';
                break;
            case 'task_stage_id':
                $value = '$data->task_stage->value';
                break;
            case 'task_prior_id':
                $value = '$data->task_prior->value';
                break;
            case 'state':
                $value = '$data->getStateName($data->state)';
                break;
            default:
                $value = NULL;
        }
        if ($myvar != '$data') $value = str_replace('$data', $myvar, $value);
        return $value;
    }


}