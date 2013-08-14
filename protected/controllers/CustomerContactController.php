<?php

class CustomercontactController extends Controller
{
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
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
                $model_log->attributes = $model->attributes;
                $model_log->save();
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

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
                $model_log->attributes = $model->attributes;
                $model_log->save();
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

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
        $model_log->attributes = $model->attributes;
        $model_log->setAttribute('deleted', 1);
        $model_log->save();
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
        $criteria = array(
            'order'=>'value ASC',
            'condition' => '',
            //'with'=>array('author'),
        );
        $flag = false;
        if($type = $userProfile->getAttribute('filter_contacttype')) {
            if($flag) $criteria['condition'] .= ' AND ';
            $criteria['condition'] .= 'contact_type_id=' . $type;
            $flag = true;
        }
        $dataProvider=new CActiveDataProvider('CustomerContact', array(
            'criteria' => $criteria,
            /*
            'pagination'=>array(
                'pageSize'=>20,
            ),/**/
        ));
        $this->render('index', array(
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
