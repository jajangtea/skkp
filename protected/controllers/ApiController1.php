<?php

/**
 * ApiController class file
 * @author Joachim Werner <joachim.werner@diggin-data.de>  
 */

/**
 * ApiController 
 * 
 * @uses Controller
 * @author Joachim Werner <joachim.werner@diggin-data.de>
 * @author 
 * @see http://www.gen-x-design.com/archives/making-restful-requests-in-php/
 * @license (tbd)
 */
class ApiController extends Controller {

// {{{ *** Members ***
    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers 
     */
    Const APPLICATION_ID = '';

    private $format = 'json';

// }}} 
// {{{ filters
    /**
     * @return array action filters
     */
    public function filters() {
        return array();
    }

// }}} 
// {{{ *** Actions ***
// {{{ actionIndex
//    public function actionIndex() {
//        header('Content-type: application/json');
//        echo CJSON::encode(array(1, 2, 3));
//    }
// }}} 
// {{{ actionList

    public function actionList() {
        $this->_checkAuth();
        if (!isset($_GET['model'])) {
            $this->_sendResponse(501, sprintf('Error: url salah.', ''));
        }
        $model = $_GET['model'];

        switch ($model) {
            case 'pendaftaran': // {{{ 
                $models = Pendaftaran::model()->findAll();
                break; // }}} 
            case 'user': // {{{ 
                $models = User::model()->findAll();
                break; // }}} 
            default: // {{{ 
                $this->_sendResponse(501, sprintf('Error: Mode <b>list</b> is not implemented for model <b>%s</b>', $_GET['model']));
                exit; // }}} 
        }
        if (is_null($models)) {
            $this->_sendResponse(200, sprintf('No items where found for model <b>%s</b>', $_GET['model']));
        } else {
            $rows = array();
            foreach ($models as $model)
                $rows[] = $model->attributes;

            $this->_sendResponse(200, CJSON::encode($rows));
        }
    }

// }}} 
// {{{ actionView
    /* Shows a single item
     * 
     * @access public
     * @return void
     */

    public function actionView() {
        $this->_checkAuth();
// Check if id was submitted via GET
        if (!isset($_GET['id']))
            $this->_sendResponse(500, 'Error: Parameter <b>id</b> is missing');

        switch ($_GET['model']) {
// Find respective model    
            case 'pendaftaran': // {{{ 
                $model = Pendaftaran::model()->findByPk($_GET['id']);
                break; // }}} 
            default: // {{{ 
                $this->_sendResponse(501, sprintf('Mode <b>view</b> is not implemented for model <b>%s</b>', $_GET['model']));
                exit; // }}} 
        }
        if (is_null($model)) {
            $this->_sendResponse(404, 'No Item found with id ' . $_GET['id']);
        } else {
            $this->_sendResponse(200, $this->_getObjectEncoded($_GET['model'], $model->attributes));
        }
    }

// }}} 
// {{{ actionCreate
    /**
     * Creates a new item
     * 
     * @access public
     * @return void
     */
    public function actionCreated() {
//$this->_checkAuth();

        switch ($_GET['model']) {
// Get an instance of the respective model
            case 'pendaftaran': // {{{ 
                $model = new Pendaftaran;
                break; // }}} 
            default: // {{{ 
                $this->_sendResponse(501, sprintf('Mode <b>create</b> is not implemented for model <b>%s</b>', $_GET['model']));
                exit; // }}} 
        }
// Try to assign Pendaftaran values to attributes
        foreach ($_Pendaftaran as $var => $value) {
// Does the model have this attribute?
            if ($model->hasAttribute($var)) {
                $model->$var = $value;
            } else {
// No, raise an error
                $this->_sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $_GET['model']));
            }
        }
// Try to save the model
        if ($model->save()) {
// Saving was OK
            $this->_sendResponse(200, $this->_getObjectEncoded($_GET['model'], $model->attributes));
        } else {
// Errors occurred
            $msg = "<h1>Error</h1>";
            $msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
            $msg .= "<ul>";
            foreach ($model->errors as $attribute => $attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach ($attr_errors as $attr_error) {
                    $msg .= "<li>$attr_error</li>";
                }
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            $this->_sendResponse(500, $msg);
        }

        var_dump($_REQUEST);
    }

// }}}     
// {{{ actionUpdate
    /**
     * Update a single iten
     * 
     * @access public
     * @return void
     */
    public function actionUpdate() {
        $this->_checkAuth();

// Get PUT parameters
        parse_str(file_get_contents('php://input'), $put_vars);

        switch ($_GET['model']) {
// Find respective model
            case 'pendaftaran': // {{{ 
                $model = Pendaftaran::model()->findByPk($_GET['id']);
                break; // }}} 
            default: // {{{ 
                $this->_sendResponse(501, sprintf('Error: Mode <b>update</b> is not implemented for model <b>%s</b>', $_GET['model']));
                exit; // }}} 
        }
        if (is_null($model))
            $this->_sendResponse(400, sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.", $_GET['model'], $_GET['id']));

// Try to assign PUT parameters to attributes
        foreach ($put_vars as $var => $value) {
// Does model have this attribute?
            if ($model->hasAttribute($var)) {
                $model->$var = $value;
            } else {
// No, raise error
                $this->_sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $_GET['model']));
            }
        }
// Try to save the model
        if ($model->save()) {
            $this->_sendResponse(200, sprintf('The model <b>%s</b> with id <b>%s</b> has been updated.', $_GET['model'], $_GET['id']));
        } else {
            $msg = "<h1>Error</h1>";
            $msg .= sprintf("Couldn't update model <b>%s</b>", $_GET['model']);
            $msg .= "<ul>";
            foreach ($model->errors as $attribute => $attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach ($attr_errors as $attr_error) {
                    $msg .= "<li>$attr_error</li>";
                }
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            $this->_sendResponse(500, $msg);
        }
    }

// }}} 
// {{{ actionDelete
    /**
     * Deletes a single item
     * 
     * @access public
     * @return void
     */
    public function actionDelete() {
////$this->_checkAuth();

        switch ($_GET['model']) {
// Load the respective model
            case 'pendaftaran': // {{{ 
                $model = Pendaftaran::model()->findByPk($_GET['id']);
                break; // }}} 
            default: // {{{ 
                $this->_sendResponse(501, sprintf('Error: Mode <b>delete</b> is not implemented for model <b>%s</b>', $_GET['model']));
                exit; // }}} 
        }
// Was a model found?
        if (is_null($model)) {
// No, raise an error
            $this->_sendResponse(400, sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.", $_GET['model'], $_GET['id']));
        }

// Delete the model
        $num = $model->delete();
        if ($num > 0)
            $this->_sendResponse(200, sprintf("Model <b>%s</b> with ID <b>%s</b> has been deleted.", $_GET['model'], $_GET['id']));
        else
            $this->_sendResponse(500, sprintf("Error: Couldn't delete model <b>%s</b> with ID <b>%s</b>.", $_GET['model'], $_GET['id']));
    }

// }}} 
// }}} End Actions
// {{{ Other Methods
// {{{ _sendResponse
    /**
     * Sends the API response 
     * 
     * @param int $status 
     * @param string $body 
     * @param string $content_type 
     * @access private
     * @return void
     */
    private function _sendResponse($status = 200, $body = '', $content_type = 'text/html') {
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
// set the status
        header($status_header);
// set the content type
        header('Content-type: ' . $content_type);

// pages with body are easy
        if ($body != '') {
// send the body
            echo $body;
            exit;
        }
// we need to create the body if none is passed
        else {
// create some body messages
            $message = '';

// this is purely optional, but makes the pages a little nicer to read
// for your users.  Since you won't likely send a lot of different status codes,
// this also shouldn't be too ponderous to maintain
            switch ($status) {
                case 401:
                    $message = 'You must be authorized to view this page.';
                    break;
                case 404:
                    $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
                    break;
                case 500:
                    $message = 'The server encountered an error processing your request.';
                    break;
                case 501:
                    $message = 'The requested method is not implemented.';
                    break;
            }

// servers don't always have a signature turned on (this is an apache directive "ServerSignature On")
            $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];

// this should be templatized in a real-world solution
            $body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                        <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                                <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
                            </head>
                            <body>
                                <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
                                <p>' . $message . '</p>
                                <hr />
                                <address>' . $signature . '</address>
                            </body>
                        </html>';

            echo $body;
            exit;
        }
    }

// }}}            
// {{{ _getStatusCodeMessage
    /**
     * Gets the message for a status code
     * 
     * @param mixed $status 
     * @access private
     * @return string
     */
    private function _getStatusCodeMessage($status) {
// these could be stored in a .ini file and loaded
// via parse_ini_file()... however, this will suffice
// for an example
        $codes = Array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported'
        );

        return (isset($codes[$status])) ? $codes[$status] : '';
    }

// }}} 
// {{{ _checkAuth
    /**
     * Checks if a request is authorized
     * 
     * @access private
     * @return void
     */
    private function _checkAuth() {
//Check if we have the USERNAME and PASSWORD HTTP headers set?
        if (!isset($_GET['username']) || !isset($_GET['password'])) {
            $this->_sendResponse(501, sprintf('Error: Url Salah Juga', $_GET['model']));
        } else {
            $username = $_GET["username"];
            $password = $_GET["password"];
        }

// Find the user

        $user = User::model()->find('LOWER(username)=?', array(strtolower($username)));
        if ($user === null) {
// Error: Unauthorized
            $this->_sendResponse(401, 'Error: User Name is invalid');
        } else if (!$user->validatePassword($password)) {
// Error: Unauthorized
            $this->_sendResponse(401, 'Error: User Password is invalid');
        }
    }

    public function actionAuth() {
//Check if we have the USERNAME and PASSWORD HTTP headers set?
        if (!isset($_GET['username']) || !isset($_GET['password'])) {
            $this->_sendResponse(501, sprintf('Error: Url Salah Juga', $_GET['model']));
        }
        $username = $_GET["username"];
        $password = $_GET["password"];
// Find the user

        $user = User::model()->find('LOWER(username)=?', array(strtolower($username)));
        if ($user === null) {
            $message = "user_salah";
            echo json_encode(array("response" => $message));
        } else if (!$user->validatePassword($password)) {
            $message = "password_salah";
            echo json_encode(array("response" => $message));
        } else {
            $message = "berhasil";
            echo json_encode(array("response" => $message, "username" => $_GET["username"]));
        }
    }

// }}} 
// {{{ _getObjectEncoded
    /**
     * Returns the json or xml encoded array
     * 
     * @param mixed $model 
     * @param mixed $array Data to be encoded
     * @access private
     * @return void
     */
    private function _getObjectEncoded($model, $array) {
        if (isset($_GET['format']))
            $this->format = $_GET['format'];

        if ($this->format == 'json') {
            header('Content-type: application/json');
            return CJSON::encode($array);
        } elseif ($this->format == 'xml') {
            $result = '<?xml version="1.0">';
            $result .= "\n<$model>\n";
            foreach ($array as $key => $value)
                $result .= "    <$key>" . utf8_encode($value) . "</$key>\n";
            $result .= '</' . $model . '>';
            return $result;
        } else {
            return;
        }
    }

    public function actionRegister() {
        $model = new User;
        $modelMhs = new Mahasiswa;
        $model->username = $_GET["username"];
        $model->email = $_GET["email"];
        $dua = $_GET["password"];
        $model->saltPassword = $model->generateSalt();
        $model->password = $model->hashPassword($dua, $model->saltPassword);
        $model->level_id = 2;
        $criteria = new CDbCriteria();
        $criteria->condition = 'username=:username';
        $criteria->params = array(':username' => $model->username);
        if (User::model()->exists($criteria)) {
            $message = "terdaftar";
        } else if ($model->save()) {
            $modelMhs->NIM = $_GET["NIM"];
            $modelMhs->KodeJurusan = $_GET["KodeJurusan"];
            $modelMhs->Nama = $_GET["Nama"];
            $modelMhs->Tlp = $_GET["Tlp"];
            $modelMhs->IdUser = $model->id;
            $modelMhs->save();
            $message = "ok";
        } else {
            $msg = "<h1>Error</h1>";
            $msg .= "<ul>";
            foreach ($model->errors as $attribute => $attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach ($attr_errors as $attr_error) {
                    $msg .= "<li>$attr_error</li>";
                }
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            $this->_sendResponse(500, $msg);
        }
        header('Content-type: application/json');
        echo json_encode(array("response" => $message));
    }

    public function actionLogin() {
        header('Content-type: application/json');
        $model = new LoginForm;
        $model->username = $_POST["username"];
        $model->password = $_POST["password"];
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login()) {
                echo json_encode(array("response" => "berhasil"));
            } else {
                echo json_encode(array("response" => "gagal"));
            }
        }
    }

    public function actionIndex() {
        header('Content-type: application/json');
        $jumlahPrasidang = Pendaftaran::model()->hitungjmlsidang(1);
        $jumlahSidangAkhir = Pendaftaran::model()->hitungjmlsidang(2);
        $jumlahSidangKP = Pendaftaran::model()->hitungjmlsidang(3);
        $jumlahSidangKompre = Pendaftaran::model()->hitungjmlsidang(4);
        echo json_encode(array(
            "jumlahPrasidang" => $jumlahPrasidang,
            "jumlahSidangAkhir" => $jumlahSidangAkhir,
            "jumlahSidangKP" => $jumlahSidangKP,
            "jumlahSidangKompre" => $jumlahSidangKompre,
        ));
    }

    public function actionSidangkp() {
        header('Content-type: application/json');
        $dataSidangKP = Sidangmaster::model()->jenisSidangAktif(3);
        echo json_encode(array("Tanggal" => ($dataSidangKP["Tanggal"]) == NULL ? "-" : $dataSidangKP["Tanggal"], "tglBuka" => ($dataSidangKP["tglBuka"]) == NULL ? "-" : $dataSidangKP["tglBuka"], "tglTutup" => ($dataSidangKP["tglTutup"]) == NULL ? "-" : $dataSidangKP["tglTutup"]));
    }

    public function actionSidangskripsi() {
        header('Content-type: application/json');
        $dataSidangAkhir = Sidangmaster::model()->jenisSidangAktif(2);
        echo json_encode(array("Tanggal" => ($dataSidangAkhir["Tanggal"]) == NULL ? "-" : $dataSidangAkhir["Tanggal"], "tglBuka" => ($dataSidangAkhir["tglBuka"]) == NULL ? "-" : $dataSidangAkhir["tglBuka"], "tglTutup" => ($dataSidangAkhir["tglTutup"]) == NULL ? "-" : $dataSidangAkhir["tglTutup"]));
    }

    public function actionSidangkompre() {
        header('Content-type: application/json');
        $dataSidangKompre = Sidangmaster::model()->jenisSidangAktif(4);
        echo json_encode(array("Tanggal" => ($dataSidangKompre["Tanggal"]) == NULL ? "-" : $dataSidangKompre["Tanggal"], "tglBuka" => ($dataSidangKompre["tglBuka"]) == NULL ? "-" : $dataSidangKompre["tglBuka"], "tglTutup" => ($dataSidangKompre["tglTutup"]) == NULL ? "-" : $dataSidangKompre["tglTutup"]));
    }

    public function actionSidangpra() {
        header('Content-type: application/json');
        $dataPraSidang = Sidangmaster::model()->jenisSidangAktif(1);
        echo json_encode(array("Tanggal" => ($dataPraSidang["Tanggal"]) == NULL ? "-" : $dataPraSidang["Tanggal"], "tglBuka" => ($dataPraSidang["tglBuka"]) == NULL ? "-" : $dataPraSidang["tglBuka"], "tglTutup" => ($dataPraSidang["tglTutup"]) == NULL ? "-" : $dataPraSidang["tglTutup"]));
    }

    public function actionCreate() {
        header('Content-type: application/json');
        $model = new Pendaftaran;
        $idpendaftaran = $model->generateKode_Pendaftaran();
        echo json_encode(array("nomor" => $idpendaftaran));

//        if (isset($_POST['Pendaftaran'])) {
//            $model->attributes = $_POST['Pendaftaran'];
//            $valid = $model->validate();
//            $sql = "select * from prd_pembimbing pp inner join prd_pengajuan pj on pp.idPengajuan=pj.idPengajuan inner join prd_user pu on pp.idDosen=pu.id where pj.idPengajuan=$model->idPengajuan";
//
//            $cmd = Yii::app()->db->createCommand($sql)->queryAll();
//
//            foreach ($cmd as $dt) {
//                $model->KodePembimbing1 = $dt['username'];
//                $model->Judul = $dt['Judul'];
//            }
//
//            if ($valid) {
//                $jml = Pendaftaran::model()->cekPendaftaran($model->NIM);
//                $jmlKompre = Pendaftaran::model()->cekKompre($model->NIM);
//                $jmlBarisNilai = Pendaftaran::model()->cekNilaiMaster($model->NIM);
//                $tes = $model->idSidang->IDJenisSidang;
//
//                if ($tes == 4) {//cek kompre
//                    if ($jmlKompre > 0) {
//                        $session = new CHttpSession;
//                        $session->open();
//                        $session['cekpendaftaranKompre'] = "Tidak boleh melakukan pendaftaran kompre lebih dari sekali.";
//                    } else {
//                        $model->idPengajuan = $model->idPengajuan;
//                        $model->KodePembimbing1 = $model->KodePembimbing1;
//                        if ($model->save()) {
//                            if ($jmlBarisNilai == 0) {
//                                $commandNilaiMaster = Yii::app()->db->createCommand();
//                                $commandNilaiMaster->insert('prd_nilaimasterskripsi', array(
//                                    'NIM' => $model->NIM
//                                ));
//                            }
//                            Nilaimasterskripsi::model()->tuntasorno(Yii::app()->user->getUsername());
//                        }
//                        $this->redirect(array('view', 'id' => $model->idPendaftaran));
//                    }
//                } else if ($tes == 1 || $tes == 2) {
//                    if ($jml > 0) {
//                        $session = new CHttpSession;
//                        $session->open();
//                        $session['cekpendaftaran'] = "Tidak boleh melakukan pendaftaran sidang lebih dari sekali.";  // set session variable 'name3'
//                    } else {
//                        $model->idPengajuan = $model->idPengajuan;
//                        $model->KodePembimbing1 = $model->KodePembimbing1;
//                        if ($model->save()) {
//                            if ($tes == 1) {
//                                $command = Yii::app()->db->createCommand();
//                                $command->insert('prd_nilaidetilskirpsi', array(
//                                    'IdPendaftaran' => $model->idPendaftaran));
//                                if ($jmlBarisNilai == 0) {
//                                    $commandNilaiMaster = Yii::app()->db->createCommand();
//                                    $commandNilaiMaster->insert('prd_nilaimasterskripsi', array(
//                                        'NIM' => Yii::app()->user->getUsername(),
//                                        'idPendaftaran' => $model->idPendaftaran,
//                                        'idPengajuan' => $model->idPengajuan,
//                                    ));
//                                    Nilaimasterskripsi::model()->tuntasorno(Yii::app()->user->getUsername());
//                                }
//                            } else if ($tes == 2) {
//                                $command = Yii::app()->db->createCommand();
//                                $command->insert('prd_nilaidetilskirpsi', array(
//                                    'IdPendaftaran' => $model->idPendaftaran));
//                                if ($jmlBarisNilai == 0) {
//                                    $commandNilaiMaster = Yii::app()->db->createCommand();
//                                    $commandNilaiMaster->insert('prd_nilaimasterskripsi', array(
//                                        'NIM' => Yii::app()->user->getUsername(),
//                                        'idPendaftaran' => $model->idPendaftaran,
//                                        'idPengajuan' => $model->idPengajuan
//                                    ));
//                                    Nilaimasterskripsi::model()->tuntasorno(Yii::app()->user->getUsername());
//                                } else {
//                                    $commandNilaiMaster = Yii::app()->db->createCommand();
//                                    $commandNilaiMaster->update('prd_nilaimasterskripsi', array(
//                                        'idPendaftaran' => $model->idPendaftaran), 'NIM=:NIM', array(':NIM' => Yii::app()->user->getUsername()));
//                                }
//                            }
//                        }
//                        $this->redirect(array('view', 'id' => $model->idPendaftaran));
//                    }
//                } else if ($tes == 3) {
//                    if ($jml > 0) {
//                        $session = new CHttpSession;
//                        $session->open();
//                        $session['cekpendaftaran'] = "Tidak boleh melakukan pendaftaran sidang lebih dari sekali.";  // set session variable 'name3'
//                    } else {
//                        $model->idPengajuan = $model->idPengajuan;
//                        $model->KodePembimbing1 = $model->KodePembimbing1;
//                        if ($model->save()) {
//                            $command = Yii::app()->db->createCommand();
//                            $command->insert('prd_nilaikp', array(
//                                'NIM' => Yii::app()->user->getUsername(),
//                                'idPendaftaran' => $model->idPendaftaran,
//                                'idPengajuan' => $model->idPengajuan
//                            ));
//                        }
//                        $this->redirect(array('view', 'id' => $model->idPendaftaran));
//                    }
//                }
//            }
//        }
    }

    public function actionGetsidang($idJenis, $nim) {
        header('Content-type: application/json');
        $sql = "select pp.IDPengajuan,pp.NIM,pp.judul,pu.username from prd_pengajuan pp INNER JOIN prd_pembimbing pb on pp.idPengajuan=pb.idPengajuan INNER JOIN prd_user pu ON pu.id=pb.idDosen WHERE pp.IDJenisSidang=$idJenis and NIM=$nim";
        $data = Yii::app()->db->createCommand($sql)->queryRow();
        $id_pengajuan = $data["IDPengajuan"];
        $NIM = $data["NIM"];
        $judul = $data["judul"];
        $pembimbing = $data["username"];
        echo json_encode(array(
            "id_pengajuan" => $id_pengajuan,
            "nim" => $NIM,
            "judul" => $judul,
            "pembimbing" => $pembimbing));
    }

    public function actionSidangaktif() {
        $nmJenis = $_GET["nmJenis"];
        header('Content-type: application/json');
        $sql = "SELECT IdSidang FROM prd_sidangmaster ps inner join prd_jenissidang pj on pj.IDJenisSidang=ps.IDJenisSidang WHERE pj.NamaSidang='$nmJenis' AND ps.status=1";
        $data = Yii::app()->db->createCommand($sql)->queryRow();
        $idSidang = $data["IdSidang"];
        echo json_encode(array("idSidang" => $idSidang));
    }

    public function actionDaftarsidang() {
        header('Content-type: application/json');
        if (isset($_POST['idSidang'], $_POST['idPengajuan'], $_POST['idPendaftaran'])) {
            $model = new Pendaftaran();
            $model->IdSidang = $_POST['idSidang'];
            $model->NIM = $_POST['NIM'];
            $model->idPengajuan = $_POST['idPengajuan'];
            $model->Tanggal = date('Y-m-d H:i:s');
            $model->idPendaftaran = $_POST['idPendaftaran'];
            if ($model->validate() && $model->save()) {
                $status = "ok";
                echo json_encode(array("response" => $status));
            } else {
                $status = "gagal";
                echo json_encode(array("response" => $status));
            }
        } else {
            $status = "gagal";
            echo json_encode(array("post_response" => $status));
        }
    }

    public function actionListpendaftaran() {
        if (!isset($_GET['NIM'])) {
            $this->_sendResponse(501, sprintf('Error: Url Salah ', ""));
        } else {
            $nim = $_GET["NIM"];
        }

        $sql = "SELECT pp.idPendaftaran,pp.Tanggal,pj.Judul,js.IDJenisSidang,js.NamaSidang,pp.NIM,pm.Nama FROM prd_pendaftaran pp
                INNER JOIN prd_pengajuan pj ON pp.idPengajuan=pj.IDPengajuan
                INNER JOIN prd_mahasiswa pm ON pp.NIM=pm.NIM
                INNER JOIN prd_sidangmaster sm ON pp.IdSidang=sm.IdSidang
                INNER JOIN prd_jenissidang js ON sm.IDJenisSidang=js.IDJenisSidang WHERE pp.NIM=$nim";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        $response = array();
        foreach ($data as $data) {
            $baris["idPendaftaran"] = $data["idPendaftaran"];
            $baris["Tanggal"] = $data["Tanggal"];
            $baris["Judul"] = $data["Judul"];
            $baris["NamaSidang"] = $data["NamaSidang"];
            array_push($response, $baris);
        }
        echo json_encode($response);
    }

    public function actionUpload() {
        header('Content-type: application/json');
        if (!isset($_GET['idPendaftaran'])) {
            $this->_sendResponse(501, sprintf('Error: Url Salah ', ""));
        } else {
            $id = $_GET["idPendaftaran"];
            $sql = "SELECT 
  prd_pendaftaran.idPendaftaran,
  prd_persyaratan.idPersyaratan,
  prd_persyaratan.namaPersyaratan,
  prd_upload.namaFile, 
  prd_upload.idUpload 
FROM
  sttitpi_skkp.prd_persyaratan_jenis 
  INNER JOIN sttitpi_skkp.prd_jenissidang ON (prd_persyaratan_jenis.idJenisSidang = prd_jenissidang.IDJenisSidang) 
  INNER JOIN sttitpi_skkp.prd_persyaratan ON (prd_persyaratan_jenis.idPersyaratan = prd_persyaratan.idPersyaratan) 
  INNER JOIN sttitpi_skkp.prd_sidangmaster ON (prd_sidangmaster.IDJenisSidang = prd_jenissidang.IDJenisSidang) 
  INNER JOIN sttitpi_skkp.prd_pendaftaran  ON (prd_pendaftaran.IdSidang = prd_sidangmaster.IdSidang)
  LEFT JOIN sttitpi_skkp.prd_upload ON (prd_upload.idPersyaratan = prd_persyaratan.idPersyaratan) 
  AND (prd_upload.idPendaftaran = prd_pendaftaran.idPendaftaran)
WHERE prd_pendaftaran.idPendaftaran=$id";
            $data = Yii::app()->db->createCommand($sql)->queryAll();
            $response = array();
            foreach ($data as $data) {
                $baris["idPendaftaran"] = $data["idPendaftaran"];
                $baris["idPersyaratan"] = $data["idPersyaratan"];
                $baris["namaPersyaratan"] = $data["namaPersyaratan"];
                $baris["namaFile"] = $data["namaFile"];
                $baris["idUpload"] = $data["idUpload"];
                array_push($response, $baris);
            }
            echo json_encode($response);
        }

//        $this->render('view', array(
//            'model' => $this->loadModel($id),
//            'dataProviderUpload' => $dataProviderUpload,
//            'dataProviderPersetujuan' => $dataProviderPersetujuan,
//            'modelPenguji' => $modelPenguji,
//        ));
    }

    public function actionUploadimage1() {
//        $part = "./upload/";
        $filename = "img" . rand(9, 9999) . ".jpg";

//        $res = array();
//        $kode = "";
//        $pesan = "";

        $image = str_replace('data:image/png;base64,', '', $_POST['image']);
        $image = str_replace(' ', '+', $image);
        $data = base64_decode($image);
        $file = '../upload/' . $filename;

        file_put_contents($file, $data);

        $res['kode'] = 1;
        $res['pesan'] = "berhasil";

        echo json_encode($res);
    }

    public function actionUploadgambar() {
        require_once dirname(__FILE__) . '/FileHandler.php';
        $response = array();

        if (isset($_GET['apicall'])) {
            switch ($_GET['apicall']) {
                case 'upload':
                    $upload = new FileHandler();
                    $name = $_POST['namaFile'].'.jpg';//round(microtime(true) * 1000) . '.' . 'jpg';
                    $filedest = './uploads/' . $name;
                     //$sss->saveAs(Yii::app()->basePath . '/../persyaratan/' . $model->namaFile);
                    move_uploaded_file($_FILES['image']['tmp_name'], $filedest);
                    $stmt = Yii::app()->db->createCommand();
                    $stmt->insert('prd_upload', array(
                        'idPendaftaran' => $_POST['idPendaftaran'],
                        'namaFile' => $name,
                        'idPersyaratan' => $_POST['idPersyaratan'],
                    ));
                        $response['error'] = false;
                        $response['message'] = 'File Uploaded Successfullly';
                    break;

                case 'getallimages':

                    $upload = new FileHandler();
                    $response['error'] = false;
                    $response['images'] = $upload->getAllFiles();

                    break;
            }
        }

        echo json_encode($response);
    }

    public function getFileExtension($file) {
        $path_parts = pathinfo($file);
        return $path_parts['extension'];
    }

}

?>
