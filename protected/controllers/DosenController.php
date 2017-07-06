<?php

class DosenController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    private static $_isInitialized = false;
    private static $libPathPHPExcel = 'ext.heart.vendors.phpexcel.Classes.PHPExcel'; //the path to the PHP excel lib

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
                'actions' => array('index', 'view', 'export', 'laporan', 'lap'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
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
        $this->layout = 'main';
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
//    public function actionCreate() {
//        $this->layout = 'main';
//        $model = new Dosen;
//
//        // Uncomment the following line if AJAX validation is needed
//        // $this->performAjaxValidation($model);
//
//        if (isset($_POST['Dosen'])) {
//            $model->attributes = $_POST['Dosen'];
//            if ($model->save())
//                $this->redirect(array('view', 'id' => $model->KodeDosen));
//        }
//
//        $this->render('create', array(
//            'model' => $model,
//        ));
//    }

    public function actionCreate() {
        $this->layout = 'main';
        $model = new User;
        $modelDosen = new Dosen;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'], $_POST['Dosen'])) {
            $model->attributes = $_POST['User'];
            $modelDosen->attributes = $_POST['Dosen'];
            $dua = $model->password;
            $model->saltPassword = $model->generateSalt();
            $model->password = $model->hashPassword($dua, $model->saltPassword);
            $sss;
            if ($model->save()) {
                $modelDosen->IdUser = $model->id;
                $modelDosen->save();
                $model2 = new LoginForm;
                $model2->username = $model->username;
                $model2->password = $dua;
                if ($model2->login())
                    $this->redirect(array('site/index'));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'modelDosen' => $modelDosen,
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

        if (isset($_POST['Dosen'])) {
            $model->attributes = $_POST['Dosen'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->KodeDosen));
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
        $model = new Dosen('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Dosen']))
            $model->attributes = $_GET['Dosen'];
        $this->layout = 'main';
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $this->layout = 'main';
        $model = new Dosen('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Dosen']))
            $model->attributes = $_GET['Dosen'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Dosen the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Dosen::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Dosen $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'dosen-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionExport() {
        $model = new Dosen;
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Dosen']))
            $model->attributes = $_POST['Dosen'];

        $exportType = 'Excel5';
        $this->widget('ext.heart.export.EHeartExport', array(
            'title' => 'List of Dosen',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'grid_mode' => 'export',
            'exportType' => $exportType,
            'columns' => array(
                'KodeDosen',
                'NamaDosen',
                'Tlp',
                'IdUser',
            ),
        ));
    }

    public function actionCetak() {
        $this->setHeaderPT('X');
        $sheet = $this->rpt->getActiveSheet();
        $this->rpt->getDefaultStyle()->getFont()->setName('Arial');
        $this->rpt->getDefaultStyle()->getFont()->setSize('9');

        $sheet->mergeCells("A7:V7");
        $sheet->mergeCells("A8:V8");
        $sheet->getRowDimension(7)->setRowHeight(20);
        $sheet->setCellValue("A7", "DAFTAR HADIR DOSEN");
        $sheet->setCellValue("A8", $nama = ($this->dataReport['nama_hari'] == '') ? 'JADWAL KESELURUHAN' . ',SEMESTER ' . $this->dataReport['nama_semester'] . ' T.A ' . $this->dataReport['nama_tahun'] : strtoupper($this->dataReport['hari']) . ',SEMESTER ' . $this->dataReport['nama_semester'] . ' T.A ' . $this->dataReport['nama_tahun']);
        $styleArray = array(
            'font' => array('bold' => true,
                'size' => 16),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
        );
        $sheet->getStyle("A7:A7")->applyFromArray($styleArray);
        $sheet->getStyle("A8:A8")->applyFromArray($styleArray);

        $sheet->getRowDimension(15)->setRowHeight(20);
        $sheet->mergeCells("A10:A11");
        $sheet->setCellValue('A10', 'NO');
        $sheet->mergeCells("B10:C11");
        $sheet->setCellValue('B10', 'NAMA DOSEN');
        $sheet->mergeCells("D10:D11");
        $sheet->setCellValue('D10', 'KODE MATKUL');
        $sheet->mergeCells("E10:E11");
        $sheet->setCellValue('E10', 'MATAKULIAH');
        $sheet->mergeCells("F10:F11");
        $sheet->setCellValue('F10', 'JAM');
        $sheet->mergeCells("G10:V10");
        $sheet->setCellValue('G10', 'PARAF TANDA HADIR DOSEN');
        $sheet->mergeCells("Q10:Q11");
        $sheet->setCellValue('Q10', 'JUMLAH HADIR');

        $sheet->getColumnDimension('C')->setWidth(23);
        $sheet->getColumnDimension('D')->setWidth(12);
        $sheet->getColumnDimension('E')->setWidth(40);
        $sheet->getColumnDimension('F')->setWidth(12);
        $sheet->getColumnDimension('G')->setWidth(7);
        $sheet->getColumnDimension('H')->setWidth(7);
        $sheet->getColumnDimension('I')->setWidth(7);
        $sheet->getColumnDimension('J')->setWidth(7);
        $sheet->getColumnDimension('K')->setWidth(7);
        $sheet->getColumnDimension('L')->setWidth(7);
        $sheet->getColumnDimension('M')->setWidth(7);
        $sheet->getColumnDimension('N')->setWidth(7);
        $sheet->getColumnDimension('O')->setWidth(7);
        $sheet->getColumnDimension('P')->setWidth(7);
        $sheet->getColumnDimension('Q')->setWidth(7);
        $sheet->getColumnDimension('R')->setWidth(7);
        $sheet->getColumnDimension('S')->setWidth(7);
        $sheet->getColumnDimension('T')->setWidth(7);
        $sheet->getColumnDimension('U')->setWidth(7);
        $sheet->getRowDimension(16)->setRowHeight(20);

        $sheet->setCellValue('G11', 1);
        $sheet->setCellValue('H11', 2);
        $sheet->setCellValue('I11', 3);
        $sheet->setCellValue('J11', 4);
        $sheet->setCellValue('K11', 5);
        $sheet->setCellValue('L11', 6);
        $sheet->setCellValue('M11', 7);
        $sheet->setCellValue('N11', 8);
        $sheet->setCellValue('O11', 9);
        $sheet->setCellValue('P11', 10);
        $sheet->setCellValue('Q11', 11);
        $sheet->setCellValue('R11', 12);
        $sheet->setCellValue('S11', 13);
        $sheet->setCellValue('T11', 14);
        $sheet->setCellValue('U11', 15);
        $sheet->setCellValue('V11', 16);


        $styleArray = array(
            'font' => array('bold' => true),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $sheet->getStyle("A10:V11")->applyFromArray($styleArray);
        $sheet->getStyle("A10:V11")->getAlignment()->setWrapText(true);
        $kjur = $this->dataReport['nama_prodi'];
        $ta = $this->dataReport['nama_tahun'];
        $idsmt = $this->dataReport['nama_semester'];
        $str_nama_hari = $this->dataReport['nama_hari'];
        $str = "SELECT km.idkelas_mhs,km.idkelas,km.nama_kelas,km.hari,km.jam_masuk,km.jam_keluar,vpp.kmatkul,vpp.nmatkul,vpp.nama_dosen,vpp.nidn,rk.namaruang,rk.kapasitas FROM kelas_mhs km JOIN v_pengampu_penyelenggaraan vpp ON (km.idpengampu_penyelenggaraan=vpp.idpengampu_penyelenggaraan) LEFT JOIN ruangkelas rk ON (rk.idruangkelas=km.idruangkelas) WHERE idsmt='$idsmt' AND tahun='$ta' AND kjur='$kjur'$str_nama_hari";
        $this->db->setFieldTable(array('idkelas_mhs', 'kmatkul', 'nmatkul', 'nama_dosen', 'idkelas', 'nidn', 'nama_kelas', 'hari', 'jam_masuk', 'jam_keluar', 'namaruang', 'kapasitas'));
        $r = $this->db->getRecord($str);
        $result = array();
        $row_awal = 12;
        $row = 12;
        while (list($k, $v) = each($r)) {
            $kmatkul = $v['kmatkul'];
            $v['kode_matkul'] = $objDemik->getKMatkul($kmatkul);
            $sheet->getRowDimension($row)->setRowHeight(17);
            $sheet->setCellValue("A$row", $v['no']);
            $sheet->mergeCells("B$row:C$row");
            $sheet->setCellValue("B$row", $v['nama_dosen']);
            $sheet->setCellValue("D$row", $v['kode_matkul']);
            $sheet->setCellValueExplicit("E$row", $v['nmatkul'], PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("F$row", $v['jam_masuk'] . '-' . $v['jam_keluar'], PHPExcel_Cell_DataType::TYPE_STRING);
            $row += 1;
        }
        $row = $row - 1;
        $styleArray = array(
            'font' => array('bold' => true),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
            'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
        );
        $sheet->getStyle("A$row_awal:V$row")->applyFromArray($styleArray);
        $sheet->getStyle("A$row_awal:V$row")->getAlignment()->setWrapText(true);

        $styleArray = array(
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT)
        );
        $sheet->getStyle("B$row_awal:B$row")->applyFromArray($styleArray);
        $sheet->getStyle("B$row_awal:B$row")->getAlignment()->setWrapText(true);

        $sheet->getStyle("E$row_awal:E$row")->applyFromArray($styleArray);
        $sheet->getStyle("E$row_awal:E$row")->getAlignment()->setWrapText(true);

        $this->printOut('daftarhadirdosen');
    }

    public function actionLaporan() {
        if (!self::$_isInitialized) {
            $lib = Yii::getPathOfAlias(self::$libPathPHPExcel) . '.php';
            if (!file_exists($lib)) {
                Yii::log("PHP Excel lib not found($lib). Export disabled !", CLogger::LEVEL_WARNING, 'EHeartExcel');
            } else {
                spl_autoload_unregister(array('YiiBase', 'autoload'));
                Yii::import(self::$libPathPHPExcel, true);
                spl_autoload_register(array('YiiBase', 'autoload'));
                self::$_isInitialized = true;
            }
        }


            // Create new PHPExcel object
            $objPHPExcel = new PHPExcel();

// Set document properties
            $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                    ->setLastModifiedBy("Maarten Balliauw")
                    ->setTitle("Office 2007 XLSX Test Document")
                    ->setSubject("Office 2007 XLSX Test Document")
                    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                    ->setKeywords("office 2007 openxml php")
                    ->setCategory("Test result file");


// Add some data
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Hello')
                    ->setCellValue('B2', 'world!')
                    ->setCellValue('C1', 'Hello')
                    ->setCellValue('D2', 'world!');

// Miscellaneous glyphs, UTF-8
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A4', 'Miscellaneous glyphs')
                    ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

// Rename worksheet
            $objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="01simple.xls"');
            header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit;

            Yii::app()->end();
            spl_autoload_register(array('YiiBase', 'autoload'));
        
    }

    public function actionLap() {
        if (!self::$_isInitialized) {
            $lib = Yii::getPathOfAlias(self::$libPathPHPExcel) . '.php';
            if (!file_exists($lib)) {
                Yii::log("PHP Excel lib not found($lib). Export disabled !", CLogger::LEVEL_WARNING, 'EHeartExcel');
            } else {
                spl_autoload_unregister(array('YiiBase', 'autoload'));
                Yii::import(self::$libPathPHPExcel, true);
                spl_autoload_register(array('YiiBase', 'autoload'));
                self::$_isInitialized = true;
            }
        }

        $objPHPExcel = new PHPExcel();

// Set document properties
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                ->setLastModifiedBy("Maarten Balliauw")
                ->setTitle("Office 2007 XLSX Test Document")
                ->setSubject("Office 2007 XLSX Test Document")
                ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                ->setKeywords("office 2007 openxml php")
                ->setCategory("Test result file");


// Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Hello')
                ->setCellValue('B2', 'world!')
                ->setCellValue('C1', 'Hello')
                ->setCellValue('D2', 'world!');

// Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A4', 'Miscellaneous glyphs')
                ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

// Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="01simple.xls"');
        header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;

        Yii::app()->end();
        spl_autoload_register(array('YiiBase', 'autoload'));
    }

}
