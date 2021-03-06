<?php

class PendaftaranController extends Controller {

    private static $_isInitialized = false;
    private static $libPathPHPExcel = 'ext.heart.vendors.phpexcel.Classes.PHPExcel'; //the path to the PHP excel lib
    private static $libPathPDF = 'ext.heart.vendors.tcpdf.tcpdf'; //the path to the TCPDFlib
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
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'bukti', 'target', 'pdf', 'createpdf'),
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
    public function actionView($id) {

        $dataProviderUpload = Pendaftaran::model()->tampilUpload($id);


        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else {
            $this->layout = 'mainHome';
        }

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'dataProviderUpload' => $dataProviderUpload,
        ));
    }
    public function actionCreate() {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else {
            $this->layout = 'mainHome';
        }
        $model = new Pendaftaran;
        if (isset($_POST['Pendaftaran'])) {
            $model->attributes = $_POST['Pendaftaran'];
            $valid = $model->validate();
            if ($valid) {
                if (Yii::app()->user->getLevel() == 1) {
                    $this->layout = 'main';
                    $model->NIM = $model->NIM;
                    $model->Judul = strtoupper($model->Judul);
                    $model->Tanggal = date('Y-m-d H:i:s');
                } else {
                    $this->layout = 'mainHome';
                    $model->NIM = Yii::app()->user->getUsername();
                    $model->Judul = strtoupper($model->Judul);
                    $model->Tanggal = date('Y-m-d H:i:s');
                }
                $jml = Pendaftaran::cekPendaftaran($model->NIM);
                $jmlKompre = Pendaftaran::cekKompre($model->NIM);
                $tes = $model->idSidang->IDJenisSidang;
                if ($tes == 3) {//sidangkp
                    $command = Yii::app()->db->createCommand();
                    $command->insert('prd_nilaikp', array(
                        'NIM' => $model->NIM));
                }
                if ($tes == 4) {
                    if ($jmlKompre > 0) {
                        $session = new CHttpSession;
                        $session->open();
                        $session['cekpendaftaranKompre'] = "Tidak boleh melakukan pendaftaran kompre lebih dari sekali.";
                    } else {
                        $model->Judul = strtoupper($model->Judul);
                        if ($model->save())
                            if ($tes == 1) {
                                $command = Yii::app()->db->createCommand();
                                $command->insert('prd_nilaidetilskirpsi', array(
                                    'IdPendaftaran' => $model->idPendaftaran));

                                $commandNilaiMaster = Yii::app()->db->createCommand();
                                $commandNilaiMaster->insert('prd_nilaimasterskripsi', array(
                                    'IdPendaftaran' => $model->idPendaftaran));
                            } else if ($tes == 2) {
                                $command = Yii::app()->db->createCommand();
                                $command->insert('prd_nilaidetilskirpsi', array(
                                    'IdPendaftaran' => $model->idPendaftaran));
                            }
                        $this->redirect(array('view', 'id' => $model->idPendaftaran));
                    }
                } else if ($tes != 4) {
                    if ($jml > 0) {
                        $session = new CHttpSession;
                        $session->open();
                        $session['cekpendaftaran'] = "Tidak boleh melakukan pendaftaran sidang lebih dari sekali.";  // set session variable 'name3'
                    } else {
                        $model->Judul = strtoupper($model->Judul);
                        if ($model->save()) {
                            if ($tes == 1) {
                                $command = Yii::app()->db->createCommand();
                                $command->insert('prd_nilaidetilskirpsi', array(
                                    'IdPendaftaran' => $model->idPendaftaran));
                                $commandNilaiMaster = Yii::app()->db->createCommand();
                                $commandNilaiMaster->insert('prd_nilaimasterskripsi', array(
                                    'IdPendaftaran' => $model->idPendaftaran));
                            } else if ($tes == 2) {
                                $command = Yii::app()->db->createCommand();
                                $command->insert('prd_nilaidetilskirpsi', array(
                                    'IdPendaftaran' => $model->idPendaftaran));
                            }
                        }
                        $this->redirect(array('view', 'id' => $model->idPendaftaran));
                    }
                }
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }
    public function actionUpdate($id) {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else {
            $this->layout = 'mainHome';
        }
        $model = $this->loadModel($id);
        $modelMhs = new Mahasiswa;
        if (isset($_POST['Pendaftaran'])) {
            $model->attributes = $_POST['Pendaftaran'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idPendaftaran));
        }

        $this->render('update', array(
            'model' => $model,
            'modelMhs' => $modelMhs,
        ));
    }
    public function actionDelete($id) {
        $this->loadModel($id)->delete();
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }
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
        $model = new Pendaftaran('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Pendaftaran']))
            $model->attributes = $_GET['Pendaftaran'];
        if (Yii::app()->user->getLevel() == 2) {
            $this->render('admin', array(
                'model' => $model,
            ));
        } else {
            $this->layout = 'main';
            $this->render('admin', array(
                'model' => $model,
            ));
        }
    }
    public function actionAdmin() {
        if (Yii::app()->user->getLevel() == 1) {
            $this->layout = 'main';
        } else if (Yii::app()->user->getLevel() == 2) {
            $this->layout = 'mainHome';
        } else if (Yii::app()->user->getLevel() == 3 && Yii::app()->user->getLevel() <= 7) {
            $this->layout = 'mainNilai';
        } else {
            $this->layout = 'mainHome';
        }

        $model = new Pendaftaran('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Pendaftaran']))
            $model->attributes = $_GET['Pendaftaran'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }
    public function loadModel($id) {
        $model = Pendaftaran::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pendaftaran-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
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
    public function findFiles() {
        return array_diff(scandir(Yii::app()->params['uploadDir']), array('.', '..'));
    }
    public function buatBarcode($id) {
        $width = 290;
        $height = 50;
        $quality = 100;
        $text = 1;
        $location = Yii::app()->basePath . '/../images/barcode/' . $id . '.jpg';
        Yii::import("application.extensions.barcode.*");
        barcode::Barcode39($id, $width, $height, $quality, $text, $location);
    }
    public function buatQrcode($id) {
        Yii::import('ext.qrcode.QRCode');
        $code = new QRCode("data to encode");
        $code->create();
        //  $location = Yii::app()->basePath . '/../images/barcode/' . $id . '.png';
        $code->create(Yii::app()->basePath . '/../images/barcode/' . $id . '.jpg');
    }
    public function actionBukti() {
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
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                ->setLastModifiedBy("Maarten Balliauw")
                ->setTitle("Office 2007 XLSX Test Document")
                ->setSubject("Office 2007 XLSX Test Document")
                ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                ->setKeywords("office 2007 openxml php")
                ->setCategory("Test result file");
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Hello')
                ->setCellValue('B2', 'world!')
                ->setCellValue('C1', 'Hello')
                ->setCellValue('D2', 'world!');
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A4', 'Miscellaneous glyphs')
                ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');
        $objPHPExcel->getActiveSheet()->setTitle('Simple');
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="01simple.xls"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
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
    public function actionTarget() {
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
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $template = Yii::app()->basePath . '/../images/excel/_exportTarget.xlsx';
        $objPHPExcel = $objReader->load($template);
        $activeSheet = $objPHPExcel->getActiveSheet();
        $activeSheet->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $activeSheet->getPageSetup()->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_FOLIO);
        $border_style = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('test_img');
        $objDrawing->setDescription('test_img');
        $objDrawing->setPath(Yii::app()->basePath . '/../images/qrcode/2017090001.jpg');
        $objDrawing->setCoordinates('A1');
        $objDrawing->setOffsetX(5);
        $objDrawing->setOffsetY(5);
        $objDrawing->setWidth(150);
        $objDrawing->setHeight(100);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=_exportTarget.xlsx");
        header("Content-Transfer-Encoding: binary ");
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
        $objWriter->save('php://output');
        exit();
    }
    public function actionPdf() {
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
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $template = Yii::app()->basePath . '/../images/excel/_exportTarget.xlsx';
        $objPHPExcel = $objReader->load($template);
        $rendererName = PHPExcel_Settings::PDF_RENDERER_TCPDF;
        $rendererLibraryPath = Yii::app()->basePath . '/../tcpdf';
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('test_img');
        $objDrawing->setDescription('test_img');
        $objDrawing->setPath(Yii::app()->basePath . '/../images/qrcode/2017090001.jpg');
        $objDrawing->setCoordinates('A1');
        $objDrawing->setOffsetX(5);
        $objDrawing->setOffsetY(5);
        $objDrawing->setWidth(150);
        $objDrawing->setHeight(100);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
        $objPHPExcel->setActiveSheetIndex(0);
        if (!PHPExcel_Settings::setPdfRenderer(
                        $rendererName, $rendererLibraryPath
                )) {
            die(
                    'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
                    '<br />' .
                    'at the top of this script as appropriate for your directory structure'
            );
        }
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Type: application/pdf');
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header('Content-Disposition: attachment;filename="01simple.pdf"');
        header("Content-Transfer-Encoding: binary ");
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
        $objWriter->save('php://output');
        exit;
    }
    function IsExcelFormula($String = null) {
        if (!$String OR strlen($String) <= 0) {
            return false;
        }
        $First = $String[0];
        return ($First == '=' ? true : false);
    }

    public function actionCreatepdf() {
//        Yii::import('ext.heart.pdf.EHeartPDF',true);
//        EHeartPDF::init();
//        
//        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//        $pdf->SetCreator(PDF_CREATOR);
//
//        $pdf->SetTitle("Selling Report -2013");
//        $image_file = K_PATH_IMAGES . 'logo_exampsle.jpg';
//        $pdf->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
//        // Set font
//        $pdf->SetFont('helvetica', 'B', 20);
//        // Title
//       // $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
//       // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Bukti Pendaftaran", "selling report for Jun- 2013");
//        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
//        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//        $pdf->SetFont('helvetica', '', 8);
//        $pdf->SetTextColor(80, 80, 80);
//        $pdf->AddPage();
//
//        //Write the html
//       
//       $html = $this->renderPartial('_exportToPDF', [
//            'pegawai' => 1,
//            'penilai' => 2,
//            'formTargetUtama' => 3,
//            'formTargetPenunjang' => 4,
//            'rata' => 5,
//        ]);
//        //Convert the Html to a pdf document
//        $pdf->writeHTML($html, true, false, true, false, '');
//
//        $header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)'); //TODO:you can change this Header information according to your need.Also create a Dynamic Header.
//        // data loading
//        // $data = $pdf->LoadData(Yii::getPathOfAlias('ext.tcpdf') . DIRECTORY_SEPARATOR . 'table_data_demo.txt'); //This is the example to load a data from text file. You can change here code to generate a Data Set from your model active Records. Any how we need a Data set Array here.
//        // print colored table
//        //$pdf->ColoredTable($header, $data);
//        // reset pointer to the last page
//        $pdf->lastPage();
//
//        //Close and output PDF document
//        $pdf->Output('filename.pdf', 'I');
//        Yii::app()->end();
        // Require composer autoload
        //spl_autoload_unregister(array('YiiBase', 'autoload'));
        Yii::import('application.extensions.mpdf.mpdf', true);
        //spl_autoload_register(array('YiiBase', 'autoload'));
        // self::$_isInitialized = true;



        $mpdf = new mPDF('c', 'A4', '', '', 15, 15, 10, 10, 9, 9, 'L');

        $html = $this->renderPartial('_exportToPDF', array(
            'pegawai' => 1,
            'penilai' => 2,
            'formTargetUtama' => 3,
            'formTargetPenunjang' => 4,
            'rata' => 5,
                ), true);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;
        $mpdf->WriteHTML($html);
        $mpdf->Output('Target_SKP_' . 'hello' . '.pdf', 'I');
        exit();
    }

}
