<?php

class PengajuanController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $idp;

    /**
     * @return array action filters
     */
    public function actions() {
        return array(
            'suggestPengajuan' => array(
                'class' => 'ext.actions.XSuggestAction',
                'modelName' => 'Pengajuan',
                'methodName' => 'suggest',
            ),
        );
    }

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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('bukti', 'target', 'pdf', 'createpdf', 'index', 'view', 'export'),
                'expression' => '$user->getLevel()==1',
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'index', 'view', 'viewlengkap'),
                'expression' => '$user->getLevel()==2',
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('create', 'update', 'admin', 'viewlengkap', 'delete', 'suggestPengajuan', 'verifikasi', 'laporanMahasiswa'),
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
    public function actionView($IDPengajuan, $IDJenisSidang) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else {
            $this->layout = 'mainHome';
        }

        $dataProviderUpload = Pendaftaran::model()->tampilUploadPengajuan($IDPengajuan, $IDJenisSidang);
        $this->render('view', array(
            'dataProviderUpload' => $dataProviderUpload,
            'IDPengajuan' => $IDPengajuan,
            'IDJenisSidang' => $IDJenisSidang,
        ));
    }

    public function actionViewlengkap($NIM) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else {
            $this->layout = 'mainHome';
        }

        $dataProviderUpload = Pendaftaran::model()->tampilStatusPengajuan($NIM);
        $this->render('viewlengkap', array(
            'dataProviderUpload' => $dataProviderUpload,
            'NIM' => $NIM,
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
        $model = new Pengajuan('create');
        $model->NIM = Yii::app()->user->name;
        $model->TanggalDaftar = date('Y-m-d H:i:s');
        $model->IDstatusProposal = 2;
        $model->Judul = strtoupper($model->Judul);

        if (isset($_POST['Pengajuan'])) {
            $idperiode = Yii::app()->db->createCommand('SELECT * FROM prd_sidangmaster where status=1')->queryAll();
            // print_r($idperiode);
            // exit();

            foreach ($idperiode as $row) {
                $idp = $row['idPeriode']; //instead of $row['column1']
            }
            $model->attributes = $_POST['Pengajuan'];
            $model->idPeriode = $idp;
            if ($model->save())
                $this->redirect(array('view', 'IDPengajuan' => $model->IDPengajuan, 'IDJenisSidang' => $model->IDJenisSidang));
        }
        $IDPengajuan = 0;
        $IDJenisSidang = 0;
        $this->render('create', array(
            'model' => $model,
            'IDPengajuan' => $IDPengajuan,
            'IDJenisSidang' => $IDJenisSidang,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($IDPengajuan, $IDJenisSidang) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else {
            $this->layout = 'mainHome';
        }

        $model = $this->loadModel($IDPengajuan);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Pengajuan'])) {
            $model->attributes = $_POST['Pengajuan'];
            $model->Judul = strtoupper($model->Judul);
            if ($model->save())
                $this->redirect(array('viewlengkap', 'NIM' => $model->NIM));
        }


        $this->render('update', array(
            'model' => $model,
            'IDPengajuan' => $IDPengajuan,
            'IDJenisSidang' => $IDJenisSidang,
        ));
    }

    public function actionVerifikasi($id) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else {
            $this->layout = 'mainHome';
        }

        $model = $this->loadModel($id);

        if (isset($_POST['Pengajuan'])) {
            $model->attributes = $_POST['Pengajuan'];
            $model->IDstatusProposal = $model->IDstatusProposal;
            $model->keterangan = strtoupper($model->keterangan);
            if ($model->save())
                $this->redirect(array('admin'));
        }

        $this->render('updatever', array(
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

        //if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
//        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('viewlengkap', 'IDPengajuan' => $model->NIM));
//        $this->redirect(array('viewlengkap', 'IDPengajuan' => $model->NIM));
            $this->redirect(Yii::app()->request->getUrlReferrer());
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else {
            $this->layout = 'mainHome';
        }

        $dataProvider = new CActiveDataProvider('Pengajuan');
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
        } else {
            $this->layout = 'mainHome';
        }

        $model = new Pengajuan('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Pengajuan']))
            $model->attributes = $_GET['Pengajuan'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Pengajuan the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Pengajuan::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Pengajuan $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pengajuan-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionLaporanMahasiswa() {
        $model = new Pengajuan();
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Pengajuan']))
            $model->attributes = $_POST['Pengajuan'];

        $exportType = 'Excel5';
        $this->widget('ext.heart.export.EHeartExport', array(
            'title' => 'Laporan Pengajuan',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'grid_mode' => 'export',
            'exportType' => $exportType,
            'columns' => array(
                'iDJenisSidang.NamaSidang',
                'nIM.Nama',
                'NIM',
                'TanggalDaftar',
                'Judul',
                array(
                    'name' => 'Judul',
                    'type' => 'raw',
                    'header' => 'Judul',
                    'value' => 'strtoupper($data->Judul)',
                    // 'value' => '$data->idstatusProposal0->statusProposal',
                    'htmlOptions' => array('width' => '200px'),
                ),
                array(
                    'name' => 'idstatusProposal',
                    'type' => 'raw',
                    'header' => 'Status',
                    'value' => '$data->idstatusProposal==1?strtoupper("Diterima"):strtoupper("Ditolak")',
                    // 'value' => '$data->idstatusProposal0->statusProposal',
                    'htmlOptions' => array('width' => '40px'),
                ),
                'keterangan',
            ),
        ));
    }

    public function actionExport($bulan, $tahun) {
        $model = new Pengajuan();
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Pengajuan']))
            $model->attributes = $_POST['Pengajuan'];

        $exportType = 'Excel5';
        $this->widget('ext.heart.export.EHeartExport', array(
            'title' => 'Data Pengajuan',
            'dataProvider' => $model->searcproposal($bulan, $tahun),
            'filter' => $model,
            'grid_mode' => 'export',
            'exportType' => $exportType,
            'columns' => array(
                'TanggalDaftar',
                'NIM',
                array(
                    'name' => 'NIM',
                    'type' => 'raw',
                    'header' => 'Mahasiswa',
                    'value' => 'CHtml::encode($data->nIM->Nama)',
                    'htmlOptions' => array('width' => '40px'),
                ),
                array(
                    'name' => 'IdPengajuan',
                    'type' => 'raw',
                    'header' => 'Nama Sidang',
                    'value' => 'CHtml::encode($data->iDJenisSidang->NamaSidang)',
                    'htmlOptions' => array('width' => ''),
                ),
                array(
                    'name' => 'Judul',
                    'type' => 'raw',
                    'header' => 'Judul',
                    'value' => '$data->Judul',
                    'htmlOptions' => array('width' => '260px'),
                ),
                array(
                    'name' => 'keterangan',
                    'type' => 'raw',
                    'header' => 'Keterangan',
                    'value' => '$data->keterangan',
                    'htmlOptions' => array('width' => '260px'),
                ),
            ),
        ));
    }

}
