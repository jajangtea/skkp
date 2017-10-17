<?php

/**
 * This is the model class for table "prd_nilaidetilskirpsi".
 *
 * The followings are the available columns in table 'prd_nilaidetilskirpsi':
 * @property integer $idNilaiSkripsi
 * @property integer $IdPendaftaran
 * @property double $NilaiPenguji1
 * @property double $NIlaiPenguji2
 * @property double $NPraSidang
 *
 * The followings are the available model relations:
 * @property Pendaftaran $idPendaftaran
 */
class Nilaidetilskirpsi extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public static $NilaiPrasidang = 'NP';
    public static $NilaiSidang = 'NS';
    public $NIM,$nama,$judul,$idjenisSidang,$namaSidang,$bulan,$tahun;

    public function tableName() {
        return 'prd_nilaidetilskirpsi';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('IdPendaftaran', 'numerical', 'integerOnly' => true),
            array('NilaiPenguji1, NIlaiPenguji2, NPraSidang', 'numerical'),
            array('idNilaiSkripsi, IdPendaftaran,NIM, NilaiPenguji1,bulan,tahun NIlaiPenguji2,NPraSidang,idjenisSidang', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idPendaftaran' => array(self::BELONGS_TO, 'Pendaftaran', 'IdPendaftaran'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idNilaiSkripsi' => 'Id Nilai Skripsi',
            'IdPendaftaran' => 'Id Pendaftaran',
            'NilaiPenguji1' => 'Nilai Penguji 1',
            'NIlaiPenguji2' => 'Nilai Penguji 2',
            'NPraSidang' => 'Nilai Sidang',
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
    public function search() { {
            $criteria = new CDbCriteria();
            $criteria->join = 'INNER JOIN prd_pendaftaran pp ON (t.IdPendaftaran = pp.idPendaftaran)
            INNER JOIN prd_mahasiswa pm  ON (pm.NIM = pp.NIM)
            INNER JOIN prd_sidangmaster ps ON ps.IdSidang=pp.IdSidang
            INNER JOIN prd_jenissidang pj ON pj.IDJenisSidang=ps.IDJenisSidang
            INNER JOIN prd_periode pr ON ps.idPeriode=pr.idPeriode';
            
            
            $criteria->compare('pr.bulan', $this->bulan);
            $criteria->compare('pr.tahun', $this->tahun);
            $criteria->compare('pj.IDJenisSidang',$this->idjenisSidang);
            $criteria->compare('NIlaiPenguji1', $this->NilaiPenguji1);
            $criteria->compare('NIlaiPenguji2', $this->NIlaiPenguji2, true);
            $criteria->compare('idNilaiSkripsi', $this->idNilaiSkripsi);
            $criteria->compare('NPraSidang', $this->NPraSidang, true);
            $criteria->compare('pp.NIM', $this->NIM, true);
            $criteria->compare('pm.Nama', $this->nama, true);
            $criteria->compare('pp.Judul', $this->judul, true);
            $criteria->compare('ps.IDJenisSidang', $this->idjenisSidang, true);
            $criteria->compare('pj.NamaSidang', $this->namaSidang, true);
          
            return new CActiveDataProvider(get_class($this), array(
                'criteria' => $criteria
            ));
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Nilaidetilskirpsi the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tampilNpSkripsiAdmin() {
    $sqlNpSkripsi = "SELECT `prd_nilaidetilskirpsi`.`NilaiPenguji1`
    , `prd_nilaidetilskirpsi`.`NIlaiPenguji2`
    , `prd_nilaidetilskirpsi`.`NPraSidang`
    , `prd_nilaidetilskirpsi`.`idNilaiSkripsi`
    , `prd_pendaftaran`.`NIM`
    , `prd_pendaftaran`.`Judul`
    , `prd_pendaftaran`.`idPendaftaran`
    , `prd_sidangmaster`.`IDJenisSidang`
    , `prd_mahasiswa`.`Nama`
    , `prd_jenissidang`.`NamaSidang`
    FROM `sttitpi_skkp`.`prd_sidangmaster` 
    INNER JOIN `sttitpi_skkp`.`prd_jenissidang`  ON (`prd_sidangmaster`.`IDJenisSidang` = `prd_jenissidang`.`IDJenisSidang`)
    INNER JOIN `sttitpi_skkp`.`prd_pendaftaran`  ON (`prd_pendaftaran`.`IdSidang` = `prd_sidangmaster`.`IdSidang`)
    INNER JOIN `sttitpi_skkp`.`prd_nilaidetilskirpsi` ON (`prd_nilaidetilskirpsi`.`IdPendaftaran` = `prd_pendaftaran`.`idPendaftaran`)
    INNER JOIN `sttitpi_skkp`.`prd_mahasiswa` ON (`prd_pendaftaran`.`NIM` = `prd_mahasiswa`.`NIM`)
    WHERE (`prd_sidangmaster`.`IDJenisSidang` IN (1,2))
    ORDER BY `prd_sidangmaster`.`Tanggal`,`prd_sidangmaster`.`IDJenisSidang` ASC";

        $sqlCount = "select count(*) FROM `sttitpi_skkp`.`prd_sidangmaster` 
    INNER JOIN `sttitpi_skkp`.`prd_jenissidang`  ON (`prd_sidangmaster`.`IDJenisSidang` = `prd_jenissidang`.`IDJenisSidang`)
    INNER JOIN `sttitpi_skkp`.`prd_pendaftaran`  ON (`prd_pendaftaran`.`IdSidang` = `prd_sidangmaster`.`IdSidang`)
    INNER JOIN `sttitpi_skkp`.`prd_nilaidetilskirpsi` ON (`prd_nilaidetilskirpsi`.`IdPendaftaran` = `prd_pendaftaran`.`idPendaftaran`)
    INNER JOIN `sttitpi_skkp`.`prd_mahasiswa` ON (`prd_pendaftaran`.`NIM` = `prd_mahasiswa`.`NIM`)
    WHERE (`prd_sidangmaster`.`IDJenisSidang` IN (1,2))
    ORDER BY `prd_sidangmaster`.`Tanggal`,`prd_sidangmaster`.`IDJenisSidang` ASC";

        $count = Yii::app()->db->createCommand($sqlCount)->queryScalar();
        $dataProvidersqlNpSkripsi = new CSqlDataProvider($sqlNpSkripsi, array(
            'keyField' => 'idPendaftaran',
            'totalItemCount' => $count,
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));
        return $dataProvidersqlNpSkripsi;
    }

    public function tampilNpSkripsi($KodePembimbing) {
        $sqlNpSkripsi = "SELECT
    `prd_nilaidetilskirpsi`.`NilaiPenguji1`
    , `prd_nilaidetilskirpsi`.`NIlaiPenguji2`
    , `prd_nilaidetilskirpsi`.`NPraSidang`
    , `prd_nilaidetilskirpsi`.`idNilaiSkripsi`
    , `prd_pendaftaran`.`NIM`
    , `prd_pendaftaran`.`Judul`
    , `prd_pendaftaran`.`idPendaftaran`
    , `prd_sidangmaster`.`IDJenisSidang`
    , `prd_mahasiswa`.`Nama`
    , `prd_pengujiskripsi`.`idUser`
    , `prd_jenissidang`.`NamaSidang`
FROM
    `sttitpi_skkp`.`prd_sidangmaster`
    INNER JOIN `sttitpi_skkp`.`prd_jenissidang` 
        ON (`prd_sidangmaster`.`IDJenisSidang` = `prd_jenissidang`.`IDJenisSidang`)
    INNER JOIN `sttitpi_skkp`.`prd_pendaftaran` 
        ON (`prd_pendaftaran`.`IdSidang` = `prd_sidangmaster`.`IdSidang`)
    INNER JOIN `sttitpi_skkp`.`prd_nilaidetilskirpsi` 
        ON (`prd_nilaidetilskirpsi`.`IdPendaftaran` = `prd_pendaftaran`.`idPendaftaran`)
    INNER JOIN `sttitpi_skkp`.`prd_pengujiskripsi` 
        ON (`prd_pengujiskripsi`.`idPendaftaran` = `prd_pendaftaran`.`idPendaftaran`)
    INNER JOIN `sttitpi_skkp`.`prd_mahasiswa` 
        ON (`prd_pendaftaran`.`NIM` = `prd_mahasiswa`.`NIM`)
        WHERE prd_sidangmaster.IDJenisSidang IN(1,2) AND prd_pengujiskripsi.idUser = '$KodePembimbing'
        ORDER BY prd_sidangmaster.Tanggal ASC";


        $dataProvidersqlNpSkripsi = new CSqlDataProvider($sqlNpSkripsi, array(
            'keyField' => 'NIM',
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));
        return $dataProvidersqlNpSkripsi;
    }

}
