<?php

class NilaikpController extends Controller {

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
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'admin', 'reset'),
                'expression' => '$user->getLevel()==1', //admin
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'nilaiperusahaan', 'view_nilaiperusahaan'),
                'expression' => '$user->getLevel()==2', //mahasiswa
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'adminpembimbing', 'adminpenguji', 'adminpembimbingskripsi'),
                'expression' => '$user->getLevel()==3', //pembimbing kp
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionView($NIM) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $this->render('view', array(
            'model' => $this->loadModel($NIM),
        ));
    }

    public function actionView_nilaiperusahaan($NIM) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $this->render('view_nilaiperusahaan', array(
            'model' => $this->loadModel($NIM),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($NIM) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
        }
        $model = $this->loadModelNIM($NIM);
        $model->NIM = $NIM;
        if (isset($_POST['Nilaikp'])) {
            $model->attributes = $_POST['Nilaikp'];
            if ($model->save()) {
                if ($model->NilaiPembimbing > 0) {
                    $command = Yii::app()->db->createCommand();
                    $command->update('prd_pembimbing', array(
                        'status' => 'Tuntas',
                            ));
                }

                $this->loadReset($NIM);
                $this->redirect(array('view', 'NIM' => $model->NIM));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionNilaiperusahaan($NIM) {

        if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        }

        $model = $this->loadModelNIM($NIM);
        $model->NIM = $NIM;
        if (isset($_POST['Nilaikp'])) {
            $model->attributes = $_POST['Nilaikp'];
            if ($model->save()) {
                $this->loadReset($NIM);
                $this->redirect(array('view_nilaiperusahaan', 'NIM' => $model->NIM));
            }
        }
        $this->render('nperusahaan', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($NIM, $idPengajuan) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $model = $this->loadModel($NIM);

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Nilaikp'])) {
            $model->attributes = $_POST['Nilaikp'];
            if ($model->save()) {
                if ($model->NilaiPembimbing > 0) {
                    $command = Yii::app()->db->createCommand();
                    $command->update('prd_pembimbing', array(
                        'status' => 'Tuntas',
                            ), 'idPengajuan=:idPengajuan', array(':idPengajuan' => $idPengajuan));
                }

                $this->actionReset($NIM);
                $this->redirect(array('view', 'NIM' => $model->NIM));
            }
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
    public function actionDelete($NIM) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $this->loadModel($NIM)->delete();

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

        $criteria = new CDbCriteria(array(
            'condition' => 'NIM=:NIM',
            'params' => array(':NIM' => Yii::app()->user->name)));

        $dataProvider = new CActiveDataProvider('Nilaikp', array(
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
        $model = new Nilaikp('search');

        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Nilaikp']))
            $model->attributes = $_GET['Nilaikp'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionAdminpenguji() {

        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }

        $dataProviderNilaiPengujiKp = Nilaikp::model()->tampilNilaiPengujiKp(3, Yii::app()->user->getUsername());

        $this->render('adminpenguji', array(
            'dataProviderNilaiPengujiKp' => $dataProviderNilaiPengujiKp,
            'IDJenisSidang' => 3,
            'KodePenguji' => Yii::app()->user->getUsername(),
        ));
    }

    public function actionAdminpembimbing() {

        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }

        $dataProviderNilaiKp = Nilaikp::model()->tampilNilai(3, Yii::app()->user->getUsername());

        $this->render('adminpembimbing', array(
            'dataProviderNilaiKp' => $dataProviderNilaiKp,
            'IDJenisSidang' => 3,
            'KodePembimbing1' => Yii::app()->user->getUsername(),
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Nilaikp the loaded model
     * @throws CHttpException
     */
    public function loadModel($NIM) {
        $model = Nilaikp::model()->find("NIM=$NIM");
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelNIM($NIM) {
        $model = Nilaikp::model()->find("NIM=$NIM");
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Nilaikp $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'nilaikp-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionReset($NIM) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $model = $this->loadModel($NIM);
        $nPembimbing = $model->NilaiPembimbing;
        $nPenguji = $model->NilaiPenguji;
        $nperusahaan = $model->NilaiPerusahaan;
        $na = ($nPenguji * 0.3) + ($nPembimbing * 0.5) + ($nperusahaan * 0.2);
        $model->NA = $na;
        if ($na <= 50) {
            $model->Index = 'D';
        } else if ($na >= 50 && $na <= 69) {
            $model->Index = 'C';
        } else if ($na >= 70 && $na <= 79) {
            $model->Index = 'B';
        } else if ($na >= 80 && $na <= 100) {
            $model->Index = 'A';
        }
        $model->save();
        $model->unsetAttributes();  // clear any default values
        $this->redirect(Yii::app()->request->getUrlReferrer());
    }

    public function loadReset($NIM) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $model = $this->loadModel($NIM);
        $nPembimbing = $model->NilaiPembimbing;
        $nPenguji = $model->NilaiPenguji;
        $nperusahaan = $model->NilaiPerusahaan;
        $na = ($nPenguji * 0.3) + ($nPembimbing * 0.5) + ($nperusahaan * 0.2);
        $model->NA = $na;
        if ($na <= 50) {
            $model->Index = 'D';
        } else if ($na >= 50 && $na <= 69) {
            $model->Index = 'C';
        } else if ($na >= 70 && $na <= 79) {
            $model->Index = 'B';
        } else if ($na >= 80 && $na <= 100) {
            $model->Index = 'A';
        }
        $model->save();
        //$model->unsetAttributes();  // clear any default values
        //$this->redirect(Yii::app()->request->getUrlReferrer());
    }

}
