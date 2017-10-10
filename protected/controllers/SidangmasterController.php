<?php

class SidangmasterController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
                // 'postOnly + delete', // we only allow deletion via POST request
            //'postOnly + getValue', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'expression' => '$user->getLevel()==1',
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update','admin', 'delete', 'getValue'),
                'expression' => '$user->getLevel()==1',
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else {
            $this->layout = 'mainHome';
        }
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($idPeriode) {
        $model = new Sidangmaster;

        $this->performAjaxValidation($model);
        $this->layout = 'main';
        if (isset($_POST['Sidangmaster'])) {
            $model->attributes = $_POST['Sidangmaster'];
            $model->idPeriode=$idPeriode;
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->IdSidang));
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
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        $this->layout = 'main';
        if (isset($_POST['Sidangmaster'])) {
            $model->attributes = $_POST['Sidangmaster'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->IdSidang));
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
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->layout = 'main';
        $dataProvider = new CActiveDataProvider('Sidangmaster');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $this->layout = 'main';
        $model = new Sidangmaster('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Sidangmaster']))
            $model->attributes = $_GET['Sidangmaster'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Sidangmaster the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Sidangmaster::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Sidangmaster $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'sidangmaster-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionGetValue() {
        if(Yii::app()->request->isAjaxRequest){
        if (isset($_POST['value']))
            foreach ($_POST['value'] as $id) {
                $some = Sidangmaster::model()->findByPk($id);
                if($some->status==1)
                {
                    $some->status=0;
                }
                else
                {
                    $some->status=1;
                }
                $some->save();
        }}
    }

    public function actionApprove() {

        if (isset($_POST['ApproveButton'])) {
            if (isset($_POST['selectedIds'])) {
                foreach ($_POST['selectedIds'] as $id) {
                    $comment = $this->loadModel($id);
                    $comment->is_published = 1;
                    $comment->update(array('is_published'));
                }
            }
        }

        // similar code for delete button goes here

        $criteria = new CDbCriteria();
        $criteria->condition = 'is_published = 0';
        $criteria->order = 'created DESC';

        $dataProvider = new CActiveDataProvider('Comment');
        $dataProvider->criteria = $criteria;

        $this->render('approve', array(
            'dataProvider' => $dataProvider,
        ));
    }

}

?>
