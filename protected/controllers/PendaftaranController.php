<?php

class PendaftaranController extends Controller {

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
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'expression' => '$user->getLevel()==2',
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete','export'),
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
    public function actionCreate() {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else {
            $this->layout = 'mainHome';
        }
        $model = new Pendaftaran;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Pendaftaran'])) {
            $model->attributes = $_POST['Pendaftaran'];
            $valid = $model->validate();
            if ($valid) {
                $model->NIM = Yii::app()->user->getUsername();
                $model->Tanggal = date('Y-m-d H:i:s');

                $nim = Yii::app()->user->getUsername();
                if ($nim == "") {
                    $nim = 0;
                }

                $jml = Pendaftaran::cekPendaftaran($nim);
                $jmlKompre = Pendaftaran::cekKompre($nim);
                $tes=$model->idSidang->IDJenisSidang;
                //echo $tes;
                //exit();
                if ($tes == 4) {
                    if ($jmlKompre > 0) {
                        $session = new CHttpSession;
                        $session->open();
                        $session['cekpendaftaranKompre'] = "Tidak boleh melakukan pendaftaran kompre lebih dari sekali.";
                    } else {
                        if ($model->save())
                            $this->redirect(array('view', 'id' => $model->idPendaftaran));
                    }
                } else if ($tes != 4) {
                    if ($jml > 0) {
                        $session = new CHttpSession;
                        $session->open();
                        $session['cekpendaftaran'] = "Tidak boleh melakukan pendaftaran sidang lebih dari sekali.";  // set session variable 'name3'
                    } else {
                        if ($model->save())
                            $this->redirect(array('view', 'id' => $model->idPendaftaran));
                    }
                }
            }
        }
        //$this->layout='mainHome';
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
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else {
            $this->layout = 'mainHome';
        }
        $model = $this->loadModel($id);
        $modelMhs = new Mahasiswa;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Pendaftaran'])) {
            $model->attributes = $_POST['Pendaftaran'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idPendaftaran));
        }

        $this->render('update', array(
            'model' => $model,
            'modelMhs' => $modelMhs,
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
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
         if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2){
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3 && Yii::app()->user->getLevel() <= 7){
            $this->layout = 'mainNilai';
        } else{
            $this->layout = 'mainHome';
        }
        $model = new Pendaftaran('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Pendaftaran']))
            $model->attributes = $_GET['Pendaftaran'];
        if (Yii::app()->user->getLevel() == 2) {
            $this->render('admin', array(
                'model' => $model,
            ));
        } else {
            $this->layout = 'main';
            $this->render('admin', array(
                'model' => $model,
            ));
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2){
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3 && Yii::app()->user->getLevel() <= 7){
            $this->layout = 'mainNilai';
        } else{
            $this->layout = 'mainHome';
        }

        $model = new Pendaftaran('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Pendaftaran']))
            $model->attributes = $_GET['Pendaftaran'];
        //$this->layout='mainHome';
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Pendaftaran the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Pendaftaran::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Pendaftaran $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pendaftaran-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionExport() {
        $model = new Pendaftaran();
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Pendaftaran']))
            $model->attributes = $_POST['Pendaftaran'];

        $exportType = 'Excel5';
        $this->widget('ext.heart.export.EHeartExport', array(
            'title' => 'Data Pendaftaran',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'grid_mode' => 'export',
            'exportType' => $exportType,
            'columns' => array(
                'Tanggal',
                'NIM',
                array(
                    'name' => 'NIM',
                    'type' => 'raw',
                    'header' => 'Mahasiswa',
                    'value' => 'CHtml::encode($data->nIM->Nama)',
                    'htmlOptions'=>array('width'=>'40px'),
                ),
                array(
			'name'=>'IdSidang',
			'type'=>'raw',
			'header'=>'Nama Sidang',
			'value'=>'CHtml::encode($data->idSidang->iDJenisSidang->NamaSidang)',
			'htmlOptions'=>array('width'=>''),
		),
                
                'KodePembimbing1',
                'KodePembimbing2',
                array(
                    'name' => 'Judul',
                    'type' => 'raw',
                    'header' => 'Judul',
                    'value' => '$data->Judul',
                    'htmlOptions'=>array('width'=>'260px'),
                ),
            ),
        ));
    }

}
