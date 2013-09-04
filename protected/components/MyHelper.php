<?php

class MyHelper {
    static function action_icon($action)
    {
        $icons = array(
            'create' => 'icon-plus',
            'index' => 'icon-list',
            'admin' => 'icon-wrench',
            'update' => 'icon-pencil',
            'view' => 'icon-eye-open',
            'delete' => 'icon-trash',
            'log' => 'icon-share-alt',
            'favorite_add' => 'icon-star-empty',
            'favorite_del' => 'icon-star',
            'favorite' => 'icon-star',
        );
        return $icons[$action];
    }

    static function checkAccess($param1, $param2, $param3 = NULL)
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


    static function createURL($param1, $param2, $param3 = NULL)
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
        return $url;
    }

}