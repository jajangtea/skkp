<?php

class LaporanController extends Controller {
    private static $_isInitialized = false;
    private static $libPathPHPExcel = 'ext.heart.vendors.phpexcel.Classes.PHPExcel'; //the path to the PHP excel lib
    private static $libPathPDF = 'ext.heart.vendors.tcpdf.tcpdf'; //the path to the TCPDFlib

    public function actionIndex() {
        $this->render('index');
    }

    public function actionExport() {
        
        $model = new Pendaftaran();
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Pendaftaran']))
            $model->attributes = $_POST['Pendaftaran'];

        $exportType = 'Excel5';
        $this->widget('ext.heart.export.EHeartExport', array(
            'title' => 'Data Pendaftaran',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'grid_mode' => 'export',
            'exportType' => $exportType,
            'columns' => array(
                'Tanggal',
                'NIM',
                array(
                    'name' => 'NIM',
                    'type' => 'raw',
                    'header' => 'Mahasiswa',
                    'value' => 'CHtml::encode($data->nIM->Nama)',
                    'htmlOptions' => array('width' => '40px'),
                ),
                array(
                    'name' => 'IdSidang',
                    'type' => 'raw',
                    'header' => 'Nama Sidang',
                    'value' => 'CHtml::encode($data->idSidang->iDJenisSidang->NamaSidang)',
                    'htmlOptions' => array('width' => ''),
                ),
                'KodePembimbing1',
                'KodePembimbing2',
                array(
                    'name' => 'Judul',
                    'type' => 'raw',
                    'header' => 'Judul',
                    'value' => '$data->Judul',
                    'htmlOptions' => array('width' => '260px'),
                ),
            ),
        ));
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
