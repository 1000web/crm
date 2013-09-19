<?php

class CustomerController extends Controller
{
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        //$this->_model = Customer::model()->with('contacts')->findByPk($id);
        $this->_model = Customer::model()->findByPk($id);
        if ($this->_model === null) $this->HttpException(404);

        $this->buildPageOptions();
        $userProfile = $this->getUserProfile();
        $this->render('view', array(
            'contact' => CustomerContact::model()->getAll($userProfile, 'customer_id', $id),
            'deal' => Deal::model()->getAll($userProfile, 'customer_id', $id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $this->_model = new Customer;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Customer'])) {
            $this->_model->attributes = $_POST['Customer'];
            if ($this->_model->save()) {
                $log = new CustomerLog;
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

        if (isset($_POST['Customer'])) {
            $this->_model->attributes = $_POST['Customer'];
            if ($this->_model->save()) {
                $log = new CustomerLog;
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
        $log = new CustomerLog;
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
        $this->_pagesize = $userProfile->customer_pagesize;
        $this->buildPageOptions();

        $this->_filter = new Customer('search');
        $this->_filter->unsetAttributes(); // clear any default values
        if (isset($_GET['Customer'])) $this->_filter->attributes = $_GET['Customer'];

        $this->render('index', array(
            'dataProvider' => Customer::model()->getAll($userProfile),
        ));
    }

    public function actionLog($id)
    {
        $userProfile = $this->getUserProfile();
        $this->show_pagesize = true;
        $this->_pagesize = $userProfile->customer_pagesize;
        $this->loadModel($id);
        $this->buildPageOptions();
        $this->render('log', array(
            'dataProvider' => CustomerLog::model()->getAll($userProfile, $id),
        ));
    }

    public function actionColumn()
    {
        $this->buildPageOptions();
        $this->render('../column', array(
            'model' => new Customer,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Customer the loaded model
     * @throws CHttpException
     */
    public function loadModel($id = NULL)
    {
        if(isset($_GET['id']) AND $id === NULL) $id = $_GET['id'];
        if ($this->_model === NULL) {
            $this->_model = Customer::model()->findbyPk($id);
            if ($this->_model === NULL) $this->HttpException(404);
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     * @param Customer $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'customer-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public $favorite_available = true;

    public function checkFavorite($id)
    {
        if (CustomerFav::model()->countByAttributes(array(
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
                    $model = new CustomerFav();
                    $model->setAttributes(array(
                        'id' => $add,
                        'datetime' => time(),
                        'user_id' => Yii::app()->user->id,
                    ));
                    $model->save();
                }
            }
            // удаляем из Избранного
            if ($del) {
                CustomerFav::model()->findByAttributes(array(
                    'id' => $del,
                    'user_id' => Yii::app()->user->id,
                ))->delete();
            }
            if ($url = Yii::app()->request->getUrlReferrer()) $this->redirect($url);
            else $this->redirect($this->id);
        }

        $userProfile = $this->getUserProfile();
        $this->show_pagesize = true;
        $this->_pagesize = $userProfile->customer_pagesize;
        $this->buildPageOptions();
        $criteria = new CDbCriteria;
        $criteria->join = 'LEFT JOIN {{customer_fav}} j ON j.id=t.id';
        $criteria->condition = 'j.user_id=:userid';
        $criteria->params = array(':userid' => Yii::app()->user->id);

        $this->render('index', array(
            //'dataProvider' => Customer::model()->getAll($userProfile, 'favorite'),
            'dataProvider' => Customer::model()->getByCriteria($criteria, $this->_pagesize),
        ));
    }

}
