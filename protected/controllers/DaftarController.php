<?php

class DaftarController extends Controller {

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
                'actions' => array('create', 'bukti', 'target', 'pdf', 'createpdf'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'expression' => '$user->getLevel()==2',
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('update'),
                'expression' => '$user->getLengkap()==true',
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'export'),
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
        $dataProviderUpload = Pendaftaran::model()->tampilUpload($id);


        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else {
            $this->layout = 'mainHome';
        }

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'dataProviderUpload' => $dataProviderUpload,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
//    public function actionCreate() {
//        $model = new Pendaftaran;
//
//        // Uncomment the following line if AJAX validation is needed
//        // $this->performAjaxValidation($model);
//
//        if (isset($_POST['Pendaftaran'])) {
//            $model->attributes = $_POST['Pendaftaran'];
//            if ($model->save())
//                $this->redirect(array('view', 'id' => $model->idPendaftaran));
//        }
//
//        $this->render('create', array(
//            'model' => $model,
//        ));
//    }
    public function actionCreate() {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else {
            $this->layout = 'mainHome';
        }
        $model = new Pendaftaran;

        if (isset($_POST['Pendaftaran'])) {
            $model->attributes = $_POST['Pendaftaran'];
            $valid = $model->validate();
            if ($valid) {
                if (Yii::app()->user->getLevel() == 1) {
                    $this->layout = 'main';
                    $model->NIM = $model->NIM;
                    $model->Judul = strtoupper($model->Judul);
                    $model->Tanggal = date('Y-m-d H:i:s');
                } else {
                    $this->layout = 'mainHome';
                    $model->NIM = Yii::app()->user->getUsername();
                    $model->Judul = strtoupper($model->Judul);
                    $model->Tanggal = date('Y-m-d H:i:s');
                }
                $jml = Pendaftaran::model()->cekPendaftaran($model->NIM);
                $jmlKompre = Pendaftaran::model()->cekKompre($model->NIM);
                $jmlBarisNilai = Pendaftaran::model()->cekNilaiMaster($model->NIM);
                $tes = $model->idSidang->IDJenisSidang;
                if ($tes == 4) {//cek kompre
                    if ($jmlKompre > 0) {
                        $session = new CHttpSession;
                        $session->open();
                        $session['cekpendaftaranKompre'] = "Tidak boleh melakukan pendaftaran kompre lebih dari sekali.";
                    } else {
                        $model->Judul = strtoupper($model->Judul);
                        $model->KodePembimbing1 = '--';
                        $model->KodePembimbing2 = '--';
                        if ($model->save()) {
                            $command = Yii::app()->db->createCommand();
                            $command->insert('prd_nilaidetilskirpsi', array(
                                'IdPendaftaran' => $model->idPendaftaran));
                            if ($jmlBarisNilai == 0) {
                                $commandNilaiMaster = Yii::app()->db->createCommand();
                                $commandNilaiMaster->insert('prd_nilaimasterskripsi', array(
                                    'NIM' => $model->NIM));
                            }
                        }
                        $this->redirect(array('view', 'id' => $model->idPendaftaran));
                    }
                } else if ($tes == 1 || $tes == 2) {
                    if ($jml > 0) {
                        $session = new CHttpSession;
                        $session->open();
                        $session['cekpendaftaran'] = "Tidak boleh melakukan pendaftaran sidang lebih dari sekali.";  // set session variable 'name3'
                    } else {
                        $model->Judul = strtoupper($model->Judul);
                        $model->KodePembimbing1 = '--';
                        $model->KodePembimbing2 = '--';
                        if ($model->save()) {
                            if ($tes == 1) {
                                $command = Yii::app()->db->createCommand();
                                $command->insert('prd_nilaidetilskirpsi', array(
                                    'IdPendaftaran' => $model->idPendaftaran));
                                if ($jmlBarisNilai == 0) {
                                    $commandNilaiMaster = Yii::app()->db->createCommand();
                                    $commandNilaiMaster->insert('prd_nilaimasterskripsi', array(
                                        'NIM' => $model->NIM));
                                }
                            } else if ($tes == 2) {
                                $command = Yii::app()->db->createCommand();
                                $command->insert('prd_nilaidetilskirpsi', array(
                                    'IdPendaftaran' => $model->idPendaftaran));
                                if ($jmlBarisNilai == 0) {
                                    $commandNilaiMaster = Yii::app()->db->createCommand();
                                    $commandNilaiMaster->insert('prd_nilaimasterskripsi', array(
                                        'NIM' => $model->NIM));
                                }
                            }
                        }
                        $this->redirect(array('view', 'id' => $model->idPendaftaran));
                    }
                } else if ($tes == 3) {
                    if ($jml > 0) {
                        $session = new CHttpSession;
                        $session->open();
                        $session['cekpendaftaran'] = "Tidak boleh melakukan pendaftaran sidang lebih dari sekali.";  // set session variable 'name3'
                    } else {
                        $model->Judul = strtoupper($model->Judul);
                        $model->KodePembimbing1 = '--';
                        $model->KodePembimbing2 = '--';
                        if ($model->save()) {
                            $command = Yii::app()->db->createCommand();
                            $command->insert('prd_nilaikp', array(
                                'NIM' => $model->NIM));
                        }
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
       
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Pendaftaran'])) {
            $model->attributes = $_POST['Pendaftaran'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idPendaftaran));
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
        $dataProvider = new CActiveDataProvider('Pendaftaran');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Pendaftaran('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Pendaftaran']))
            $model->attributes = $_GET['Pendaftaran'];

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

}
