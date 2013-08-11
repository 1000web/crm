<?php

class SiteController extends Controller
{
    public $actions = array('index', 'about', 'login', 'error', 'test', 'filter');

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionAbout()
    {
        $this->render('about');
    }

    public function actionLogin()
    {
        //$this->render('login');
        if(Yii::app()->user->isGuest) $this->redirect('/user/login');
        else $this->redirect('/');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function buildBreadcrumbs($model = NULL) {}

    public function buildMenuOperations($model = NULL) {}

    /*
    public function actionTestM(){
        if($this->getModule()) $module = $this->getModule()->id . '.';
        else $module = '';
        $controller = $this->getId() . '.';
        echo $module . $controller . $this->getAction()->id;
    }*/

    public function actionTest()
    {
        // top menu
        /*
        $menu = new CActiveDataProvider('MenuItem', array(
            'criteria' => array(
                'condition' => 'menu_id=' . $menu_id,
                'condition' => 'visible=1',
                'order' => 'prior ASC',
                //'with' => array('createUser','updateUser'),
            ),
        ));/**/


/*
        $criteria = new CDbCriteria;
        $criteria->condition = 'menu_id=:menu_id';
        $criteria->condition = 'parent_id=:parent_id';
        $criteria->condition = 'visible=1';
        $criteria->params = array(':menu_id' => $menu_id);
        $criteria->params = array(':parent_id' => NULL);
        $menu = Item::model()->find($criteria); // $params не требуется
        /**/

        $this->render('test');
    }
}