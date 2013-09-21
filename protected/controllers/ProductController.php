<?php

class ProductController extends Controller
{
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $this->_model = new Product;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Product'])) {
            $this->_model->attributes = $_POST['Product'];
            if ($this->_model->save()) {
                $log = new ProductLog;
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

        if (isset($_POST['Product'])) {
            $this->_model->attributes = $_POST['Product'];
            if ($this->_model->save()) {
                $log = new ProductLog;
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
        $log = new ProductLog;
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
        $this->_pagesize = $userProfile->product_pagesize;
        $this->buildPageOptions();
        $this->render('index', array(
            'dataProvider' => Product::model()->getAll($userProfile),
        ));
    }

    public function actionLog($id)
    {
        $userProfile = $this->getUserProfile();
        $this->show_pagesize = true;
        $this->_pagesize = $userProfile->product_pagesize;
        $this->loadModel($id);
        $this->buildPageOptions();
        $this->render('log', array(
            'dataProvider' => ProductLog::model()->getAll($userProfile, $id),
        ));
    }

    public function actionColumn()
    {
        $this->buildPageOptions();
        $this->render('../column', array(
            'model' => new Product,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Product the loaded model
     * @throws CHttpException
     */
    public function loadModel($id = NULL)
    {
        if (isset($_GET['id']) AND $id === NULL) $id = $_GET['id'];
        if ($this->_model === NULL) {
            $this->_model = Product::model()->findbyPk($id);
            if ($this->_model === NULL) $this->HttpException(404);
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     * @param Product $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'my-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
