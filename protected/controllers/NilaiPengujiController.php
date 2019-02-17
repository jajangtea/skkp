<?php

class NilaiPengujiController extends Controller {

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
            'postOnly + delete', // we only allow deletion via POST request
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
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'admin'),
                'expression' => '$user->getLevel()==1',
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'admin', 'adminpengujiskripsi', 'vakasi'),
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
    public function actionView($id) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
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
    public function actionCreate($idPengujiSkripsi) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }

        $model = NilaiPenguji::model()->find("idPengujiSkripsi=$idPengujiSkripsi");
        if ($model === null) {
            $model = new NilaiPenguji;
            if (isset($_POST['NilaiPenguji'])) {
                $model->attributes = $_POST['NilaiPenguji'];
                $model->idPengujiSkripsi = $idPengujiSkripsi;
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->idNilaiPenguji));
            }
            $this->render('create', array(
                'model' => $model,
            ));
        }else {
            if (isset($_POST['NilaiPenguji'])) {
                $model->attributes = $_POST['NilaiPenguji'];
                $model->idPengujiSkripsi = $idPengujiSkripsi;
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->idNilaiPenguji));
            }
            $this->render('create', array(
                'model' => $model,
            ));
        }
    }

    public function actionUpdate($id) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }

        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['NilaiPenguji'])) {
            $model->attributes = $_POST['NilaiPenguji'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idNilaiPenguji));
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
        $dataProvider = new CActiveDataProvider('NilaiPenguji');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new NilaiPenguji('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['NilaiPenguji']))
            $model->attributes = $_GET['NilaiPenguji'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return NilaiPenguji the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = NilaiPenguji::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelPenguji($id) {
        $model = NilaiPenguji::model()->find("idPengujiSkripsi=$id");
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param NilaiPenguji $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'nilai-penguji-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
