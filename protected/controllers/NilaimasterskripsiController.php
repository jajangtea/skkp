<?php

class NilaimasterskripsiController extends Controller {

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
                //'postOnly + delete', // we only allow deletion via POST request
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
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'admin','adminMhsNim'),
                'expression' => '$user->getLevel()==1',
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index'),
                'expression' => '$user->getLevel()==2',
            ),
            
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'admin', 'adminpembimbingskripsi'),
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
    public function actionCreate() {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $model = new Nilaimasterskripsi;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Nilaimasterskripsi'])) {
            $model->attributes = $_POST['Nilaimasterskripsi'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->IdNMSkripsi));
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
        
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
        } 
       
        $model = $this->loadModel($id);
       
        $this->performAjaxValidation($model);
        if (isset($_POST['Nilaimasterskripsi'])) {
            $model->attributes = $_POST['Nilaimasterskripsi'];
            $na= Nilaimasterskripsi::model()->hitung_na($model->NPembimbing, $model->NPraSidang, $model->NKompre, $model->NSidangSkripsi);
            $nh= Nilaimasterskripsi::model()->nilai_khuruf($na);
            $model->NA=$na;
            $model->Index=$nh;
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->IdNMSkripsi));
        }
        $this->render('update', array(
            'model' => $model,
        ));
    }
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
        $a = Nilaimasterskripsi::model()->ambilNilaiMasterId($id);
        $b = $a["IdPendaftaran"];
        $sql = "DELETE FROM prd_nilaidetilskirpsi where IdPendaftaran=$b";
        $data = Yii::app()->db->createCommand($sql)->execute();
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
        } else if (Yii::app()->user->getLevel() == 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $criteria = new CDbCriteria();
        $criteria->join = "JOIN prd_pendaftaran p on p.NIM=t.NIM where p.nim='" . Yii::app()->user->name . "'";
        $dataProvider = new CActiveDataProvider('Nilaimasterskripsi', array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 10),
        ));
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
        $model = new Nilaimasterskripsi('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Nilaimasterskripsi']))
            $model->attributes = $_GET['Nilaimasterskripsi'];

        $this->render('admin', array(
            'model' => $model,
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
        $model = new Nilaimasterskripsi('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Nilaimasterskripsi']))
            $model->attributes = $_GET['Nilaimasterskripsi'];

        $this->render('admin_id', array(
            'model' => $model,
            'MhsNim'=>$MhsNim,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Nilaimasterskripsi the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Nilaimasterskripsi::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelPendaftaran($id) {
       
        $model = Nilaimasterskripsi::model()->find("IdPendaftaran=$id");
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /*     * loadModelPendaftaran
     * Performs the AJAX validation.
     * @param Nilaimasterskripsi $model the model to be validated
     */

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'nilaimasterskripsi-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function loadModelMaster($idPendaftaran) {
        $model = Nilaidetilskirpsi::model()->findAll("IdPendaftran=$idPendaftaran");
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionAdminpembimbingSkripsi() {

        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }

        $dataProviderNilaiPembimbingSkripsi = Nilaikp::model()->tampilNilaiPembimbingSkripsi(1, Yii::app()->user->getUsername());

        $this->render('adminpembimbingskripsi', array(
            'dataProviderNilaiPembimbingSkripsi' => $dataProviderNilaiPembimbingSkripsi,
            'IDJenisSidang' => 1,
            'KodePembimbing1' => Yii::app()->user->getUsername(),
        ));
    }
    
    

}
