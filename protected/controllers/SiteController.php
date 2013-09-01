<?php

class SiteController extends Controller
{
    public $actions = array('index', 'about', 'login', 'error', 'test', 'setparam', 'favorite');

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $this->buildPageOptions();
        $this->render('index');
    }

    public function actionAbout()
    {
        $this->buildPageOptions();
        $this->render('about');
    }

    public function actionLogin()
    {
        //$this->render('login');
        if (Yii::app()->user->isGuest) $this->redirect('/user/login');
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
            else {
                $this->buildPageOptions();
                $this->render('error', $error);
            }
        }
    }

    public function buildMenuOperations($model = NULL)
    {
    }

    public function actionFavorite()
    {
        $userProfile = $this->getUserProfile();
        $this->buildPageOptions();
        $this->render('favorite', array(
            'customer' => Customer::model()->getAll($userProfile, 'favorite'),
            'organization' => Organization::model()->getAll($userProfile, 'favorite'),
            'task' => Task::model()->getAll($userProfile, 'favorite'),
            'deal' => Deal::model()->getAll($userProfile, 'favorite'),
        ));
    }

    public function actionTest()
    {
        $this->buildPageOptions();
        $this->render('test');
    }
}