<?php

class TaskstageController extends Controller
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
        $model = new TaskStage;
        $model_log = new TaskStageLog;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TaskStage'])) {
            $model->attributes = $_POST['TaskStage'];
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
        $model_log = new TaskStageLog;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TaskStage'])) {
            $model->attributes = $_POST['TaskStage'];
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
        $model_log = new TaskStageLog;
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
        $this->_pagesize = $userProfile->taskstage_pagesize;
        $this->buildPageOptions();
        $this->render('index', array(
            'dataProvider' => TaskStage::model()->getAll($userProfile),
        ));
    }

    public function actionLog($id)
    {
        $userProfile = $this->getUserProfile();
        $this->show_pagesize = true;
        $this->_pagesize = $userProfile->taskstage_pagesize;
        $this->buildPageOptions($this->loadModel($id));
        $this->render('log', array(
            'dataProvider' => TaskStageLog::model()->getAll($userProfile, $id),
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new TaskStage('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['TaskStage']))
            $model->attributes = $_GET['TaskStage'];

        $this->buildPageOptions($model);
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return TaskStage the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = TaskStage::model()->findByPk($id);
        if ($model === null)
            $this->HttpException(404);
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param TaskStage $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'task-stage-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
