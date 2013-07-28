<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends RController
{
    public $layout = '//layouts/column1';
    public $menu = array();
    public $breadcrumbs = array();
    public $actions = array('create', 'index', 'admin', 'update', 'view', 'delete');


    public function filters()
    {
        return array(
            //'rights'
        );
    }

    public function accessRules()
    {
        $rules = array(
            array('allow',
                'roles' => array($this->getId() . '.*'),
            ),
        );
        // разрешения для каждого действия
        foreach ($this->actions as $action) {
            $rules[] = array(
                'actions' => array($action),
                'roles' => array($this->getId() . '.' . $action),
            );
        }
        // если ни одно правило не сработало, то действие запрещено
        $rules[] = array(
            array('deny'),
        );
        return $rules;
    }

    public function menuOperations($action, $id = NULL)
    {
        $items = array(
            'create' => array(
                'label' => Yii::t('lang', 'Создать'),
                'url' => array('create')),
            'index' => array(
                'label' => Yii::t('lang', 'Список'),
                'url' => array('index')),
            'admin' => array(
                'label' => Yii::t('lang', 'Управление'),
                'url' => array('admin')),
            'update' => array(
                'label' => Yii::t('lang', 'Редактировать'),
                'url' => array('update', 'id' => $id)),
            'view' => array(
                'label' => Yii::t('lang', 'Показать'),
                'url' => array('view', 'id' => $id)),
            'delete' => array(
                'label' => Yii::t('lang', 'Удалить'),
                'url' => '#',
                'linkOptions' => array(
                    'submit' => array('delete', 'id' => $id),
                    'confirm' => Yii::t('lang', 'Вы действительно хотите удалить эту запись?')
                )
            ),
        );
        switch ($action) {
            case 'create':
                $menu = array(
                    $items['index'],
                    $items['admin'],
                );
                break;
            case 'index':
                $menu = array(
                    $items['create'],
                    $items['admin'],
                );
                break;
            case 'admin':
                $menu = array(
                    $items['index'],
                    $items['create'],
                );
                break;
            case 'update':
                $menu = array(
                    $items['index'],
                    $items['create'],
                    $items['view'],
                    $items['delete'],
                    $items['admin'],
                );
                break;
            case 'view':
                $menu = array(
                    $items['index'],
                    $items['create'],
                    $items['update'],
                    $items['delete'],
                    $items['admin'],
                );
                break;
        }
        return $menu;
    }

}