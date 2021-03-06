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
                'actions' => array('admin', 'index','create', 'delete','view','update', 'cp', 'reset'),
                'expression' => '$user->getLevel()==1',
            ),
            array('allow',
                'actions' => array('admin', 'index', 'delete', 'cp'),
                'expression' => '$user->getLevel()==3',
            ),
            array('allow',
                'actions' => array('cp'),
                'expression' => '$user->getLevel()==2',
            ),
            array('allow',
                'actions' => array('create'),
                'users' => array('*'),
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
                $modelMhs->Nama = strtoupper($modelMhs->Nama);
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
                $data = $this->loadModel(Yii::app()->user->id); //get current user that active now
                $user = User::model()->find('LOWER(username)=?', array($data->username));
                $dua = $_POST['baru1'];

                if ($user->validatePassword($_POST['old'])) {
                    $dua = $_POST['baru1'];
                    $data->saltPassword = $data->generateSalt();
                    $data->password = $data->hashPassword($dua, $data->saltPassword);
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

    public function actionChangepassword() {
        $data = $this->loadModel(Yii::app()->user->id); //get current user that active now

        if (isset($_POST['old'], $_POST['baru1'], $_POST['baru2'])) { // if user post to change password
            if ($_POST['baru1'] !== $_POST['baru2']) { // check if it have same password for validation?
                $data->addError('username', 'Your New Password Not Match'); // if not same, show error
            } else { // if same, next
                if (CPasswordHelper::verifyPassword($_POST['old'], $data->pass)) { // check the old password that user input same with old password?
                    $dua = $_POST['baru1'];
                    $data->pass = CPasswordHelper::hashPassword($_POST['baru1']); // encryp that
                    if ($data->save()) { // save to tabel
                        $this->redirect(array('/site'));
                    }
                } else { //if password not match with old password, show error
                    $data->addError('username', 'Wrong Password');
                }
            }
        }

        $this->render('cp', array(//call "cp" view
            'data' => $data,
        ));
    }

    public function actionReset($id) {
        $model = $this->loadModel($id);
        $model->password = "9b167bfe2e0ebb3e213c23fede513d4d";
        $model->saltPassword = "595e826f4ae2f3.86169799";
        $model->save();

        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        $modeladmin = new User('search');
        $modeladmin->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $modeladmin->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $modeladmin,
        ));
    }

}
