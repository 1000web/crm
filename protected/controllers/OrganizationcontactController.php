<?php


class OrganizationcontactController extends Controller
{
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $this->_model = new OrganizationContact;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['OrganizationContact'])) {
            $this->_model->attributes = $_POST['OrganizationContact'];
            if ($this->_model->save()) {
                $log = new OrganizationContactLog;
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

        if (isset($_POST['OrganizationContact'])) {
            $this->_model->attributes = $_POST['OrganizationContact'];
            if ($this->_model->save()) {
                $log = new OrganizationContactLog;
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
        $log = new OrganizationContactLog;
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
        $this->_pagesize = $userProfile->organizationcontact_pagesize;
        $this->buildPageOptions();
        $this->render('index', array(
            'dataProvider' => OrganizationContact::model()->getAll($userProfile),
        ));
    }

    public function actionLog($id)
    {
        $userProfile = $this->getUserProfile();
        $this->show_pagesize = true;
        $this->_pagesize = $userProfile->organizationcontact_pagesize;
        $this->loadModel($id);
        $this->buildPageOptions();
        $this->render('log', array(
            'dataProvider' => OrganizationContactLog::model()->getAll($userProfile, $id),
        ));
    }

    public function actionColumn()
    {
        $this->buildPageOptions();
        $this->render('../column', array(
            'model' => new Organizationcontact,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return OrganizationContact the loaded model
     * @throws CHttpException
     */
    public function loadModel($id = NULL)
    {
        if(isset($_GET['id']) AND $id === NULL) $id = $_GET['id'];
        if ($this->_model === NULL) {
            $this->_model = OrganizationContact::model()->findbyPk($id);
            if ($this->_model === NULL) $this->HttpException(404);
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     * @param OrganizationContact $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'organization-contact-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
