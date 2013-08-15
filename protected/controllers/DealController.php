<?php

class DealController extends Controller
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
        $model = new Deal;
        $model_log = new DealLog;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Deal'])) {
            $model->attributes = $_POST['Deal'];
            if ($model->save()) {
                $model_log->attributes = $model->attributes;
                $model_log->setAttribute('log_action', $this->getAction()->id);
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
        $model_log = new DealLog;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Deal'])) {
            $model->attributes = $_POST['Deal'];
            if ($model->save()) {
                $model_log->attributes = $model->attributes;
                $model_log->setAttribute('log_action', $this->getAction()->id);
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
        $model_log = new DealLog;
        $model = $this->loadModel($id);
        $model_log->attributes = $model->attributes;
        $model_log->setAttribute('log_action', $this->getAction()->id);
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
            'order' => 'value ASC',
            'condition' => '',
            //'with'=>array('author'),
        );
        $flag = false;
        if ($stage = $userProfile->getAttribute('filter_dealstage')) {
            if ($flag) $criteria['condition'] .= ' AND ';
            $criteria['condition'] .= 'deal_stage_id=' . $stage;
            $flag = true;
        }
        if ($source = $userProfile->getAttribute('filter_dealsource')) {
            if ($flag) $criteria['condition'] .= ' AND ';
            $criteria['condition'] .= 'deal_source_id=' . $source;
            $flag = true;
        }
        $dataProvider = new CActiveDataProvider('Deal', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 5,
            ),
        ));

        $criteria = new CDbCriteria();
        $count = Deal::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = 5;
        $pages->applyLimit($criteria);

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'pages' => $pages,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Deal('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Deal']))
            $model->attributes = $_GET['Deal'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Deal the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Deal::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Deal $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'deal-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
