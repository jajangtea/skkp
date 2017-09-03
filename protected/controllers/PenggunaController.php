<?php

class PenggunaController extends Controller {

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
                'actions' => array('index', 'view', 'car', 'user', 'quote'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'expression' => '$user->getLevel()==2',
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'export'),
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
//    public function actions() {
//        return array(
//            'quote' => array(
//                'class' => 'CWebServiceAction',
//                'classMap' => array(
//                    'Pendaftaran' => 'Pendaftaran',
//                )
//            ),
//        );
//    }

    /**
     * @return Pendaftaran[]
     * @soap
     */
    public function getSatus() {
        return Pendaftaran::model()->findAll();
    }

    public function actions() {
        return array(
            'quote' => array(
                'class' => 'CWebServiceAction',
            ),
        );
    }

    /**
     * @param string login
     * @param string password
     * @param string email
     * @param string name
     * @return string 
     * @soap
     */
    public function registrate($login, $password, $email, $name) {
        $user = new UserModel();
        /* create new user */
        $user->login = $login;
        $user->password = md5($password);
        $user->email = $email;
        $user->name = $name;
        $user->active = 0;
        //save to DB
        $user->save();
        return 'success';
    }

    /**
     * @param string login
     * @param string password
     * return int
     * @soap
     */
    public function authenticate($login, $password) {
        $post = Post::model()->find('postID=:postID', array(':postID' => 10));
        $user = UserModel::model()->find('login:=login and password:=password', array(':login' => $login, ':password' => $password));
        if (!empty($user)) {
            return 1;
        } else {
            return 0;
        }
    }

}
