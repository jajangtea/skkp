<?php

class UploadController extends Controller {

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
                'actions' => array('index', 'view', 'admin', 'delete', 'createProposal'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'delete', 'deleted'),
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
    public function actionCreate($id, $idsyarat) {
        $model = new Upload;
        if (isset($_POST['Upload'])) {
            $transaction = Yii::app()->db->beginTransaction();
            try {
                $model->attributes = $_POST['Upload'];
                $model->idPendaftaran = $id;
                $model->idPersyaratan = $idsyarat;
                if (strlen(trim(CUploadedFile::getInstance($model, 'namaFile'))) > 0) {
                    $sss = CUploadedFile::getInstance($model, 'namaFile');
                    $model->namaFile = $id . '_' . $model->idPendaftaran0->nIM->Nama . '_' . $model->idPersyaratan0->namaPersyaratan . '.' . $sss->extensionName;
                    $model->ukuranFIle = $sss->size . 'kb';
                }
                if ($model->save()) {
                   
                    if (strlen(trim($model->namaFile)) > 0) {
                        $sss->saveAs(Yii::app()->basePath . '/../persyaratan/' . $model->namaFile);
                       
                    }
                    $transaction->commit();
                    $this->redirect(array('view', 'id' => $model->idUpload));
                }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
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
        // $this->performAjaxValidation($model);

        if (isset($_POST['Upload'])) {
            $model->attributes = $_POST['Upload'];
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
    public function actionDelete($id, $idDaftar) {
        $model = $this->loadModel($id);


        // Define image's location

        $imageLocation = Yii::app()->basePath . '/../persyaratan/';

        $patientInfo = Upload::model()->find("idUpload = " . $model->idUpload);
        //echo $imageLocation . $patientInfo->namaFile;
        // exit();
        // if patientPic(image) field in table is not empty
        // delete images  
        if (!empty($patientInfo->namaFile)) {
            unlink($imageLocation . $patientInfo->namaFile);
        }
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('pendaftaran/view', 'id' => $idDaftar));
    }

    public function actionDeleted($id) {
        $this->loadModel($id)->delete();
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('pendaftaran/admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Upload');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Upload('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Upload']))
            $model->attributes = $_GET['Upload'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Upload the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Upload::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelGambar($idPendaftaran, $idPersyaratan) {
        $model = Upload::model()->find("idPendaftaran=$idPendaftaran and idPersyaratan=$idPersyaratan");
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Upload $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'upload-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
