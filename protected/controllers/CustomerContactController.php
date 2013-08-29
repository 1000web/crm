<?php

class CustomercontactController extends Controller
{
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->buildPageOptions($model);
        $this->render('view', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new CustomerContact;
        $model_log = new CustomerContactLog;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CustomerContact'])) {
            $model->attributes = $_POST['CustomerContact'];
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
        $model_log = new CustomerContactLog;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CustomerContact'])) {
            $model->attributes = $_POST['CustomerContact'];
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
        $model_log = new CustomerContactLog;
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
        $criteria = new CDbCriteria();
        $criteria->order = 'value ASC';

        if($type = $userProfile->filter_contacttype) {
            $criteria->addCondition('contact_type_id=:contact_type_id');
            $criteria->params[':contact_type_id'] = $type;
        }
        $dataProvider = new CActiveDataProvider('CustomerContact', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $userProfile->customercontact_per_page,
            ),
        ));
        $this->buildPageOptions();
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionLog($id)
    {
        $userProfile = $this->getUserProfile();
        $criteria = new CDbCriteria();
        $criteria->addCondition('id=:id');
        $criteria->params[':id'] = $id;
        $criteria->order = 'log_datetime DESC';
        $dataProvider = new CActiveDataProvider('CustomerLog', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $userProfile->customercontact_per_page,
            ),
        ));
        $model = $this->loadModel($id);
        $this->buildPageOptions($model);
        $this->render('log', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new CustomerContact('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['CustomerContact']))
            $model->attributes = $_GET['CustomerContact'];

        $this->buildPageOptions($model);
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return CustomerContact the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = CustomerContact::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CustomerContact $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'customer-contact-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
