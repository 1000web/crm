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
        if (Yii::app()->user->id) {
            $profile = $this->getUserProfile();
            $user = $profile->last_name . ' ' . $profile->first_name . ' (' . Yii::app()->user->username . ')';
            $this->description = 'Вы вошли как <strong>' . $user . '</strong>.';
        }
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

        $criteria_customer = new CDbCriteria;
        $criteria_customer->join = 'LEFT JOIN {{customer_fav}} j ON j.id=t.id';
        $criteria_customer->condition = 'j.user_id=:userid';
        $criteria_customer->params = array(':userid' => Yii::app()->user->id);

        $this->render('favorite', array(
            'customer' => Customer::model()->getByCriteria($criteria_customer, $userProfile->customer_pagesize),
            'organization' => Organization::model()->getAll($userProfile, 'favorite'),
            'task' => Task::model()->getAll($userProfile, 'favorite'),
            'deal' => Deal::model()->getAll($userProfile, 'favorite'),
        ));
    }

    public function actionTest()
    {
        $value = 'date("Y-m-d H:i:s",time())';
        echo $value . '<br>';
        eval('echo ' . $value . ';');
    }
}