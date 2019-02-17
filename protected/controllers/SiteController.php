<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'login'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('update', 'view', 'aktif'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('admin', 'delete', 'cp'),
                'expression' => '$user->getLevel()==1',
            ),
        );
    }

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
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
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $jumlahPrasidang = Pendaftaran::model()->hitungjmlsidang(1);
        $jumlahSidangAkhir = Pendaftaran::model()->hitungjmlsidang(2);
        $jumlahSidangKP = Pendaftaran::model()->hitungjmlsidang(3);
        $jumlahSidangKompre = Pendaftaran::model()->hitungjmlsidang(4);

        $dataPraSidang = Sidangmaster::model()->jenisSidangAktif(1);
        $dataSidangAkhir = Sidangmaster::model()->jenisSidangAktif(2);
        $dataSidangKP = Sidangmaster::model()->jenisSidangAktif(3);
        $dataSidangKompre = Sidangmaster::model()->jenisSidangAktif(4);
       
        if (Yii::app()->user->getLevel() == 1) {
            // $this->layout = 'main';
            $this->render('index', array(
                'dataPraSidang' => $dataPraSidang,
                'dataSidangAkhir' => $dataSidangAkhir,
                'dataSidangKP' => $dataSidangKP,
                'dataSidangKompre' => $dataSidangKompre,
                'jumlahPrasidang' => $jumlahPrasidang,
                'jumlahSidangAkhir' => $jumlahSidangAkhir,
                'jumlahSidangKP' => $jumlahSidangKP,
                'jumlahSidangKompre' => $jumlahSidangKompre,
            ));
        } else {
            // $this->layout = 'mainHome';
            $data = Sidangmaster::model()->sidangaktif();
            $this->render('index', array(
                'dataPraSidang' => $dataPraSidang,
                'dataSidangAkhir' => $dataSidangAkhir,
                'dataSidangKP' => $dataSidangKP,
                'dataSidangKompre' => $dataSidangKompre,
                'jumlahPrasidang' => $jumlahPrasidang,
                'jumlahSidangAkhir' => $jumlahSidangAkhir,
                'jumlahSidangKP' => $jumlahSidangKP,
                'jumlahSidangKompre' => $jumlahSidangKompre,
            ));
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() >= 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }
        if (Yii::app()->errorHandler->error['code'] == '403') {
            $this->render('error403');
        } else if (Yii::app()->errorHandler->error['code'] == '404') {
            $this->render('error404');
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
//    public function actionLogin() {
//        $this->layout = 'mainReg';
//        $model = new LoginForm;
//
//        // if it is ajax validation request
//        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
//            echo CActiveForm::validate($model);
//            Yii::app()->end();
//        }
//
//        // collect user input data
//        if (isset($_POST['LoginForm'])) {
//            $model->attributes = $_POST['LoginForm'];
//            // validate user input and redirect to the previous page if valid
//            if ($model->validate() && $model->login())
//                if (Yii::app()->user->getLevel() == 3) {
//                    $this->redirect(array('site/index'));
//                } else {
//                    $this->redirect(Yii::app()->user->returnUrl);
//                }
//        }
//        // display the login form
//        $this->render('login', array('model' => $model));
//    }
    public function actionLogin() {
        $this->layout = 'mainReg';
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(array('site/login'));
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'comment-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
     public function actionJq() {
        $this->render('latihan');
    }

}
