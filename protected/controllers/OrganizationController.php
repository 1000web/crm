<?php

class OrganizationController extends Controller
{
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $userProfile = $this->getUserProfile();
        $this->loadModel($id);
        $this->buildPageOptions();

        $userProfile->account_pagesize = 100;
        $userProfile->deal_pagesize = 100;
        $userProfile->organizationcontact_pagesize = 100;
        $userProfile->customer_pagesize = 100;

        $this->render('view', array(
            'account' => Account::model()->getAll($userProfile, 'organization_id', $id),
            'contact' => OrganizationContact::model()->getAll($userProfile, 'organization_id', $id),
            'customer' => Customer::model()->getAll($userProfile, 'organization_id', $id),

            'deal_zakaz' => Deal::model()->getAll($userProfile, 'organization_zakaz_id', $id),
            'deal_gruz' => Deal::model()->getAll($userProfile, 'organization_gruz_id', $id),
            'deal_pay' => Deal::model()->getAll($userProfile, 'organization_pay_id', $id),
            'deal_end' => Deal::model()->getAll($userProfile, 'organization_end_id', $id),
            'deal_post' => Deal::model()->getAll($userProfile, 'organization_post_id', $id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $this->_model = new Organization;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Organization'])) {
            $this->_model->attributes = $_POST['Organization'];
            if ($this->_model->save()) {
                $log = new OrganizationLog;
                $log->save_log_record($this->_model, $this->getAction()->id);
                if (isset($_POST['create_new'])) $this->redirect(array('create'));
                else $this->redirect(array('view', 'id' => $this->_model->id));
            }
        }
        $this->buildPageOptions();
        $this->render('_form');
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Organization'])) {
            $this->_model->attributes = $_POST['Organization'];
            if ($this->_model->save()) {
                $log = new OrganizationLog;
                $log->save_log_record($this->_model, $this->getAction()->id);
                if (isset($_POST['create_new'])) $this->redirect(array('create'));
                else $this->redirect(array('view', 'id' => $this->_model->id));
            }
        }
        $this->buildPageOptions();
        $this->render('_form');
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $log = new OrganizationLog;
        $this->loadModel($id);
        $log->save_log_record($this->_model, $this->getAction()->id);
        $this->_model->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $userProfile = $this->getUserProfile();
        $this->show_pagesize = true;
        $this->_pagesize = $userProfile->organization_pagesize;
        $this->buildPageOptions();
        $this->render('index', array(
            'dataProvider' => Organization::model()->getAll($userProfile),
        ));

    }

    public function actionLog($id)
    {
        $userProfile = $this->getUserProfile();
        $this->show_pagesize = true;
        $this->_pagesize = $userProfile->organization_pagesize;
        $this->loadModel($id);
        $this->buildPageOptions();
        $this->render('log', array(
            'dataProvider' => OrganizationLog::model()->getLog($id, $this->_pagesize),
        ));

    }

    public function actionColumn()
    {
        $this->buildPageOptions();
        $this->render('../column', array(
            'model' => new Organization,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Organization the loaded model
     * @throws CHttpException
     */
    public function loadModel($id = NULL)
    {
        if(isset($_GET['id']) AND $id === NULL) $id = $_GET['id'];
        if ($this->_model === NULL) {
            $this->_model = Organization::model()->findbyPk($id);
            if ($this->_model === NULL) $this->HttpException(404);
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     * @param Organization $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'organization-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public $favorite_available = true;

    public function checkFavorite($id)
    {
        if (OrganizationFav::model()->countByAttributes(array(
            'id' => $id,
            'user_id' => Yii::app()->user->id,
        ))
        ) return true;
        else return false;
    }

    /**
     * Lists favorite models.
     */
    public function actionFavorite($add = NULL, $del = NULL)
    {
        if ($add OR $del) {
            // добавляем в Избранное
            if (isset($add)) {
                if (!$this->checkFavorite($add)) {
                    $model = new OrganizationFav;
                    $model->setAttribute('id', $add);
                    //$model->setAttribute('datetime', time());
                    $model->setAttribute('user_id', Yii::app()->user->id);
                    $model->save();
                }
            }
            // удаляем из Избранного
            if ($del) {
                OrganizationFav::model()->findByAttributes(array(
                    'id' => $del,
                    'user_id' => Yii::app()->user->id,
                ))->delete();
            }
            if ($url = Yii::app()->request->getUrlReferrer()) $this->redirect($url);
            else $this->redirect($this->id);
        }
        $this->buildPageOptions();
        $this->show_pagesize = true;
        $this->render('index', array(
            'dataProvider' => Organization::model()->getAll($this->getUserProfile(), 'favorite'),
        ));
    }

}
