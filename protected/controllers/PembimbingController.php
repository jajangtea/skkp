<?php

class PembimbingController extends Controller {

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
                //  'postOnly + delete', // we only allow deletion via POST request
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
                'actions' => array('create', 'update', 'admin', 'delete', 'getValue'),
                'expression' => '$user->getLevel()==1',
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin', 'view'),
                'expression' => '$user->getLevel()==3',
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
    public function actionView($id, $idPengajuan) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $modelUploadProposal = new UploadProposal('search');
        $modelUploadProposal->unsetAttributes();  // clear any default values

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'modelUploadProposal' => $modelUploadProposal,
            'idPengajuan' => $idPengajuan,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {
        $this->layout = 'main';
        $model = new Pembimbing;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Pembimbing'])) {

            $model->attributes = $_POST['Pembimbing'];
            $model->idPengajuan = $id;
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idPembimbing, 'idPengajuan' => $id));
        }

        $this->render('create', array(
            'model' => $model,
            'id' => $id,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $this->layout = 'main';
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Pembimbing'])) {
            $model->attributes = $_POST['Pembimbing'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idPembimbing));
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
        $dataProvider = new CActiveDataProvider('Pembimbing');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $model = new Pembimbing('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Pembimbing']))
            $model->attributes = $_GET['Pembimbing'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Pembimbing the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Pembimbing::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelProposal($id) {
        $model = UploadProposal::model()->find("idPengajuan=$id");
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Pembimbing $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pembimbing-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
