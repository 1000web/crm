<?php

class CustomerController extends Controller
{
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $contact = new CActiveDataProvider('CustomerContact', array(
            'criteria' => array(
                'condition' => 'customer_id=' . $id,
                //'order' => 'create_time DESC',
                //'with' => array('createUser','updateUser'),
            ),
            /*
        'pagination' => array(
            'pageSize' => Yii::app()->config->get('NEWS.PER_PAGE'),
        ),*/
        ));
        $deal = new CActiveDataProvider('Deal', array(
            'criteria' => array(
                'condition' => 'customer_id=' . $id,
                //'order' => 'create_time DESC',
                //'with' => array('createUser','updateUser'),
            ),
            /*
        'pagination' => array(
            'pageSize' => Yii::app()->config->get('NEWS.PER_PAGE'),
        ),*/
        ));
        $this->buildPageOptions($model);
        $this->render('view', array(
            'model' => $model,
            'contact' => $contact,
            'deal' => $deal,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Customer;
        $model_log = new CustomerLog;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Customer'])) {
            $model->attributes = $_POST['Customer'];
            if ($model->save()) {
                $model_log->save_log_record($model, $this->getAction()->id);
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->buildPageOptions($model);
        $this->render('create', array(
            'model' => $model
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
        $model_log = new CustomerLog;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Customer'])) {
            $model->attributes = $_POST['Customer'];
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
        $model_log = new CustomerLog;
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
        $profile = $this->getUserProfile();
        $criteria = new CDbCriteria();
        $criteria->order = 'value ASC';

        $dataProvider = new CActiveDataProvider('Customer', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $profile->customer_per_page,
            ),
        ));
        $this->buildPageOptions();
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionLog($id)
    {
        $profile = $this->getUserProfile();
        $criteria = new CDbCriteria();
        $criteria->addCondition('id=:id');
        $criteria->params[':id'] = $id;
        $criteria->order = 'log_datetime DESC';
        $dataProvider = new CActiveDataProvider('CustomerLog', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $profile->customer_per_page,
            ),
        ));
        $this->buildPageOptions();
        $this->render('log', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Customer('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Customer']))
            $model->attributes = $_GET['Customer'];

        $this->buildPageOptions($model);
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Customer the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Customer::model()->findByPk($id);
        if ($model === null)
            $this->HttpException(404);
        return $model;
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

    public function checkFavorite($id){
        if(CustomerFav::model()->countByAttributes(array(
            'id' => $id,
            'user_id' => Yii::app()->user->id,
        ))) return true;
        else return false;
    }

    /**
     * Lists favorite models.
     */
    public function actionFavorite($add = NULL, $del = NULL)
    {
        if($add OR $del) {
            // добавляем в Избранное
            if(isset($add)){
                if(!$this->checkFavorite($add)) {
                    $model = new CustomerFav();
                    $model->setAttribute('id', $add);
                    $model->setAttribute('datetime', time());
                    $model->setAttribute('user_id', Yii::app()->user->id);
                    $model->save();
                }
            }
            // удаляем из Избранного
            if($del){
                CustomerFav::model()->findByAttributes(array(
                    'id' => $del,
                    'user_id' => Yii::app()->user->id,
                ))->delete();
            }
            if ($url = Yii::app()->request->getUrlReferrer()) $this->redirect($url);
            else $this->redirect($this->id);
        }
        $this->buildPageOptions();
        $this->render('index', array(
            'dataProvider' => Customer::model()->getFavorite($this->getUserProfile()),
        ));
    }
}
