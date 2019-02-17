<?php

class PengujiskripsiController extends Controller {

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
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'admin'),
                'expression' => '$user->getLevel()==1',
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'admin', 'adminpengujiskripsi', 'vakasi', 'createnilai'),
                'expression' => '$user->getLevel()==3',
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'admin', 'adminpengujiskripsi', 'vakasi', 'createnilai'),
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
    public function actionCreate($id, $idPengajuan) {
        $this->layout = 'main';
        $model = new Pengujiskripsi;
        if (isset($_POST['Pengujiskripsi'])) {
            $model->attributes = $_POST['Pengujiskripsi'];
            for ($i = 0; $i < count($model->idUser); $i++) {
                $model2 = new Pengujiskripsi;
                $model2->idPendaftaran = $id;
                $model2->idUser = $model->idUser[$i];
                $model2->idPengajuan = $idPengajuan;
                $model2->save();

                $model3 = new NilaiPenguji();
                $model3->idPengujiSkripsi = $model2->idPengujiSkripsi;
                $model3->save();
            }
            $model->unsetAttributes();  // clear any default values
            $this->redirect(Yii::app()->request->getUrlReferrer());
        }
        $this->render('create', array(
            'model' => $model,
            'id' => $id,
        ));
    }

    public function actionCreatenilai($idPengujiSkripsi, $idPengajuan, $nim) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }

        $model = $this->loadModel($idPengujiSkripsi);
        $this->performAjaxValidation($model);
        if (isset($_POST['Pengujiskripsi'])) {
            $model->attributes = $_POST['Pengujiskripsi'];
            if ($model->save())
                $nrataSkripsi = $this->hitungrataSkripsi($idPengajuan, $nim) == '' ? 0 : $this->hitungrataSkripsi($idPengajuan, $nim);
            $nrataPra = $this->hitungrataPra($idPengajuan, $nim) == '' ? 0 : $this->hitungrataPra($idPengajuan, $nim);
            $updatensidang = "update prd_nilaimasterskripsi set NSidangSkripsi=$nrataSkripsi,NPraSidang=$nrataPra where idPengajuan=$idPengajuan and nim=$nim";
            Yii::app()->db->createCommand($updatensidang)->execute();
            //========================================
            $modelMasterNilai = $this->loadModelNIM($nim);
            $this->performAjaxValidation($modelMasterNilai);
            $na = Nilaimasterskripsi::model()->hitung_na($modelMasterNilai->NPembimbing, $modelMasterNilai->NPraSidang, $modelMasterNilai->NKompre, $modelMasterNilai->NSidangSkripsi);
            $nh = Nilaimasterskripsi::model()->nilai_khuruf($na);
            $modelMasterNilai->NA = $na;
            $modelMasterNilai->Index = $nh;
            if ($modelMasterNilai->save()) {
                if ($modelMasterNilai->NPembimbing > 0) {
                    $command = Yii::app()->db->createCommand();

                    $command->update('prd_pembimbing', array(
                        'status' => 'Tuntas',
                            ), 'idPengajuan=:idPengajuan', array(':idPengajuan' => $idPengajuan));
                }

                Nilaimasterskripsi::model()->tuntasorno($modelMasterNilai->NIM);
            }

            //========================================


            $this->redirect(array('view', 'id' => $model->idPengujiSkripsi));
        }

        $this->render('createnilai', array(
            'model' => $model,
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

        if (isset($_POST['Pengujiskripsi'])) {

            $model->attributes = $_POST['Pengujiskripsi'];

            $command = Yii::app()->db->createCommand();
            $command->update('prd_pengujiskripsi', array(
                'idPengajuan' => $model->idPengajuan,
                    ), 'idPengujiSkripsi=:idPengujiSkripsi', array(':idPengujiSkripsi' => $id));
            $model->save();
            $model->unsetAttributes();  // clear any default values
            $this->redirect(Yii::app()->request->getUrlReferrer());
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
        $dataProvider = new CActiveDataProvider('Pengujiskripsi');
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
            $model = new Pengujiskripsi('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Pengujiskripsi']))
                $model->attributes = $_GET['Pengujiskripsi'];

            $this->render('admin', array(
                'model' => $model,
            ));
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
            $model = new Pengujiskripsi('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Pengujiskripsi']))
                $model->attributes = $_GET['Pengujiskripsi'];

            $this->render('admin_penguji', array(
                'model' => $model,
            ));
        } else {
            $this->layout = 'mainHome';
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Pengujiskripsi the loaded model
     * @throws CHttpException
     */
    public function hitungrataPra($idPengajuan, $nim) {
        $sqlpra = "select avg(nilai) as total from prd_pengujiskripsi ps inner join prd_pendaftaran pp on ps.idPendaftaran=pp.idPendaftaran inner join prd_sidangmaster pm on pp.IdSidang=pm.IdSidang inner join prd_jenissidang pjs on pm.IDJenisSidang=pjs.IDJenisSidang where ps.idPengajuan=$idPengajuan and pjs.IDJenisSidang=1 and pp.nim=$nim";
        $var_sum = Yii::app()->db->createCommand($sqlpra)->queryScalar(); //pra sidang
        return $var_sum;
    }

    public function hitungrataSkripsi($idPengajuan, $nim) {
        $sqlSkripsi = "select avg(nilai) as total from prd_pengujiskripsi ps inner join prd_pendaftaran pp on ps.idPendaftaran=pp.idPendaftaran inner join prd_sidangmaster pm on pp.IdSidang=pm.IdSidang inner join prd_jenissidang pjs on pm.IDJenisSidang=pjs.IDJenisSidang where ps.idPengajuan=$idPengajuan and pjs.IDJenisSidang=2 and pp.nim=$nim";
        $var_sum = Yii::app()->db->createCommand($sqlSkripsi)->queryScalar(); //Skripsi sidang

        return $var_sum;
    }

    public function loadModel($id) {
        $model = Pengujiskripsi::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelNIM($nim) {
        $model = Nilaimasterskripsi::model()->find('NIM=:NIM', array(':NIM' => $nim));
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelNilaiPenguji($id) {
        $model = NilaiPenguji::model()->find("idPengujiSkripsi=$id");
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Pengujiskripsi $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pengujiskripsi-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
