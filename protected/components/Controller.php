<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends RController
{
    public $layout = '//layouts/column1';
    public $menu = array();
    public $top_menu_items = array();
    public $breadcrumbs = array();
    protected $_model = NULL;

    public $header_image = '';
    public $h1 = 'Header H1';
    public $description = '';

    public $favorite_available = false;

    public $actions = array('create', 'index', 'admin', 'update', 'view', 'delete', 'filter', 'favorite');

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

    /*
        public function accessRules()
        {
            if($this->getModule()) $module = $this->getModule()->id . '.';
            else $module = '';
            $controller = $this->getId() . '.';
            $rules = array();
            // разрешения для каждого действия
            foreach ($this->actions as $action) {
                $rules[] = array(
                    'actions' => array($action),
                    'roles' => array($module . $controller . $action),
                );
            }
            // если ни одно правило не сработало, то действие запрещено
            $rules[] = array(
                array('deny'),
            );
            return $rules;
        }/**/

    public function checkAccess($param1, $param2, $param3 = NULL)
    {
        if ($param3) {
            // param1 = module, $param2 = controller, param3 = action
            $param = $param1 . '.' . $param2 . '.' . $param3;
        } else {
            // $param1 = controller, param2 = action
            $param = $param1 . '.' . $param2;
        }
        return Yii::app()->user->checkAccess($param);
    }

    public function getUserProfile()
    {
        if (Yii::app()->user->id) $model = Yii::app()->user->user();
        if ($model === null) $this->redirect(Yii::app()->user->loginUrl);
        return $model->profile;
    }

    public function buildFilterButton($options, $param)
    {
        $items = array();
        $userProfile = $this->getUserProfile();
        $top_button_title = $this->attributeLabels($param);
        $top_button_icon = '';
        if ($userProfile->getAttribute('filter_' . $param)) {
            $items[] = array(
                'label' => 'Сбросить фильтр',
                'url' => array('filter', 'param' => $param, 'value' => 0),
            );
            $items[] = '---';
        }
        foreach ($options as $key => $value) {
            $button = array(
                'label' => $value,
                'url' => array('filter', 'param' => $param, 'value' => $key),
            );
            if ($userProfile->getAttribute('filter_' . $param) == $key) {
                $button['icon'] = 'ok';
                $top_button_icon = 'ok';
                $top_button_title = $value;
            }
            $items[] = $button;
        }
        if ($this->checkAccess($param, 'index')) {
            $items[] = array(
                'label' => 'Список',
                'icon' => 'list',
                'url' => '/' . $param . '/index',
            );
        }
        $this->widget('bootstrap.widgets.TbButtonGroup', array(
            'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'buttons' => array(
                array('label' => $top_button_title, 'icon' => $top_button_icon, 'url' => ''),
                array('items' => $items),
            ),
        ));
    }

    public function actionFilter($param, $value)
    {
        $userProfile = $this->getUserProfile();
        $userProfile->setAttribute('filter_' . $param, $value);
        $userProfile->save();
        if ($url = Yii::app()->request->getUrlReferrer()) $this->redirect($url);
        else $this->redirect(Yii::app()->homeUrl);
    }

    public function addButtonTo(&$buttons, $controller, $action, $id = '$data->id')
    {
        if ($this->checkAccess($controller, $action)) {
            $buttons[$action] = array(
                'url' => 'Yii::app()->createUrl("' . $controller . '/' . $action . '", array("id"=>' . $id . '))',
            );
        }
    }

    public function buildMenuOperations($id = NULL)
    {
        $items = array(
            'create' => array(
                'label' => Yii::t('lang', 'Создать'),
                'icon' => 'icon-plus',
                'url' => array('create')),
            'index' => array(
                'label' => Yii::t('lang', 'Список'),
                'icon' => 'icon-list',
                'url' => array('index')),
            'admin' => array(
                'label' => Yii::t('lang', 'Управление'),
                'icon' => 'icon-wrench',
                'url' => array('admin')),
            'update' => array(
                'label' => Yii::t('lang', 'Редактировать'),
                'icon' => 'icon-pencil',
                'url' => array('update', 'id' => $id)),
            'view' => array(
                'label' => Yii::t('lang', 'Показать'),
                'icon' => 'icon-view',
                'url' => array('view', 'id' => $id)),
            'delete' => array(
                'label' => Yii::t('lang', 'Удалить'),
                'icon' => 'icon-trash',
                'url' => '#',
                'linkOptions' => array(
                    'submit' => array('delete', 'id' => $id),
                    'confirm' => Yii::t('lang', 'Вы действительно хотите удалить эту запись?')
                )
            ),
            'favorite_add' => array(
                'label' => 'В Избранное',
                'icon' => 'icon-star-empty',
                'url' => array('favorite', 'add' => $id),
                /*
                'url' => '#',
                'linkOptions' => array(
                    'submit' => array('favorite', 'add' => $id),
                    'confirm' => 'Добавить в Избранное?'
                )/**/
            ),
            'favorite_del' => array(
                'label' => 'Уже в Избранном',
                'icon' => 'icon-star',
                'url' => array('favorite', 'del' => $id),
                /*
                'url' => '#',
                'linkOptions' => array(
                    'submit' => array('favorite', 'del' => $id),
                    'confirm' => 'Удалить из Избранного?'
                )/**/
            ),
        );
        $this->menu = array();
        switch ($this->getAction()->getId()) {
            case 'create':
                if ($this->checkAccess($this->id, 'index')) array_push($this->menu, $items['index']);
                if ($this->checkAccess($this->id, 'admin')) array_push($this->menu, $items['admin']);
                break;
            case 'index':
                if ($this->checkAccess($this->id, 'create')) array_push($this->menu, $items['create']);
                if ($this->checkAccess($this->id, 'admin')) array_push($this->menu, $items['admin']);
                break;
            case 'admin':
                if ($this->checkAccess($this->id, 'index')) array_push($this->menu, $items['index']);
                if ($this->checkAccess($this->id, 'create')) array_push($this->menu, $items['create']);
                break;
            case 'update':
                if ($this->checkAccess($this->id, 'index')) array_push($this->menu, $items['index']);
                //if ($this->checkAccess($this->id, 'create')) array_push($this->menu, $items['create']);
                if ($this->checkAccess($this->id, 'view')) array_push($this->menu, $items['view']);
                if ($this->checkAccess($this->id, 'delete')) array_push($this->menu, $items['delete']);
                //if ($this->checkAccess($this->id, 'admin')) array_push($this->menu, $items['admin']);
                break;
            case 'view':
                if ($this->favorite_available) {
                    if ($this->checkFavorite($id)) array_push($this->menu, $items['favorite_del']);
                    else array_push($this->menu, $items['favorite_add']);
                }
                if ($this->checkAccess($this->id, 'index')) array_push($this->menu, $items['index']);
                //if ($this->checkAccess($this->id, 'create')) array_push($this->menu, $items['create']);
                if ($this->checkAccess($this->id, 'update')) array_push($this->menu, $items['update']);
                if ($this->checkAccess($this->id, 'delete')) array_push($this->menu, $items['delete']);
                //if ($this->checkAccess($this->id, 'admin')) array_push($this->menu, $items['admin']);
                break;
        }
        return;
    }

    public function buildBreadcrumbs_bak($model = NULL)
    {
        /*
        if($model) $value = $model->value;
        else $value = NULL;/**/

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
                    $model->value => array('view', 'id' => $model->id),
                    'Редактировать',
                );
                break;
            case 'view':
                $this->breadcrumbs = array(
                    $this->name => array('index'),
                    $model->value,
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

    public function buildBreadcrumbs($id)
    {

        $item = Item::model()->findByPk($id);
        if (!$item) {
            // Нет такого пункта, показываем в виде ошибки чтобы исправить
            $this->breadcrumbs = array('Unknown Controller');
            return;
        }
        // Home page site/index
        if (!$item->parent_id) return;
        //if($item->parent_id == 1) return;
        if (!$this->breadcrumbs) {
            // это первая крошка
            $this->breadcrumbs = array($item->value);
        } else {
            // не первая крошка
            $url = '/' . $item['controller'] . '/' . $item['action'];
            if ($item['module']) $url = '/' . $item['module'] . $url;
            //$url = CHtml::link($item['value'], $url);
            $this->breadcrumbs = CMap::mergeArray(
                array($item['value'] => $url),
                $this->breadcrumbs
            );
        }
        $this->buildBreadcrumbs($item->parent_id);
    }

    public function buildPageOptions($model = NULL)
    {
        $this->top_menu_items = Menu::model()->get_menu('top_menu');

        $this->_model = $model;

        $module = $this->getModule();
        if (!$module) $module = '';
        $item = Item::model()->findByAttributes(array(
            'module' => $module,
            'controller' => $this->id,
            'action' => $this->getAction()->id,
        ));
        $this->buildBreadcrumbs($item->id);

        $this->header_image = $this->insertImage('150x150');

        if ($this->_model) {
            $this->h1 = (isset($this->_model->value) ? $this->_model->value : $item['h1']);
            $this->description = $this->_model->description;
            $this->pageTitle = (isset($this->_model->value) ? $this->_model->value : $item['h1']) . ' - ' . $item['title'];

            $this->buildMenuOperations($this->_model->id);
        } else {
            $this->h1 = $item['h1'];
            $this->description = $item['description'];
            $this->pageTitle = $item['title'];

            $this->buildMenuOperations();
        }
    }

    public function insertImage($size)
    {
        $images_folder = 'images';
        $basePath = Yii::app()->basePath . '/..';
        $img = '/' . $images_folder . '/' . $size . '/' . $this->id . '/' . $this->getAction()->getId() . '.jpg';
        if (!file_exists($basePath . $img)) {
            $img = '/' . $images_folder . '/' . $size . '/' . $this->id . '/index.jpg';
            if (!file_exists($basePath . $img)) {
                $img = '/' . $images_folder . '/' . $size . '/nophoto.jpg';
            }
        }
        return $img;
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
            array('name' => 'create_time', 'label' => $this->attributeLabels('create_time'), 'value' => $create_time),
            array('name' => 'create_user_id', 'label' => $this->attributeLabels('create_user_id'), 'value' => $create_user),
            array('name' => 'update_time', 'label' => $this->attributeLabels('update_time'), 'value' => $update_time),
            array('name' => 'update_user_id', 'label' => $this->attributeLabels('update_user_id'), 'value' => $update_user),
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
            'answer' => 'Ответ',
            'amount' => 'Стоимость',
            'create_at' => 'Дата создания',
            'create_time' => 'Дата создания',
            'create_user_id' => 'Кто создал',
            'close_date' => 'Дата закрытия',
            'contacttype' => 'Тип контакта',
            'contact_type' => 'Тип контакта',
            'contact_type_id' => 'Тип контакта',
            'customer' => 'Клиент',
            'customer_id' => 'Клиент',
            'dealsource' => 'Источник',
            'dealstage' => 'Стадия',
            'deal_source_id' => 'Источник',
            'deal_stage_id' => 'Стадия',
            'datetime' => 'Дата/время',
            'deleted' => 'Удалено',
            'description' => 'Описание',
            'email' => 'Email',
            'external_number' => 'Номер договора',
            'favadd' => 'Добавить в Избранное',
            'favdel' => 'Удалить из Избранного',
            'first_name' => 'Имя',
            'id' => '#',

            'itemparent' => 'Parent',
            'itemmodule' => 'Module',
            'itemcontroller' => 'Controller',
            'itemaction' => 'Action',

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
            'organizationtype' => 'Тип организации',
            'organization_type_id' => 'Тип организации',
            'organizationgroup' => 'Группа огранизаций',
            'organization_group_id' => 'Группа огранизаций',
            'organizationregion' => 'Регион',
            'organization_region_id' => 'Регион',
            'owner_id' => 'Владелец',
            'type' => 'Тип',
            'group' => 'Группа',
            'region' => 'Регион',
            'parent' => 'Родитель',
            'parent_id' => 'Родитель',
            'password' => 'Пароль',
            'probability' => 'Вероятность %',
            'position' => 'Должность',
            'producttype' => 'Тип продукта',
            'product_type_id' => 'Тип продукта',
            'state' => 'Статус',
            'status' => 'Статус',
            'superuser' => 'Суперпользователь',
            'tasktype' => 'Тип задачи',
            'task_type_id' => 'Тип задачи',
            'update_time' => 'Дата изменения',
            'update_user_id' => 'Кто изменил',
            'user_id' => 'Пользователь',
            'username' => 'Имя пользователя',
            'value' => 'Значение',
            'question' => 'Вопрос',

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