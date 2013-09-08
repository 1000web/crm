<?php

class SiteController extends Controller
{
    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $this->buildPageOptions();
        $profile = $this->getUserProfile();
        $user = $profile->last_name . ' ' . $profile->first_name . ' ('. Yii::app()->user->username . ')';
        $this->description = 'Вы вошли как <strong>'. $user . '</strong>.';
        $this->render('index', array(
            'menu' => MenuItem::model()->getItems('home_menu'),
        ));
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

}