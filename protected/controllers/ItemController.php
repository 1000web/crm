<?php

class ItemController extends Controller
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
        $model = new Item;
        $model_log = new ItemLog;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Item'])) {
            $model->attributes = $_POST['Item'];
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
        $model_log = new ItemLog;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Item'])) {
            $model->attributes = $_POST['Item'];
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
        $model_log = new ItemLog;
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
        //$criteria->condition='postID=:postID';
        //$criteria->params=array(':postID'=>10);

        $criteria = array(
            'order' => 'controller ASC',
            'condition' => '',
            'params' => array(),
            //'with'=>array('author'),
        );
        $flag = false;
        if ($parent_id = $userProfile->filter_itemparent) {
            if ($flag) $criteria['condition'] .= ' AND ';
            $criteria['condition'] .= 'parent_id=:parent_id';
            $criteria['params'][':parent_id'] = $parent_id;
            $flag = true;
        }
        if ($module = $userProfile->filter_itemmodule) {
            if ($flag) $criteria['condition'] .= ' AND ';
            $criteria['condition'] .= 'parent_id=:module';
            $criteria['params'][':module'] = $module;
            $flag = true;
        }
        if ($controller = $userProfile->filter_itemcontroller) {
            if ($flag) $criteria['condition'] .= ' AND ';
            $criteria['condition'] .= 'controller=:controller';
            $criteria['params'][':controller'] = $controller;
            $flag = true;
        }
        if ($action = $userProfile->filter_itemaction) {
            if ($flag) $criteria['condition'] .= ' AND ';
            $criteria['condition'] .= 'action=:action';
            $criteria['params'][':action'] = $action;
            $flag = true;
        }/**/
        $dataProvider = new CActiveDataProvider('Item', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $userProfile->item_per_page,
            ),
        ));
        $this->buildPageOptions();
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Item('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Item']))
            $model->attributes = $_GET['Item'];

        $this->buildPageOptions($model);
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Item the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Item::model()->findByPk($id);
        //$model = Item::model()->with(array('createUser', 'updateUser'))->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Item $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'item-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
