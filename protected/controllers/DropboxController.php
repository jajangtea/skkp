<?php

class DropboxController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionUpload() {
        $dropbox = Yii::app()->dropbox;

        //First step. Connect to dropbox
        $request = $dropbox->getRequestToken();
        Yii::app()->session->add('request', $request); //Save this tokens
        $link = $dropbox->getAuthorizeLink('path/to/callback'); //Show this link to user

        /**
         * This code from callback function
         */
        $dropbox->setToken(Yii::app()->session->get('request')); // Set request tokens
        $tokens = $dropbox->getAccessToken(); // get Access tokens
        Yii::app()->session->add('dropbox', $tokens); //save request tokens. It's tokens we can save in db and use

        /**
         * if we get access tokens from database or other storage, we must set tokens by:   * 
         */
        $dropbox->setToken($tokens);

        /**
         * Now we can use API methods
         */
        $dropbox->getAccountInfo();
        $dropbox->getFile('path/to/file');
        $dropbox->putFile('path/to/file', 'path/to/file/on/server');
        $this->render('index');
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
