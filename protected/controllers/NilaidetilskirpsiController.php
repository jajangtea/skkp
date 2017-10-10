<?php

class NilaidetilskirpsiController extends Controller {

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
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'admin', 'adminpengujiskripsi'),
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
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
        }
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($idNilaiSkripsi,$NIM) {
         
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        
        $model = $this->loadModel($idNilaiSkripsi);
        $modelNilai = Nilaimasterskripsi::model()->loadModelNilaiMaster($NIM);
        $dataNilaiMaster = $this->loadModelMasterNilai($NIM);
       
        $dataNilai = $this->loadModel($idNilaiSkripsi);
        $this->performAjaxValidation($model);
        if (isset($_POST['Nilaidetilskirpsi'])) {
            $model->attributes = $_POST['Nilaidetilskirpsi'];
            $np1 = $model->NilaiPenguji1;
            $np2 = $model->NIlaiPenguji2;
            $npra = ($np1 + $np2) / 2;
            $model->NPraSidang = $npra;
            $na= Nilaimasterskripsi::model()->hitung_na($dataNilaiMaster->NPembimbing, $dataNilaiMaster->NPraSidang, $dataNilaiMaster->NKompre, $dataNilaiMaster->NSidangSkripsi);
            $nh= Nilaimasterskripsi::model()->nilai_khuruf($na);
            if ($model->save())
                if ($modelNilai == 1) {
                    $nama = $dataNilai->idPendaftaran->idSidang->IDJenisSidang;
                    if ($nama == 1) {
                        $dataNilaiMaster->NA=$na;
                        $dataNilaiMaster->Index=$nh;
                        $dataNilaiMaster->NPraSidang = $npra;
                        $dataNilaiMaster->save();
                    } else {
                        $dataNilaiMaster->NA=$na;
                        $dataNilaiMaster->Index=$nh;
                        $dataNilaiMaster->NSidangSkripsi = $npra;
                        $dataNilaiMaster->save();
                    }
                }
            $this->redirect(array('view', 'id' => $model->idNilaiSkripsi));
        }

        $this->render('update', array(
            'model' => $model,
        ));
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
        $modelNilai = Nilaimasterskripsi::model()->loadModelNilaiMaster($model->idPendaftaran->NIM);
        $dataNilai = $this->loadModelMasterNilai($model->IdPendaftaran);
        $this->performAjaxValidation($model);
        if (isset($_POST['Nilaidetilskirpsi'])) {
            $model->attributes = $_POST['Nilaidetilskirpsi'];
            $na= Nilaimasterskripsi::model()->hitung_na($dataNilai->NPembimbing, $dataNilai->NPraSidang, $dataNilai->NKompre, $dataNilai->NSidangSkripsi);
            $nh= Nilaimasterskripsi::model()->nilai_khuruf($na);
            $np1 = $model->NilaiPenguji1;
            $np2 = $model->NIlaiPenguji2;
            $npra = ($np1 + $np2) / 2;
            $model->NPraSidang = $npra;
            if ($model->save())
                if ($modelNilai == 1) {
                    $nama = $dataNilai->idPendaftaran->idSidang->IDJenisSidang;
                    if ($nama == 1) {
                        $dataNilai->NA=$na;
                        $dataNilai->Index=$nh;
                        $dataNilai->NPraSidang = $npra;
                        $dataNilai->save();
                    } else {
                        $dataNilai->NA=$na;
                        $dataNilai->Index=$nh;
                        $dataNilai->NSidangSkripsi = $npra;
                        $dataNilai->save();
                    }
                }
            $this->redirect(array('view', 'id' => $model->idNilaiSkripsi));
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
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $this->loadModel($id)->delete();


        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $dataProvider = new CActiveDataProvider('Nilaidetilskirpsi');
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
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $model=new Nilaidetilskirpsi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Nilaidetilskirpsi']))
			$model->attributes=$_GET['Nilaidetilskirpsi'];

		$this->render('admin',array(
			'model'=>$model,
		));

    }
    
    public function actionAdminMhsNim($MhsNim) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $model=new Nilaidetilskirpsi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Nilaidetilskirpsi']))
			$model->attributes=$_GET['Nilaidetilskirpsi'];

		$this->render('admin_id',array(
			'model'=>$model,
		));

    }

    public function loadModel($id) {
        $model = Nilaidetilskirpsi::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelMasterNilai($NIM) {
        $model = Nilaimasterskripsi::model()->find("NIM=$NIM");
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Nilaidetilskirpsi $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'nilaidetilskirpsi-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionAdminpengujiskripsi() {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }

        $dataProviderNpSkripsi = Nilaidetilskirpsi::model()->tampilNpSkripsi(Yii::app()->user->getUserid());
        $this->render('adminpengujiskripsi', array(
            'dataProviderNpSkripsi' => $dataProviderNpSkripsi,
            'IDJenisSidang' => 1,
            'KodePenguji' => Yii::app()->user->getUsername(),
        ));
    }

}
