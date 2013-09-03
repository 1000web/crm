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

    public $actions = array('create', 'index', 'admin', 'update', 'view', 'delete', 'setparam', 'favorite', 'log');

    public $attributes = array();
    public $buttons = array();
    public $columns = array();

    protected $_pagesize = 20;
    protected $show_pagesize = false;

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
        $filterparam = 'filter_' . $param;
        if ($userProfile->getAttribute($filterparam)) {
            $items[] = array(
                'label' => 'Сбросить фильтр',
                'url' => array('setparam', 'param' => $filterparam, 'value' => 0),
            );
            $items[] = '---';
        }
        foreach ($options as $key => $value) {
            $button = array(
                'label' => $value,
                'url' => array('setparam', 'param' => $filterparam, 'value' => $key),
            );
            if ($userProfile->getAttribute($filterparam) == $key) {
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

    public function actionSetparam($param, $value)
    {
        $userProfile = $this->getUserProfile();
        if ($userProfile->getAttribute($param) !== NULL) {
            $userProfile->setAttribute($param, $value);
            $userProfile->save();
        }
        if ($url = Yii::app()->request->getUrlReferrer()) $this->redirect($url);
        else $this->redirect(Yii::app()->homeUrl);
    }

    public function addAttribute($item, $value = NULL)
    {
        //$value = $this->column_value($value);
        if (!$value) $this->attributes[$item] = array('name' => $item, 'label' => $this->attributeLabels($item));
        else $this->attributes[$item] = array('name' => $item, 'label' => $this->attributeLabels($item), 'value' => $value);
    }

    public function addAttributes($list)
    {
        foreach ($list as $item) {
            $this->addAttribute($item);
            //$this->attributes[$item] = array('name' => $item, 'label' => $this->attributeLabels($item));
        }
    }

    public function attribute_value($item, $data)
    {
        $value = NULL;
        switch ($item) {
            case 'organization_id':
                $value = $data->organization->value;
                break;
            case 'user_id':
                $value = $data->user->username;
                break;
            case 'log_user_id':
                $value = $data->logUser->username;
                break;
            case 'create_user_id':
                $value = $data->createUser->username;
                break;
            case 'update_user_id':
                $value = $data->updateUser->username;
                break;
            case 'customer_id':
                $value = $data->customer->value;
                break;
            case 'contact_type_id':
                $value = $data->contactType->value;
                break;
            case 'deal_source_id':
                $value = $data->dealSource->value;
                break;
            case 'deal_stage_id':
                $value = $data->dealStage->value;
                break;
            case 'organization_type_id':
                $value = $data->organizationType->value;
                break;
            case 'organization_region_id':
                $value = $data->organizationRegion->value;
                break;
            case 'organization_group_id':
                $value = $data->organizationGroup->value;
                break;
            case 'product_type_id':
                $value = $data->productType->value;
                break;
            case 'create_time':
                $value = date("Y-m-d H:i:s", $data->create_time);
                break;
            case 'update_time':
                $value = date("Y-m-d H:i:s", $data->update_time);
                break;
            case 'datetime':
                $value = date("Y-m-d H:i:s", $data->datetime);
                break;
            case 'log_datetime':
                $value = date("Y-m-d H:i:s", $data->log_datetime);
                break;
            case 'task_type_id':
                $value = $data->taskType->value;
                break;
        }
        return $value;

    }

    public function set_attributes_values($data)
    {
        foreach ($this->attributes as $item => $attr) {
            if ($value = $this->attribute_value($item, $data)) echo $value;
            //$this->attributes[$key]['value'] = $value;
        }
    }

    public function addButton($controller, $action, $id = '$data->id')
    {
        if (!$controller) $controller = $this->id;
        if ($this->checkAccess($controller, $action)) {
            $this->buttons[$action] = array(
                'url' => 'Yii::app()->createUrl("' . $controller . '/' . $action . '", array("id"=>' . $id . '))',
            );
            switch ($action) {
                case 'log':
                    $this->buttons[$action]['icon'] = 'icon-share-alt';
                    break;
            }
        }
    }

    public function addButtons($controller, $actions, $id = '$data->id')
    {
        foreach ($actions as $action) {
            $this->addButton($controller, $action, $id);
        }
    }

    public function column_value($item, $value)
    {
        switch ($item) {
            case 'organization_id':
                $value = '$data->organization->value';
                break;
            case 'user_id':
                $value = '$data->user->username';
                break;
            case 'log_user_id':
                $value = '$data->logUser->username';
                break;
            case 'create_user_id':
                $value = '$data->create_user->username';
                break;
            case 'update_user_id':
                $value = '$data->update_user->username';
                break;
            case 'customer_id':
                $value = '$data->customer->value';
                break;
            case 'contact_type_id':
                $value = '$data->contactType->value';
                break;
            case 'deal_source_id':
                $value = '$data->dealSource->value';
                break;
            case 'deal_stage_id':
                $value = '$data->dealStage->value';
                break;
            case 'organization_type_id':
                $value = '$data->organizationType->value';
                break;
            case 'organization_region_id':
                $value = '$data->organizationRegion->value';
                break;
            case 'organization_group_id':
                $value = '$data->organizationGroup->value';
                break;
            case 'product_type_id':
                $value = '$data->productType->value';
                break;
            case 'datetime':
                $value = 'date("Y-m-d H:i:s",$data->datetime)';
                break;
            case 'log_datetime':
                $value = 'date("Y-m-d H:i:s",$data->log_datetime)';
                break;
            case 'task_type_id':
                $value = '$data->taskType->value';
                break;
        }
        return $value;
    }

    public function addColumn($item, $value = NULL)
    {
        $value = $this->column_value($item, $value);
        if (!$value) $this->columns[$item] = array('name' => $item, 'header' => $this->attributeLabels($item));
        else $this->columns[$item] = array('name' => $item, 'header' => $this->attributeLabels($item), 'value' => $value);
    }

    public function addColumns($list)
    {
        foreach ($list as $col) {
            $this->addColumn($col);
        }
    }

    public function action_icon($action)
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

    public function buildMenuOperations($id = NULL)
    {
        $items = array(
            'create' => array(
                'label' => Yii::t('lang', 'Создать'),
                'icon' => $this->action_icon('create'),
                'url' => array('create')),
            'index' => array(
                'label' => Yii::t('lang', 'Список'),
                'icon' => $this->action_icon('index'),
                'url' => array('index')),
            'admin' => array(
                'label' => Yii::t('lang', 'Управление'),
                'icon' => $this->action_icon('admin'),
                'url' => array('admin')),
            'update' => array(
                'label' => Yii::t('lang', 'Редактировать'),
                'icon' => $this->action_icon('update'),
                'url' => array('update', 'id' => $id)),
            'view' => array(
                'label' => Yii::t('lang', 'Показать'),
                'icon' => $this->action_icon('view'),
                'url' => array('view', 'id' => $id)),
            'log' => array(
                'label' => Yii::t('lang', 'История'),
                'icon' => $this->action_icon('log'),
                'url' => array('log', 'id' => $id)),
            'favorite_add' => array(
                'label' => 'В Избранное',
                'icon' => $this->action_icon('favorite_add'),
                'url' => array('favorite', 'add' => $id),
            ),
            'favorite_del' => array(
                'label' => 'Уже в Избранном',
                'icon' => $this->action_icon('favorite_del'),
                'url' => array('favorite', 'del' => $id),
            ),
            'delete' => array(
                'label' => Yii::t('lang', 'Удалить'),
                'icon' => $this->action_icon('delete'),
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
                if ($this->checkAccess($this->id, 'log')) array_push($this->menu, $items['log']);
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
                if ($this->checkAccess($this->id, 'log')) array_push($this->menu, $items['log']);
                //if ($this->checkAccess($this->id, 'admin')) array_push($this->menu, $items['admin']);
                break;
            case 'favorite':
                if ($this->checkAccess($this->id, 'index')) array_push($this->menu, $items['index']);
                if ($this->checkAccess($this->id, 'admin')) array_push($this->menu, $items['admin']);
                break;
            case 'log':
                if ($this->checkAccess($this->id, 'index')) array_push($this->menu, $items['index']);
                if ($this->checkAccess($this->id, 'view')) array_push($this->menu, $items['view']);
                if ($this->checkAccess($this->id, 'update')) array_push($this->menu, $items['update']);
                if ($this->checkAccess($this->id, 'admin')) array_push($this->menu, $items['admin']);
                break;
        }
        return;
    }

    public function buildBreadcrumbs_bak($model = NULL)
    {
        switch ($this->getAction()->getId()) {
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
            'create_time' => array('name' => 'create_time', 'label' => $this->attributeLabels('create_time'), 'value' => $create_time),
            'create_user_id' => array('name' => 'create_user_id', 'label' => $this->attributeLabels('create_user_id'), 'value' => $create_user),
            'update_time' => array('name' => 'update_time', 'label' => $this->attributeLabels('update_time'), 'value' => $update_time),
            'update_user_id' => array('name' => 'update_user_id', 'label' => $this->attributeLabels('update_user_id'), 'value' => $update_user),
        );
    }

    public function submit_button($isNewRecord)
    {
        echo "\n<div class='row buttons text-center'>\n";
        //$ret .= CHtml::submitButton($isNewRecord ? 'Создать' : 'Сохранить');
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => ($isNewRecord ? 'Создать' : 'Сохранить'),
            'type' => 'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'buttonType' => 'submit',
            //    'size' => 'large', // null, 'large', 'small' or 'mini'
        ));
        echo "&nbsp; &nbsp; &nbsp;";
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Отменить',
            'url' => Yii::app()->request->getUrlReferrer(),
            'type' => 'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            //'buttonType' => 'submit',
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
            'log_datetime' => 'Дата/время',
            'deleted' => 'Удалено',
            'description' => 'Описание',
            'email' => 'Email',
            'external_number' => 'Номер договора',
            'favadd' => 'Добавить в Избранное',
            'favdel' => 'Удалить из Избранного',
            'first_name' => 'Имя',
            'id' => '#',

            'item_id' => 'item',
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
            'organizationgroup' => 'Группа организаций',
            'organization_group_id' => 'Группа организаций',
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
            'log_user_id' => 'Пользователь',
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

    public function HttpException($code)
    {
        switch ($code) {
            case 404:
                $error = 'The requested page does not exist.';
                break;
            default:
                $error = 'Error ' . $code;
        }
        throw new CHttpException($code, $error);
    }

    public function pagesize($controller = NULL)
    {
        if ($controller == NULL) $controller = $this->id;
        $available_pagesize = array(5, 10, 20, 50, 100);
        $buttons = array(
            array('label' => 'На странице', 'disabled' => true)
        );
        foreach ($available_pagesize as $pagesize) {
            $button = array(
                'label' => $pagesize,
                'url' => array('setparam', 'param' => $controller . '_pagesize', 'value' => $pagesize)
            );
            if ($pagesize == $this->_pagesize) $button['active'] = true;
            $buttons[] = $button;
        }
        $this->widget('bootstrap.widgets.TbButtonGroup', array(
            'buttons' => $buttons
        ));
    }

}