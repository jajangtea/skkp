<?php

class EWebUser extends CWebUser {

    protected $_model;

    protected function loadUser() {
        if ($this->_model === null) {
            $this->_model = User::model()->findByPk($this->id);
        }
        return $this->_model;
    }

    protected function loadPendaftaran($id) {
        $model = Pendaftaran::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function loadMahasiswa() {
        if ($this->_model === null) {
            $this->_model = Mahasiswa::model()->findByPk($this->NIM);
        }
        return $this->_model;
    }

    function getLevel() {
        $user = $this->loadUser();
        if ($user)
            return $user->level_id;
        return 100;
    }

    function getLengkap() {
        $session = new CHttpSession;
        $session->open();
        $idss=$session['ssidpendaftaran'];
        $model = $this->loadPendaftaran($idss);
        if ($model->keterangan == 'Lengkap') {
            return true;
        } else {
            return false;
        }
    }

    public function getUsername() {
        $user = $this->loadUser();
        if ($user)
            return $user->username;
    }

    public function getUserid() {
        $user = $this->loadUser();
        if ($user)
            return $this->id;
    }

    function getNamaMhs() {
        $mhs = $this->loadMahasiswa();
        if ($mhs)
            return $mhs->Nama;
        return 100;
    }

    public function getNamaDosen() {
        $user = $this->loadUser();
        if ($user)
            return $user->dosens->NamaDosen;
        return 100;
    }

    public function getuname() {
        $user = $this->loadUser();
        if ($user)
            return $user->username;
        return 100;
    }

}
