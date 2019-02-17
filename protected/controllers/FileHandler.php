<?php

/**
 * Created by PhpStorm.
 * User: Belal
 * Date: 10/5/2017
 * Time: 11:30 AM
 */
class FileHandler {

    private $con;

    public function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';

        $db = new DbConnect();
        $this->con = $db->connect();
    }

 

    public function getAllFiles() {
        $stmt = $this->con->prepare("SELECT id, description, url FROM images ORDER BY id DESC");
        $stmt->execute();
        $stmt->bind_result($id, $desc, $url);

        $images = array();

        while ($stmt->fetch()) {

            $temp = array();
            $absurl = 'http://' . gethostbyname(gethostname()) . '/ImageUploadApi' . UPLOAD_PATH . $url;
            $temp['id'] = $id;
            $temp['desc'] = $desc;
            $temp['url'] = $absurl;
            array_push($images, $temp);
        }

        return $images;
    }

}
