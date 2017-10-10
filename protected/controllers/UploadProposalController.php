<?php

class UploadProposalController extends Controller {

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
                'actions' => array('index', 'view', 'delete', 'admin'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($IDPengajuan, $idsyarat) {
        $model = new UploadProposal;

        if (isset($_POST['UploadProposal'])) {
            $transaction = Yii::app()->db->beginTransaction();
            try {
                $messageType = 'warning';
                $message = "There are some errors ";
                $model->attributes = $_POST['UploadProposal'];
                $model->idPengajuan = $IDPengajuan;
                $model->idPersyaratan = $idsyarat;
                $uploadFile = CUploadedFile::getInstance($model, 'namaFile');
//                if (strlen(trim(CUploadedFile::getInstance($model, 'namaFile'))) > 0) {
//                    $sss = CUploadedFile::getInstance($model, 'namaFile');
//
//                    $model->namaFile = $IDPengajuan . '_' . $model->idPengajuan0->nIM->Nama . '_' . $model->idPersyaratan0->namaPersyaratan . '.' . $sss->extensionName;
//                    $model->ukuranFIle = $sss->size . 'kb';
//                    // $model->recipe_file_url->getExtensionName()
//                }

                if ($model->save()) {
                    $messageType = 'success';
                    $message = "<strong>Well done!</strong> You successfully create data ";
                    $model2 = Pendaftaran::model()->findByPk($model->idPendaftaran);
                    if (!empty($uploadFile)) {
                        $extUploadFile = substr($uploadFile, strrpos($uploadFile, '.') + 1);
                        if (!empty($uploadFile)) {
                            if ($uploadFile->saveAs(Yii::app()->basePath . DIRECTORY_SEPARATOR . 'persyaratan' . DIRECTORY_SEPARATOR  . $model2->idPengajuan0->nIM->Nama . DIRECTORY_SEPARATOR . $model2->idPersyaratan0->namaPersyaratan . '.' . $extUploadFile)) {
                                $model2->filename = $model2->idPendaftaran . '.' . $extUploadFile;
                                $model2->save();
                                $message .= 'and file uploded';
                            } else {
                                $messageType = 'warning';
                                $message .= 'but file not uploded';
                            }
                        }
                    }
                    $transaction->commit();
                    Yii::app()->user->setFlash($messageType, $message);
                    $this->redirect(array('view', 'id' => $model->idUpload));
                }
                $this->render('create', array(
                    'model' => $model,
                ));
            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::app()->user->setFlash('error', "{$e->getMessage()}");
                //$this->refresh();
            }
        }

//          
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

        if (isset($_POST['UploadProposal'])) {
            $model->attributes = $_POST['UploadProposal'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idUpload));
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
    public function actionDelete($id, $IDJenisSidang, $idDaftar) {

        $model = $this->loadModel($id);


        // Define image's location

        $imageLocation = Yii::app()->basePath . '/../persyaratan/';

        $patientInfo = UploadProposal::model()->find("idUpload = " . $id);
        if (!$patientInfo == '') {
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('pengajuan/view', 'IDPengajuan' => $idDaftar, 'IDJenisSidang' => $IDJenisSidang));
        }
        else {
            if (!empty($patientInfo->namaFile)) {
                unlink($imageLocation . $patientInfo->namaFile);
            }
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('pengajuan/view', 'IDPengajuan' => $idDaftar, 'IDJenisSidang' => $IDJenisSidang));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('UploadProposal');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new UploadProposal('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['UploadProposal']))
            $model->attributes = $_GET['UploadProposal'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return UploadProposal the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = UploadProposal::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param UploadProposal $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'upload-proposal-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
