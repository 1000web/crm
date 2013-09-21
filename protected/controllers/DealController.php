<?php

class DealController extends Controller
{
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->_model = Deal::model()->with('payments')->findByPk($id);
        //$this->_model = Deal::model()->findByPk($id);
        if ($this->_model === null) $this->HttpException(404);

        $this->buildPageOptions();
        $userProfile = $this->getUserProfile();

        $payment = Payment::model()->getAll($userProfile, 'deal_id', $id);

        $total_paid = 0;
        $awaiting = 0;
        foreach($this->_model->payments as $pay) {
            if($pay->payment_type->id == 4) $awaiting += $pay->amount;
            else $total_paid += $pay['amount'];
        }
        $specification = Specification::model()->getAll($userProfile, 'deal_id', $id);

        $this->render('view', array(
            'payment' => $payment,
            'awaiting' => $awaiting,
            'total_paid' => $total_paid,
            'specification' => $specification,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $this->_model = new Deal;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Deal'])) {
            $this->_model->attributes = $_POST['Deal'];
            if ($this->_model->save()) {
                $log = new DealLog;
                $log->save_log_record($this->_model, $this->getAction()->id);
                if (isset($_POST['create_new'])) $this->redirect(array('create'));
                else $this->redirect(array('view', 'id' => $this->_model->id));
            }
        }
        $this->_model->setAttribute('owner_id', Yii::app()->user->id);
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

        if (isset($_POST['Deal'])) {
            $this->_model->attributes = $_POST['Deal'];
            if ($this->_model->save()) {
                $log = new DealLog;
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
        $log = new DealLog;
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
        $this->_pagesize = $userProfile->deal_pagesize;
        $this->buildPageOptions();
        $this->render('index', array(
            'dataProvider' => Deal::model()->getAll($userProfile),
        ));
    }

    public function actionLog($id)
    {
        $userProfile = $this->getUserProfile();
        $this->show_pagesize = true;
        $this->_pagesize = $userProfile->deal_pagesize;
        $this->loadModel($id);
        $this->buildPageOptions();
        $this->render('log', array(
            'dataProvider' => DealLog::model()->getAll($userProfile, $id),
        ));
    }

    public function actionColumn()
    {
        $this->buildPageOptions();
        $this->render('../column', array(
            'model' => new Deal,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Deal the loaded model
     * @throws CHttpException
     */
    public function loadModel($id = NULL)
    {
        if(isset($_GET['id']) AND $id === NULL) $id = $_GET['id'];
        if ($this->_model === NULL) {
            $this->_model = Deal::model()->findbyPk($id);
            if ($this->_model === NULL) $this->HttpException(404);
        }
        return $this->_model;
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

    public $favorite_available = true;

    public function checkFavorite($id)
    {
        if (DealFav::model()->countByAttributes(array(
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
                    $model = new DealFav();
                    $model->setAttribute('id', $add);
                    $model->setAttribute('datetime', time());
                    $model->setAttribute('user_id', Yii::app()->user->id);
                    $model->save();
                }
            }
            // удаляем из Избранного
            if ($del) {
                DealFav::model()->findByAttributes(array(
                    'id' => $del,
                    'user_id' => Yii::app()->user->id,
                ))->delete();
            }
            if ($url = Yii::app()->request->getUrlReferrer()) $this->redirect($url);
            else $this->redirect($this->id);
        }

        $userProfile = $this->getUserProfile();
        $this->show_pagesize = true;
        $this->_pagesize = $userProfile->contact_type_pagesize;
        $this->buildPageOptions();
        $this->render('index', array(
            'dataProvider' => Deal::model()->getAll($userProfile, 'favorite'),
        ));

    }

}
