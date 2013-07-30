<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends RController
{
    public $layout = '//layouts/column2';
    public $menu = array();
    public $breadcrumbs = array();
    public $actions = array('create', 'index', 'admin', 'update', 'view', 'delete');

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            //'rights'
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
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

    public function view_fullname($data){
        if($data->lastname) $name = $data->lastname . ' ' . $data->firstname;
        else $name = $data->firstname;
        return "<b>" . CHtml::link(CHtml::encode($name), array('view', 'id'=>$data->id)) . "</b>\n<br />\n";
    }

    public function view_value($data){
        return "<b>" . CHtml::link(CHtml::encode($data->value), array('view', 'id'=>$data->id)) . "</b>\n<br />\n";
    }

    public function view_description($data){
        $ret = '';
        if($data->description) {
            $ret .= "<b>" . CHtml::encode($data->getAttributeLabel('description')) . ":</b>\n";
            $ret .= CHtml::encode($data->description) . "<br />\n";
        }
        return $ret;
    }

    public function submit_button($isNewRecord){
        $ret = "\n<div class='row buttons'>\n";
		$ret .= CHtml::submitButton($isNewRecord ? 'Создать' : 'Сохранить');
        $ret .= "\n</div>\n";
        return $ret;
    }
}