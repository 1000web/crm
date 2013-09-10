<?php

class OrganizationgroupController extends Controller
{
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new OrganizationGroup;
        $model_log = new OrganizationGroupLog;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['OrganizationGroup'])) {
            $model->attributes = $_POST['OrganizationGroup'];
            if ($model->save()) {
                $model_log->save_log_record($model, $this->getAction()->id);
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->_model = $model;
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
        $model = $this->loadModel($id);
        $model_log = new OrganizationGroupLog;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['OrganizationGroup'])) {
            $model->attributes = $_POST['OrganizationGroup'];
            if ($model->save()) {
                $model_log->save_log_record($model, $this->getAction()->id);
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->_model = $model;
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
        $model_log = new OrganizationGroupLog;
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
        $this->show_pagesize = true;
        $this->_pagesize = $userProfile->organizationgroup_pagesize;
        $this->buildPageOptions();
        $this->render('index', array(
            'dataProvider' => OrganizationGroup::model()->getAll($userProfile),
        ));
    }

    public function actionLog($id)
    {
        $userProfile = $this->getUserProfile();
        $this->show_pagesize = true;
        $this->_pagesize = $userProfile->organizationgroup_pagesize;
        $this->_model = $this->loadModel($id);
        $this->buildPageOptions();
        $this->render('log', array(
            'dataProvider' => OrganizationGroupLog::model()->getAll($userProfile, $id),
        ));
    }

    public function actionColumn()
    {
        $this->buildPageOptions();
        $this->render('../column', array(
            'model' => new OrganizationGroup,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new OrganizationGroup('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['OrganizationGroup']))
            $model->attributes = $_GET['OrganizationGroup'];

        $this->_model = $model;
        $this->buildPageOptions();
        $this->render('../admin');
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return OrganizationGroup the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = OrganizationGroup::model()->findByPk($id);
        if ($model === null)
            $this->HttpException(404);
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param OrganizationGroup $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'organization-group-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
