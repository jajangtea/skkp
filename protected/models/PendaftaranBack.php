<?php

/**
 * This is the model class for table "prd_pendaftaran".
 *
 * The followings are the available columns in table 'prd_pendaftaran':
 * @property integer $idPendaftaran
 * @property string $Tanggal
 * @property integer $NIM
 * @property integer $IdSidang
 * @property string $KodePembimbing1
 * @property string $KodePembimbing2
 * @property string $Judul
 *
 * The followings are the available model relations:
 * @property Nilaidetilskirpsi[] $nilaidetilskirpsis
 * @property Nilaimasterskripsi[] $nilaimasterskripsis
 * @property Mahasiswa $nIM
 * @property Sidangmaster $idSidang
 * @property Dosen $kodePembimbing1
 * @property Dosen $kodePembimbing2
 * @property Sidangdetil[] $sidangdetils
 */
class Pendaftaran extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $IDJenisSidang, $jmlsyarat, $telahupload, $status;

    public function tableName() {
        return 'prd_pendaftaran';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('NIM,idPendaftaran, IdSidang,IDJenisSidang', 'numerical', 'integerOnly' => true),
            array('IdSidang', 'required', 'message' => 'Sidang harus dipilih.'),
            array('KodePembimbing1', 'required', 'message' => 'Pembimbing 1 tidak boleh kosong.'),
            array('KodePembimbing2', 'required', 'message' => 'Pembimbing 2 tidak boleh kosong/Pilih "Tidak Ada" jika hanya 1 Pembimbing.'),
            array('Judul', 'required', 'message' => 'Judul tidak boleh kosong.'),
            array('KodePembimbing1, KodePembimbing2', 'length', 'max' => 3),
            array('Tanggal, Judul', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPendaftaran, Tanggal, NIM, IdSidang,status, KodePembimbing1, KodePembimbing2, Judul', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'nilaidetilskirpsis' => array(self::HAS_MANY, 'Nilaidetilskirpsi', 'IdPendaftaran'),
            'nilaimasterskripsis' => array(self::HAS_MANY, 'Nilaimasterskripsi', 'IdPendaftaran'),
            'nIM' => array(self::BELONGS_TO, 'Mahasiswa', 'NIM'),
            'idSidang' => array(self::BELONGS_TO, 'Sidangmaster', 'IdSidang'),
            'kodePembimbing1' => array(self::BELONGS_TO, 'Dosen', 'KodePembimbing1'),
            'kodePembimbing2' => array(self::BELONGS_TO, 'Dosen', 'KodePembimbing2'),
            'persyaratanKps' => array(self::HAS_MANY, 'PersyaratanKp', 'idPendafraran'),
            'persyaratanPrasidangs' => array(self::HAS_MANY, 'PersyaratanPrasidang', 'idPendaftaran'),
            'persyaratanSidangs' => array(self::HAS_MANY, 'PersyaratanSidang', 'idPendaftaran'),
            'sidangdetils' => array(self::HAS_MANY, 'Sidangdetil', 'IdPendaftaran'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idPendaftaran' => 'Id Pendaftaran',
            'Tanggal' => 'Tanggal',
            'NIM' => 'Nim',
            'IdSidang' => 'Id Sidang',
            'KodePembimbing1' => 'Kode Pembimbing1',
            'KodePembimbing2' => 'Kode Pembimbing2',
            'Judul' => 'Judul',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.
        if (Yii::app()->user->getLevel() == 2) {
            $criteria = new CDbCriteria(array
                (
                'condition' => 'NIM=:NIM',
                'params' => array(':NIM' => Yii::app()->user->name),
            ));
        } else {
            $criteria = new CDbCriteria();
            $criteria->join = 'INNER JOIN prd_sidangmaster sm ON t.IdSidang=sm.IdSidang INNER JOIN prd_jenissidang js ON js.IDJenisSidang=sm.IDJenisSidang';
            $criteria->order = 'js.NamaSidang';
        }
        $criteria->compare('js.IDJenisSidang', $this->IDJenisSidang);
        $criteria->compare('sm.status', $this->status);
        $criteria->compare('idPendaftaran', $this->idPendaftaran);
        $criteria->compare('Tanggal', $this->Tanggal, true);
        $criteria->compare('NIM', $this->NIM);
        $criteria->compare('js.IDJenisSidang', $this->IDJenisSidang);
        $criteria->compare('KodePembimbing1', $this->KodePembimbing1, true);
        $criteria->compare('KodePembimbing2', $this->KodePembimbing2, true);
        // $criteria->compare('IdSidang', $this->IdSidang, true);
        $criteria->compare('Judul', $this->Judul, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchaktif() {
        // @todo Please modify the following code to remove attributes that should not be searched.
        if (Yii::app()->user->getLevel() == 2) {
            $criteria = new CDbCriteria(array
                (
                'condition' => 'NIM=:NIM',
                'params' => array(':NIM' => Yii::app()->user->name),
            ));
        } else {
            $criteria = new CDbCriteria(array
                (
                'condition' => 'sm.status=1',
            ));
            $criteria->join = 'INNER JOIN prd_sidangmaster sm ON t.IdSidang=sm.IdSidang INNER JOIN prd_jenissidang js ON js.IDJenisSidang=sm.IDJenisSidang';
            $criteria->order = 'js.NamaSidang';
        }
        $criteria->compare('idPendaftaran', $this->idPendaftaran);
        $criteria->compare('Tanggal', $this->Tanggal, true);
        $criteria->compare('NIM', $this->NIM);
        $criteria->compare('js.IDJenisSidang', $this->IDJenisSidang);
        $criteria->compare('KodePembimbing1', $this->KodePembimbing1, true);
        $criteria->compare('KodePembimbing2', $this->KodePembimbing2, true);
        // $criteria->compare('IdSidang', $this->IdSidang, true);
        $criteria->compare('Judul', $this->Judul, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Pendaftaran the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getNamaSidang() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(Sidangmaster::model()->with('iDJenisSidang')->findAll('status=1'), 'IdSidang', 'iDJenisSidang.NamaSidang');
    }

    public function getIDJenisSidang() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(Sidangmaster::model()->with('iDJenisSidang')->findAll('status=1'), 'IDJenisSidang', 'iDJenisSidang.NamaSidang');
    }

    public function getTanggalNamaSidang() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(Sidangmaster::model()->with('iDJenisSidang')->findAll('status=1'), 'Tanggal', 'Tanggal');
    }

    public function getMahasiswa() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(Mahasiswa::model()->findAll(), 'NIM', 'Nama');
    }

    public function getJenisSidang() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(Jenissidang::model()->findAll(), 'IDJenisSidang', 'NamaSidang');
    }

    public function getJenisSidangProposal() {
        return CHtml::listData(Jenissidang::model()->findAll('IDJenisSidang in(5,6)'), 'IDJenisSidang', 'NamaSidang');
    }

    public function getPembimbing() {
        return CHtml::listData(Dosen::model()->findAll(), 'KodeDosen', 'NamaDosen');
    }

    public function getDosen() {
        return CHtml::listData(Dosen::model()->findAll(), 'IdUser', 'KodeDosen');
    }

    public function cekPendaftaran($nim) {
        $sql = "select count(*) from prd_pendaftaran p left join prd_sidangmaster sm on p.IdSidang=sm.IdSidang where p.nim='$nim' and sm.status=1 and  sm.IDJenisSidang in(1,2,3)"; // and sm.IDJenisSidang=".$kompre."";
        $command = Yii::app()->db->createCommand($sql)->queryScalar();
        return $command;
    }

    public function cekKompre($nim) {
        $sql = "select count(*) from prd_pendaftaran p left join prd_sidangmaster sm on p.IdSidang=sm.IdSidang where p.nim='$nim' and sm.status=1 and  sm.IDJenisSidang=4"; // and sm.IDJenisSidang=".$kompre."";
        $command = Yii::app()->db->createCommand($sql)->queryScalar();
        return $command;
    }

    public function cekNilaiMaster($nim) {
        $sql = "select count(*) from prd_nilaimasterskripsi where nim=$nim"; // and sm.IDJenisSidang=".$kompre."";
        $command = Yii::app()->db->createCommand($sql)->queryScalar();
        return $command;
    }

    public function getTanggalSidang() {
        $sql = "SELECT tanggal FROM prd_sidangmaster WHERE STATUS=1;";
        $command = Yii::app()->db->createCommand($sql)->queryScalar();
        return $command;
    }

    public function hitungjmlsidang($idjenis) {
        if ($idjenis == "")
            $idjenis = 0;
        $sql = "SELECT COUNT(*) FROM prd_pendaftaran p 
            INNER JOIN prd_sidangmaster sm ON p.IdSidang=sm.IdSidang 
            INNER JOIN prd_jenissidang js ON sm.IdJenisSidang=js.IdJenisSidang 
            WHERE js.IdJenisSidang=" . $idjenis . " AND sm.STATUS=1";

        $command = Yii::app()->db->createCommand($sql)->queryScalar();
        return $command;
    }

    public function tampilUpload($id) {
        $sqlUpload = "SELECT 
  prd_pendaftaran.idPendaftaran,
  prd_persyaratan.idPersyaratan,
  prd_persyaratan.namaPersyaratan,
  prd_upload.namaFile, 
  prd_upload.idUpload 
FROM
  sttitpi_skkp.prd_persyaratan_jenis 
  INNER JOIN sttitpi_skkp.prd_jenissidang 
    ON (
      prd_persyaratan_jenis.idJenisSidang = prd_jenissidang.IDJenisSidang
    ) 
  INNER JOIN sttitpi_skkp.prd_persyaratan 
    ON (
      prd_persyaratan_jenis.idPersyaratan = prd_persyaratan.idPersyaratan
    ) 
  INNER JOIN sttitpi_skkp.prd_sidangmaster 
    ON (
      prd_sidangmaster.IDJenisSidang = prd_jenissidang.IDJenisSidang
    ) 
  INNER JOIN sttitpi_skkp.prd_pendaftaran 
    ON (
      prd_pendaftaran.IdSidang = prd_sidangmaster.IdSidang
    ) 
  LEFT JOIN sttitpi_skkp.prd_upload 
    ON (
      prd_upload.idPersyaratan = prd_persyaratan.idPersyaratan
    ) 
    AND (
      prd_upload.idPendaftaran = prd_pendaftaran.idPendaftaran
    ) 
WHERE prd_pendaftaran.idPendaftaran=$id";

        $dataProviderUpload = new CSqlDataProvider($sqlUpload, array(
            'keyField' => 'idPendaftaran',
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));

        return $dataProviderUpload;
    }

    public function tampilUploadPengajuan($idPengajuan, $IDJenisSidang) {
        $sqlUpload = "SELECT  `prd_persyaratan`.`namaPersyaratan`
    , `prd_uploadProposal`.`namaFile`
    , `prd_pengajuan`.`IDJenisSidang`
    , `prd_pengajuan`.`IDPengajuan`
    , `prd_uploadProposal`.`idUpload`
    , `prd_jenissidang`.`NamaSidang`
    , `prd_persyaratan`.`idPersyaratan`
    FROM `prd_pengajuan`
    INNER JOIN `prd_jenissidang` 
        ON (`prd_pengajuan`.`IDJenisSidang` = `prd_jenissidang`.`IDJenisSidang`)
    INNER JOIN `prd_persyaratan_jenis` 
        ON (`prd_persyaratan_jenis`.`idJenisSidang` = `prd_jenissidang`.`IDJenisSidang`)
    INNER JOIN `prd_persyaratan` 
        ON (`prd_persyaratan_jenis`.`idPersyaratan` = `prd_persyaratan`.`idPersyaratan`)
    LEFT JOIN `prd_uploadProposal` 
        ON (`prd_uploadProposal`.`idPengajuan` = `prd_pengajuan`.`IDPengajuan`) AND (`prd_uploadProposal`.`idPersyaratan` = `prd_persyaratan`.`idPersyaratan`) where `prd_persyaratan_jenis`.`idJenisSidang` =$IDJenisSidang and `prd_pengajuan`.`IDPengajuan`=$idPengajuan";
        $dataProviderUpload = new CSqlDataProvider($sqlUpload, array(
            'keyField' => 'IDPengajuan',
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));

        return $dataProviderUpload;
    }

    public function cekPersyaratan($id) {
        $syarat = Yii::app()->db->createCommand("SELECT COUNT(*) AS jml FROM prd_pendaftaran pp 
        INNER JOIN  prd_sidangmaster ps ON pp.idsidang=ps.idsidang
        INNER JOIN prd_jenissidang pj ON ps.idjenissidang=pj.idjenissidang
        INNER JOIN prd_persyaratan_jenis pr ON pj.idjenissidang=pr.idJenisSidang
        INNER JOIN prd_persyaratan pst ON pr.idPersyaratan=pst.idPersyaratan
       LEFT JOIN prd_upload pu 
    ON (
      pu.idPersyaratan = pst.idPersyaratan
    ) 
    AND (
      pu.idPendaftaran = pp.idPendaftaran
    ) 
        WHERE pp.idPendaftaran=$id")->queryScalar();

        $upload = Yii::app()->db->createCommand("SELECT COUNT(*) FROM prd_upload WHERE idPendaftaran=$id")->queryScalar();
        if ($syarat != $upload) {
            Yii::app()->db->createCommand("UPDATE prd_pendaftaran set keterangan='Tidak Lengkap' where idPendaftaran=$id")->execute();
            return "Syarat tidak Lengkap";
        } else {
            Yii::app()->db->createCommand("UPDATE prd_pendaftaran set keterangan='Lengkap' where idPendaftaran=$id")->execute();
            return "Syarat Lengkap";
        }
    }

    public function cekPersyaratanProposal($idJenisProposal, $idPengajuan) {
        $sqlSyarat = "
            SELECT COUNT(*) AS jml FROM prd_pengajuan pp 
            INNER JOIN prd_jenissidang pj ON pp.idjenissidang=pj.idjenissidang
            INNER JOIN prd_persyaratan_jenis pr ON pj.idjenissidang=pr.idJenisSidang
            INNER JOIN prd_persyaratan pst ON pr.idPersyaratan=pst.idPersyaratan
            LEFT JOIN prd_uploadProposal pu ON (pu.idPersyaratan = pst.idPersyaratan) AND (pu.idPengajuan = pp.idPengajuan) 
            WHERE    pj.idjenissidang =$idJenisProposal and  pp.idPengajuan =$idPengajuan";
        $syarat = Yii::app()->db->createCommand($sqlSyarat)->queryScalar();
        $sqlUpload = "
            SELECT COUNT(*) AS Jml 
            FROM `dbPengajuan`.`prd_uploadProposal` 
            INNER JOIN `dbPengajuan`.`prd_pengajuan` ON ( `prd_uploadProposal`.`idPengajuan` = `prd_pengajuan`.`IDPengajuan` ) 
            INNER JOIN `dbPengajuan`.`prd_persyaratan` ON ( `prd_uploadProposal`.`idPersyaratan` = `prd_persyaratan`.`idPersyaratan` ) 
            INNER JOIN `dbPengajuan`.`prd_jenissidang` ON ( `prd_pengajuan`.`IDJenisSidang` = `prd_jenissidang`.`IDJenisSidang` ) 
            INNER JOIN `dbPengajuan`.`prd_mahasiswa` ON ( `prd_pengajuan`.`NIM` = `prd_mahasiswa`.`NIM` ) 
            WHERE prd_pengajuan.IDJenisSidang=$idJenisProposal and prd_pengajuan.IDPengajuan=$idPengajuan";
        $upload = Yii::app()->db->createCommand($sqlUpload)->queryScalar();

        if ($syarat != $upload) {
            // return "$syarat|$upload";
            return "Syarat tidak Lengkap";
        } else {
            return "Syarat Lengkap";
            // return "$syarat|$upload";
        }
    }

    public function generateKode_Pendaftaran() {
        $_d = date("ym");
        $_i = "20";
        $_left = $_i . $_d;
        $_first = "0001";
        $_len = strlen($_left);
        $no = $_left . $_first;

        $last_po = $this->find(
                array(
                    "select" => "idPendaftaran",
                    "condition" => "left(idPendaftaran, " . $_len . ") = :_left",
                    "params" => array(":_left" => $_left),
                    "order" => "idPendaftaran DESC"
        ));

        if ($last_po != null) {
            $_no = substr($last_po->idPendaftaran, $_len);
            $_no++;
            $_no = substr("0000", strlen($_no)) . $_no;
            $no = $_left . $_no;
        }

        return $no;
    }

}
