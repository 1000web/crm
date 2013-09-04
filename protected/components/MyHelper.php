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

} 