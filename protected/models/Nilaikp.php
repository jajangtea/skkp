<?php

/**
 * This is the model class for table "prd_nilaikp".
 *
 * The followings are the available columns in table 'prd_nilaikp':
 * @property integer $IdNilaiKp
 * @property integer $NIM
 * @property double $NilaiPembimbing
 * @property double $NilaiPenguji
 * @property double $NilaiPerusahaan
 * @property double $NA
 * @property string $Index
 *
 * The followings are the available model relations:
 * @property Mahasiswa $nIM
 */
class Nilaikp extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $bulan,$tahun;
    public function tableName() {
        return 'prd_nilaikp';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('NIM,NilaiPerusahaan,NilaiPenguji,idPengajuan,NilaiPembimbing', 'required'),
            array('NIM', 'numerical', 'integerOnly' => true),
            array('NilaiPembimbing, NilaiPenguji, NilaiPerusahaan, NA', 'numerical'),
            array('Index', 'length', 'max' => 2),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdNilaiKp, NIM, NilaiPembimbing, NilaiPenguji, NilaiPerusahaan,bulan,tahun, NA, Index', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'nIM' => array(self::BELONGS_TO, 'Mahasiswa', 'NIM'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IdNilaiKp' => 'Id Nilai Kp',
            'NIM' => 'Nim',
            'NilaiPembimbing' => 'Nilai Pembimbing',
            'NilaiPenguji' => 'Nilai Penguji',
            'NilaiPerusahaan' => 'Nilai Perusahaan',
            'NA' => 'Na',
            'Index' => 'Index',
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
            $criteria = new CDbCriteria(array(
                'condition' => 'NIM=:NIM',
                'params' => array(':NIM' => Pendaftaran::model()->with('')),
            ));
        } else {
            $criteria = new CDbCriteria();
            $criteria->join='INNER JOIN prd_pendaftaran pp ON t.idPendaftaran=pp.idPendaftaran '
                    . 'INNER JOIN prd_sidangmaster ps ON pp.IdSidang=ps.IdSidang '
                    . 'INNER JOIN prd_periode pr ON ps.idPeriode=pr.idPeriode';
        }
        
        $criteria->compare('pr.bulan', $this->bulan);
        $criteria->compare('pr.tahun', $this->tahun);
        $criteria->compare('t.NIM', $this->NIM);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Nilaikp the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function tampilNilaiPengujiKp($IDJenisSidang,$KodePembimbing)
    {
        $sqlPengujiKp="SELECT
        prd_pengujikp.idPengujiKp,
        prd_pengujikp.idPendaftaran,
        prd_pengujikp.idUser,
        prd_pendaftaran.NIM,
        prd_pendaftaran.Judul,
        prd_sidangmaster.IDJenisSidang,
        prd_jenissidang.NamaSidang,
        prd_user.username,
        prd_mahasiswa.Nama,
        prd_nilaikp.NilaiPembimbing,
        prd_nilaikp.NilaiPenguji,
        prd_nilaikp.NilaiPerusahaan,
        prd_nilaikp.NA,
        prd_nilaikp.Index
        FROM
        prd_pengujikp
        INNER JOIN prd_pendaftaran ON prd_pengujikp.idPendaftaran = prd_pendaftaran.idPendaftaran
        INNER JOIN prd_sidangmaster ON prd_pendaftaran.IdSidang = prd_sidangmaster.IdSidang
        INNER JOIN prd_jenissidang ON prd_sidangmaster.IDJenisSidang = prd_jenissidang.IDJenisSidang
        INNER JOIN prd_user ON prd_pengujikp.idUser = prd_user.id
        INNER JOIN prd_mahasiswa ON prd_mahasiswa.IdUser = prd_user.id OR prd_pendaftaran.NIM = prd_mahasiswa.NIM
        INNER JOIN prd_nilaikp ON prd_nilaikp.NIM = prd_mahasiswa.NIM WHERE prd_sidangmaster.IDJenisSidang = '$IDJenisSidang' AND prd_user.username = '$KodePembimbing'
        ORDER BY prd_sidangmaster.Tanggal DESC";
        
        $sqlCount="SELECT COUNT(*)
        FROM
        prd_pengujikp
        INNER JOIN prd_pendaftaran ON prd_pengujikp.idPendaftaran = prd_pendaftaran.idPendaftaran
        INNER JOIN prd_sidangmaster ON prd_pendaftaran.IdSidang = prd_sidangmaster.IdSidang
        INNER JOIN prd_jenissidang ON prd_sidangmaster.IDJenisSidang = prd_jenissidang.IDJenisSidang
        INNER JOIN prd_user ON prd_pengujikp.idUser = prd_user.id
        INNER JOIN prd_mahasiswa ON prd_mahasiswa.IdUser = prd_user.id OR prd_pendaftaran.NIM = prd_mahasiswa.NIM
        INNER JOIN prd_nilaikp ON prd_nilaikp.NIM = prd_mahasiswa.NIM WHERE prd_sidangmaster.IDJenisSidang = '$IDJenisSidang' AND prd_user.username = '$KodePembimbing'
        ORDER BY prd_sidangmaster.Tanggal DESC";
        
        $count = Yii::app()->db->createCommand($sqlCount)->queryScalar();
        $dataProviderNilaiPengujiKp = new CSqlDataProvider($sqlPengujiKp, array(
            'keyField' => 'NIM',
            'totalItemCount' => $count,
            'pagination' => array(
                'pageSize' => 20,
            ),
        ));
        return $dataProviderNilaiPengujiKp;
    }

    public function tampilNilai($IDJenisSidang,$KodePembimbing1) {
        $sqlNilaiKp = "SELECT
        prd_mahasiswa.NIM,
        prd_mahasiswa.Nama,
        prd_pendaftaran.KodePembimbing1,
        prd_pendaftaran.KodePembimbing2,
        prd_pendaftaran.Judul,
        prd_sidangmaster.Tanggal,
        prd_jenissidang.NamaSidang,
        prd_sidangmaster.status,
        prd_dosen.NamaDosen,
        prd_dosen.IdUser,
        prd_sidangmaster.Tanggal,
        prd_sidangmaster.IDJenisSidang,
        prd_nilaikp.IdNilaiKp,
        prd_nilaikp.NilaiPembimbing,
        prd_nilaikp.NilaiPenguji,
        prd_nilaikp.NilaiPerusahaan,
        prd_nilaikp.NA,
        prd_nilaikp.Index,
        prd_nilaikp.idPengajuan
        FROM sttitpi_skkp.prd_sidangmaster
        INNER JOIN sttitpi_skkp.prd_jenissidang ON ( prd_sidangmaster.IDJenisSidang = prd_jenissidang.IDJenisSidang)
        INNER JOIN sttitpi_skkp.prd_pendaftaran ON ( prd_pendaftaran.IdSidang = prd_sidangmaster.IdSidang)
        INNER JOIN sttitpi_skkp.prd_mahasiswa ON ( prd_pendaftaran.NIM = prd_mahasiswa.NIM)
        LEFT JOIN sttitpi_skkp.prd_dosen ON (prd_pendaftaran.KodePembimbing1 = prd_dosen.KodeDosen)
        LEFT JOIN sttitpi_skkp.prd_nilaikp ON (prd_nilaikp.NIM = prd_mahasiswa.NIM)
        WHERE prd_sidangmaster.IDJenisSidang = '$IDJenisSidang' AND prd_pendaftaran.KodePembimbing1 = '$KodePembimbing1'
        ORDER BY prd_sidangmaster.Tanggal DESC";
        
        $sqlCount = "SELECT COUNT(*)
        FROM sttitpi_skkp.prd_sidangmaster
        INNER JOIN sttitpi_skkp.prd_jenissidang ON ( prd_sidangmaster.IDJenisSidang = prd_jenissidang.IDJenisSidang)
        INNER JOIN sttitpi_skkp.prd_pendaftaran ON ( prd_pendaftaran.IdSidang = prd_sidangmaster.IdSidang)
        INNER JOIN sttitpi_skkp.prd_mahasiswa ON ( prd_pendaftaran.NIM = prd_mahasiswa.NIM)
        LEFT JOIN sttitpi_skkp.prd_dosen ON (prd_pendaftaran.KodePembimbing1 = prd_dosen.KodeDosen)
        LEFT JOIN sttitpi_skkp.prd_nilaikp ON (prd_nilaikp.NIM = prd_mahasiswa.NIM)
        WHERE prd_sidangmaster.IDJenisSidang = '$IDJenisSidang' AND prd_pendaftaran.KodePembimbing1 = '$KodePembimbing1'
        ORDER BY prd_sidangmaster.Tanggal DESC";
       
        $count = Yii::app()->db->createCommand($sqlCount)->queryScalar();
        $dataProviderNilaiKp = new CSqlDataProvider($sqlNilaiKp, array(
            'keyField' => 'NIM',
            'totalItemCount' => $count,
            'pagination' => array(
                'pageSize' => 100,
            ),
        ));

        return $dataProviderNilaiKp;
        
    }
    
    public function tampilNilaiPembimbingSkripsi($IDJenisSidang,$KodePembimbing1) {
        $sqlNilaiKp = "SELECT
        prd_mahasiswa.NIM,
        prd_mahasiswa.Nama,
        prd_pendaftaran.KodePembimbing1,
        prd_pendaftaran.KodePembimbing2,
        prd_pendaftaran.Judul,
        prd_pendaftaran.NIM,
        prd_pendaftaran.IdPendaftaran,
        prd_sidangmaster.Tanggal,
        prd_jenissidang.NamaSidang,
        prd_sidangmaster.status,
        prd_dosen.NamaDosen,
        prd_dosen.IdUser,
        prd_sidangmaster.Tanggal,
        prd_sidangmaster.IDJenisSidang,
        prd_nilaimasterskripsi.NPembimbing,
        prd_nilaimasterskripsi.IdNMSkripsi,
        prd_nilaimasterskripsi.idPengajuan
        
        FROM sttitpi_skkp.prd_sidangmaster
        INNER JOIN sttitpi_skkp.prd_jenissidang ON ( prd_sidangmaster.IDJenisSidang = prd_jenissidang.IDJenisSidang)
        INNER JOIN sttitpi_skkp.prd_pendaftaran ON ( prd_pendaftaran.IdSidang = prd_sidangmaster.IdSidang)
        INNER JOIN sttitpi_skkp.prd_mahasiswa ON ( prd_pendaftaran.NIM = prd_mahasiswa.NIM)
        LEFT JOIN sttitpi_skkp.prd_dosen ON (prd_pendaftaran.KodePembimbing1 = prd_dosen.KodeDosen)
        LEFT JOIN sttitpi_skkp.prd_nilaimasterskripsi ON (prd_nilaimasterskripsi.NIM = prd_pendaftaran.NIM)
        WHERE prd_sidangmaster.IDJenisSidang = '$IDJenisSidang' AND prd_pendaftaran.KodePembimbing1 = '$KodePembimbing1'
        ORDER BY prd_sidangmaster.Tanggal DESC";
        $sqlCount = "SELECT COUNT(*)
        FROM sttitpi_skkp.prd_sidangmaster
        INNER JOIN sttitpi_skkp.prd_jenissidang ON ( prd_sidangmaster.IDJenisSidang = prd_jenissidang.IDJenisSidang)
        INNER JOIN sttitpi_skkp.prd_pendaftaran ON ( prd_pendaftaran.IdSidang = prd_sidangmaster.IdSidang)
        INNER JOIN sttitpi_skkp.prd_mahasiswa ON ( prd_pendaftaran.NIM = prd_mahasiswa.NIM)
        LEFT JOIN sttitpi_skkp.prd_dosen ON (prd_pendaftaran.KodePembimbing1 = prd_dosen.KodeDosen)
        LEFT JOIN sttitpi_skkp.prd_nilaimasterskripsi ON (prd_nilaimasterskripsi.NIM = prd_pendaftaran.NIM)
        WHERE prd_sidangmaster.IDJenisSidang = '$IDJenisSidang' AND prd_pendaftaran.KodePembimbing1 = '$KodePembimbing1'
        ORDER BY prd_sidangmaster.Tanggal DESC";
        
        $count = Yii::app()->db->createCommand($sqlCount)->queryScalar();
        $dataProviderNilaiKp = new CSqlDataProvider($sqlNilaiKp, array(
            'keyField' => 'NIM',
            'totalItemCount' => $count,
            'pagination' => array(
                'pageSize' => 100,
            ),
        ));

        return $dataProviderNilaiKp;
        
    }

}
