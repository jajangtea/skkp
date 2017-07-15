<?php

class UserController extends Controller {

    public $layout = '//layouts/column2';

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('create', 'captcha'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('update', 'view', 'aktif'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('admin', 'index', 'delete', 'cp'),
                'expression' => '$user->getLevel()<=1',
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actions() {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
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
    public function actionCreate() {
        $this->layout = 'mainReg';
        $model = new User;
        $modelMhs = new Mahasiswa;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'], $_POST['Mahasiswa'])) {
            $model->attributes = $_POST['User'];
            $modelMhs->attributes = $_POST['Mahasiswa'];
            $model->username = $modelMhs->NIM;
            $dua = $model->password;
            $model->saltPassword = $model->generateSalt();
            $model->password = $model->hashPassword($dua, $model->saltPassword);
            $model->level_id = 2;
            $sss;
            if ($model->save()) {
                $modelMhs->NIM = $modelMhs->NIM;
                $modelMhs->kodeJurusan = $modelMhs->KodeJurusan;
                $modelMhs->Nama = $modelMhs->Nama;
                $modelMhs->Tlp = $modelMhs->Tlp;
                $modelMhs->IdUser = $model->id;
                $modelMhs->save();
                $model2 = new LoginForm;
                $model2->username = $model->username;
                $model2->password = $dua;
                if ($model2->login())
                    $this->redirect(array('site/index'));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'modelMhs' => $modelMhs,
        ));
    }

    public function actionAktif($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['isActive'])) {
            $model->isActive = 1;
            if ($model->save(false))
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('aktif', array(
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
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
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
        $dataProvider = new CActiveDataProvider('User');
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
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = User::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionCp() {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $data = $this->loadModel(Yii::app()->user->id);

        if (isset($_POST['old'], $_POST['baru1'], $_POST['baru2'])) {
            if ($_POST['baru1'] !== $_POST['baru2']) {
                $data->addError('username', 'Your New Password Not Match');
            } else {
                if (CPasswordHelper::verifyPassword($_POST['old'], $data->password)) {
                    $dua = $_POST['baru1'];
                    $data->password = CPasswordHelper::hashPassword($_POST['baru1']);
                    print_r($data);
                    exit();
                    if ($data->save()) {
                        $this->redirect(array('/site'));
                    }
                } else {
                    $data->addError('username', 'Wrong Password');
                }
            }
        }

        $this->render('cp', array(
            'data' => $data,
        ));
    }

}
