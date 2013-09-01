<?php

class OrganizationController extends Controller
{
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $userProfile = $this->getUserProfile();
        $this->show_pagesize = false;
        $contact = new CActiveDataProvider('OrganizationContact', array(
            'criteria' => array(
                'condition' => 'organization_id=' . $id,
                'order' => 'contact_type_id ASC',
                //'with' => array('category'),
            ),
            'pagination' => array(
                'pageSize' => $userProfile->organizationcontact_pagesize,
            ),
        ));
        $customer = new CActiveDataProvider('Customer', array(
            'criteria' => array(
                'condition' => 'organization_id=' . $id,
                'order' => 'value ASC',
                //'with' => array('category'),
            ),
            'pagination' => array(
                'pageSize' => $userProfile->customer_pagesize,
            ),
        ));
        $deal = new CActiveDataProvider('Deal', array(
            'criteria' => array(
                'condition' => 'organization_id=' . $id,
                'order' => 'inner_number DESC',
                //'with' => array('category'),
            ),
            'pagination' => array(
                'pageSize' => $userProfile->deal_pagesize,
            ),
        ));
        $this->buildPageOptions($model);
        $this->render('view', array(
            'model' => $model,
            'deal' => $deal,
            'contact' => $contact,
            'customer' => $customer,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Organization;
        $model_log = new OrganizationLog;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Organization'])) {
            $model->attributes = $_POST['Organization'];
            if ($model->save()) {
                $model_log->save_log_record($model, $this->getAction()->id);
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->buildPageOptions($model);
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model_log = new OrganizationLog;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Organization'])) {
            $model->attributes = $_POST['Organization'];
            if ($model->save()) {
                $model_log->save_log_record($model, $this->getAction()->id);
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->buildPageOptions($model);
        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $model_log = new OrganizationLog;
        $model = $this->loadModel($id);
        $model_log->save_log_record($model, $this->getAction()->id);
        $model->delete();

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
        $this->_pagesize = $userProfile->organization_pagesize;

        $this->buildPageOptions();
        $this->render('index', array(
            'dataProvider' => Organization::model()->getAll($userProfile),
        ));

    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Organization('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Organization']))
            $model->attributes = $_GET['Organization'];

        $this->buildPageOptions($model);
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Organization the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Organization::model()->findByPk($id);
        if ($model === null)
            $this->HttpException(404);
        return $model;
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
        $this->render('index', array(
            'dataProvider' => Organization::model()->getAll($this->getUserProfile(), 'favorite'),
        ));
    }

}
