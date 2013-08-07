<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends RController
{
    public $layout = '//layouts/column2';
    public $menu = array();
    public $top_menu_items = array();
    public $breadcrumbs = array();

    public $name = 'Controller';
    public $pageHeader = '';
    public $h1 = 'Header H1';
    public $description = '';

    public $actions = array('create', 'index', 'admin', 'update', 'view', 'delete');

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'rights',
            //'accessControl', // perform access control for CRUD operations
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

    public function buildMenuOperations($id = NULL)
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
        $this->menu = array();
        switch ($this->getAction()->getId()) {
            case 'create':
                if(Yii::app()->user->checkAccess($this->id . '.index'))     array_push($this->menu, $items['index']);
                if(Yii::app()->user->checkAccess($this->id . '.admin'))     array_push($this->menu, $items['admin']);
                break;
            case 'index':
                if(Yii::app()->user->checkAccess($this->id . '.create'))    array_push($this->menu, $items['create']);
                if(Yii::app()->user->checkAccess($this->id . '.admin'))     array_push($this->menu, $items['admin']);
                break;
            case 'admin':
                if(Yii::app()->user->checkAccess($this->id . '.index'))     array_push($this->menu, $items['index']);
                if(Yii::app()->user->checkAccess($this->id . '.create'))    array_push($this->menu, $items['create']);
                break;
            case 'update':
                if(Yii::app()->user->checkAccess($this->id . '.index'))     array_push($this->menu, $items['index']);
                if(Yii::app()->user->checkAccess($this->id . '.create'))    array_push($this->menu, $items['create']);
                if(Yii::app()->user->checkAccess($this->id . '.view'))      array_push($this->menu, $items['view']);
                if(Yii::app()->user->checkAccess($this->id . '.delete'))    array_push($this->menu, $items['delete']);
                if(Yii::app()->user->checkAccess($this->id . '.admin'))     array_push($this->menu, $items['admin']);
                break;
            case 'view':
                if(Yii::app()->user->checkAccess($this->id . '.index'))     array_push($this->menu, $items['index']);
                if(Yii::app()->user->checkAccess($this->id . '.create'))    array_push($this->menu, $items['create']);
                if(Yii::app()->user->checkAccess($this->id . '.update'))    array_push($this->menu, $items['update']);
                if(Yii::app()->user->checkAccess($this->id . '.delete'))    array_push($this->menu, $items['delete']);
                if(Yii::app()->user->checkAccess($this->id . '.admin'))     array_push($this->menu, $items['admin']);
                break;
        }
        return;
    }

    public function buildBreadcrumbs($model = NULL)
    {
        if($model) {
            if($this->id == 'customer') $value = $model->lastname . ' ' . $model->firstname;
            else $value = $model->value;
        } else $value = NULL;

        switch ($this->getAction()->getId()) {
            case 'admin':
                $this->breadcrumbs = array(
                    $this->name => array('index'),
                    'Управление',
                );
                break;
            case
            'create':
                $this->breadcrumbs = array(
                    $this->name => array('index'),
                    'Создать',
                );
                break;
            case 'update':
                $this->breadcrumbs = array(
                    $this->name => array('index'),
                    $value => array('view', 'id' => $model->id),
                    'Редактировать',
                );
                break;
            case 'view':
                $this->breadcrumbs = array(
                    $this->name => array('index'),
                    $value,
                );
                break;
            case 'index':
            default:
            $this->breadcrumbs = array(
                    $this->name,
                );
        }
        return;
    }

    public function buildHeaderH1($model = NULL){
        switch ($this->getAction()->getId()) {
            case 'admin':
                $this->h1 = 'Управление ' . $this->name;
                break;
            case 'create':
                $this->h1 = 'Создать ' . $this->name;
                break;
            case 'update':
                $this->h1 = 'Редактировать:' . $model->value;
                break;
            case 'view':
                $this->h1 = $model->value;
                $this->description = $model->description;
                break;
            case 'index':
            default:
                $this->h1 = $this->name;
        }
    }

    public function buildPageOptions($model = NULL){
        $item = Item::model()->findByAttributes(array(
            'controller' => $this->id,
            'action' => $this->getAction()->getId(),
        ));
        $this->h1 = $item['h1'];
        $this->pageTitle = $item['title'];
        $this->description = $item['description'];

        $this->top_menu_items = Menu::model()->get_menu('top_menu');

        $this->buildBreadcrumbs($model);
        $this->buildPageHeader('150x150');

        if($model) $this->buildMenuOperations($model->id);
        else $this->buildMenuOperations();
    }

    public function insertImage($size){
        $images_folder = 'images';
        $basePath = Yii::app()->basePath . '/..';
        $img = '/'.$images_folder.'/'.$size.'/' . $this->id . '/' . $this->getAction()->getId() . '.jpg';
        if (!file_exists($basePath . $img)) {
            $img = '/'.$images_folder.'/'.$size.'/' . $this->id . '/index.jpg';
            if (!file_exists($basePath . $img)) {
                $img = '/'.$images_folder.'/'.$size.'/nophoto.jpg';
            }
        }
        return $img;
    }
    public function buildPageHeader($size)
    {
        $this->pageHeader = "
<table class='span10'>
    <tr><td class='span2' ><img src='" . $this->insertImage($size) . "' /></td>
        <td class='span8'>
            <h1>".$this->h1."</h1>
            <p>".$this->description."</p>
        </td>
    </tr>
</table>\n\n";
        return;
    }

    public function created_updated($model)
    {
        $create_time = date('Y-m-d H:i:s', $model->create_time);
        //$create_time = Yii::app()->datetimeFormatter->format('d MMMM yyyy H:i:s', $model->create_time);
        $create_user = $model->createUser->profiles->last_name . ' ' . $model->createUser->profiles->first_name . ' (' . $model->createUser->username . ')';

        $update_time = date('Y-m-d H:i:s', $model->update_time);
        //$update_time = Yii::app()->datetimeFormatter->format('d MMMM yyyy H:i:s', $model->update_time);
        $update_user = $model->updateUser->profiles->last_name . ' ' . $model->updateUser->profiles->first_name . ' (' . $model->updateUser->username . ')';

        return array(
            array('name' => 'create_time', 'label' => 'Дата создания', 'value' => $create_time),
            array('name' => 'create_user_id', 'label' => 'Кто создал', 'value' => $create_user),
            array('name' => 'update_time', 'label' => 'Дата изменения', 'value' => $update_time),
            array('name' => 'update_user_id', 'label' => 'Кто изменил', 'value' => $update_user),
        );
    }

    public function submit_button($isNewRecord)
    {
        echo "\n<div class='row buttons'>\n";
        //$ret .= CHtml::submitButton($isNewRecord ? 'Создать' : 'Сохранить');
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => ($isNewRecord ? 'Создать' : 'Сохранить'),
            'type' => 'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'buttonType' => 'submit',
            //    'size' => 'large', // null, 'large', 'small' or 'mini'
        ));
        echo "\n</div>\n";
        //return $ret;
    }

    public function manage_search_form($model)
    {
        $ret = "\n<p>\nМожно использовать операторы сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> или <b>=</b>) в начале параметра поиска.\n</p>\n";
        $ret .= CHtml::link('Расширенный поиск', '#', array('class' => 'search-button'));
        $ret .= '<div class="search-form" style="display:none">';
        $ret .= $this->renderPartial('_search', array('model' => $model), true);
        $ret .= "</div><!-- search-form -->\n\n";
        return $ret;
    }

    public function attributeLabels($key)
    {
        $arr = array(
            'activkey' => 'Activkey',
            'create_at' => 'Дата создания',
            'create_time' => 'Дата создания',
            'create_user_id' => 'Кто создал',
            'contact_type' => 'Тип контакта',
            'contact_type_id' => 'Тип контакта',
            'customer_id' => 'Клиент',
            'datetime' => 'Дата/время',
            'deleted' => 'Удалено',
            'description' => 'Описание',
            'email' => 'Email',
            'firstname' => 'Имя',
            'first_name' => 'Имя',
            'id' => '#',
            'lastname' => 'Фамилия',
            'last_name' => 'Фамилия',
            'lastvisit_at' => 'Lastvisit At',
            'log_id' => 'Log #',
            'organization' => 'Организация',
            'organization_id' => 'Организация',
            'organization_type_id' => 'Тип организации',
            'organization_group_id' => 'Группа огранизаций',
            'organization_region_id' => 'Регион',
            'type' => 'Тип',
            'group' => 'Группа',
            'region' => 'Регион',
            'password' => 'Пароль',
            'position' => 'Должность',
            'product_type_id' => 'Тип продукта',
            'status' => 'Статус',
            'superuser' => 'Суперпользователь',
            'task_type_id' => 'Тип задачи',
            'update_time' => 'Дата изменения',
            'update_user_id' => 'Кто изменил',
            'user_id' => 'Пользователь',
            'username' => 'Имя пользователя',
            'value' => 'Значение',

            'parent_id' => 'Родитель',
            'prior' => 'Приоритет',
            'visible' => 'Видимость',
            'title' => 'Title',
            'h1' => 'H1',
            'module' => 'Module',
            'controller' => 'Controller',
            'action' => 'Action',

        );
        return $arr[$key];
    }

}