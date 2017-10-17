<?php

/**
 * This is the model class for table "prd_nilaimasterskripsi".
 *
 * The followings are the available columns in table 'prd_nilaimasterskripsi':
 * @property string $IdNMSkripsi
 * @property integer $NIM
 * @property double $NKompre
 * @property double $NPraSidang
 * @property double $NSidangSkripsi
 * @property double $NPembimbing
 * @property double $NA
 * @property string $Index
 * @property string $status 
 *
 * The followings are the available model relations:
 * @property Pendaftaran $idPendaftaran
 */
class Nilaimasterskripsi extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $bulan, $tahun;

    public function tableName() {
        return 'prd_nilaimasterskripsi';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('NIM', 'numerical', 'integerOnly' => true),
            array('NKompre, NPraSidang, NSidangSkripsi, NPembimbing, NA', 'numerical'),
            array('Index', 'length', 'max' => 2),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdNMSkripsi, NIM, NKompre, NPraSidang, NSidangSkripsi,idPendaftaran,status,bulan,tahun, NPembimbing, NA, Index', 'safe', 'on' => 'search'),
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
            'idPendaftaran0' => array(self::BELONGS_TO, 'Pendaftaran', 'idPendaftaran'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IdNMSkripsi' => 'Id Nmskripsi',
            'NIM' => 'NIM',
            'NKompre' => 'Nilai kompre',
            'NPraSidang' => 'Nilai Pra Sidang',
            'NSidangSkripsi' => 'Nilai Sidang Skripsi',
            'NPembimbing' => 'Nilai pembimbing',
            'NA' => 'Nilai Akhir',
            'Index' => 'Index',
            'idPendaftaran' => 'idPendaftaran',
            'status' => 'Status',
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
            $criteria = new CDbCriteria();
        } else {
            $criteria = new CDbCriteria();
            $criteria->join = "INNER JOIN prd_pendaftaran p ON p.IdPendaftaran=t.idPendaftaran "
                    . "INNER JOIN prd_sidangmaster ps ON p.IdSidang=ps.IdSidang "
                    . "INNER JOIN prd_periode pp ON ps.idPeriode=pp.idPeriode";
        }

        $criteria->compare('pp.bulan', $this->bulan);
        $criteria->compare('pp.tahun', $this->tahun);
        $criteria->compare('IdNMSkripsi', $this->IdNMSkripsi, true);
        $criteria->compare('p.NIM', $this->NIM);
        $criteria->compare('NKompre', $this->NKompre);
        $criteria->compare('NPraSidang', $this->NPraSidang);
        $criteria->compare('NSidangSkripsi', $this->NSidangSkripsi);
        $criteria->compare('NPembimbing', $this->NPembimbing);
        $criteria->compare('NA', $this->NA);
        $criteria->compare('t.status', $this->status);
        $criteria->compare('Index', $this->Index, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchNIM($mhsNim) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        if (Yii::app()->user->getLevel() == 2) {
            $criteria = new CDbCriteria("Join pendaftaran p on p.IdPendaftaran=t.IdPendaftaran where p.nim=$this->idPendaftaran->nIM");
        } else {
            $criteria = new CDbCriteria();
        }
        $criteria->compare('IdNMSkripsi', $this->IdNMSkripsi, true);
        $criteria->compare('NIM', $mhsNim);
        $criteria->compare('NKompre', $this->NKompre);
        $criteria->compare('NPraSidang', $this->NPraSidang);
        $criteria->compare('NSidangSkripsi', $this->NSidangSkripsi);
        $criteria->compare('NPembimbing', $this->NPembimbing);
        $criteria->compare('NA', $this->NA);
        $criteria->compare('Index', $this->Index, true);
        $criteria->compare('idPendaftaran', $this->idPendaftaran);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Nilaimasterskripsi the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function loadModelNilaiMaster($NIM) {
        $sql = "SELECT COUNT(*) FROM prd_nilaimasterskripsi where NIM=$NIM";
        $numClients = Yii::app()->db->createCommand($sql)->queryScalar();
        return $numClients;
    }

    public function ambilNilaiMaster($idPendaftaran) {
        $sql = "SELECT * FROM prd_nilaimasterskripsi where IdPendaftaran=$idPendaftaran";
        $data = Yii::app()->db->createCommand($sql)->queryRow();
        return $data;
    }

    public function ambilNilaiMasterId($idpk) {
        $sql = "SELECT * FROM prd_nilaimasterskripsi where IdNMSkripsi=$idpk";
        $data = Yii::app()->db->createCommand($sql)->queryRow();
        return $data;
    }

    public function hitung_na($npembimbing25, $nprasidang25, $nsidangkompre20, $sidngta30) {
        $na = (0.25 * $npembimbing25) + (0.25 * $nprasidang25) + (0.2 * $nsidangkompre20) + (0.3 * $sidngta30);
        return $na;
    }

    public function nilai_khuruf($na) {
        if ($na > 0 && $na < 70) {
            return 'C';
        } elseif ($na >= 70 && $na < 80) {
            return 'B';
        } elseif ($na >= 80 && $na <= 100) {
            return 'A';
        }
    }

    public function tuntasorno($nim) {
        $model = Nilaimasterskripsi::model()->find("NIM=$nim");
        if ($model->NKompre == 0 || $model->NPraSidang == 0 || $model->NSidangSkripsi == 0 || $model->NPembimbing == 0) {
            $commandTuntas = Yii::app()->db->createCommand();
            $commandTuntas->update('prd_nilaimasterskripsi', array(
                'status' => "Tidak Tuntas"), 'NIM=:NIM', array(':NIM' => $nim));
        } else {
            $commandTuntas = Yii::app()->db->createCommand();
            $commandTuntas->update('prd_nilaimasterskripsi', array(
                'status' => "Tuntas"), 'NIM=:NIM', array(':NIM' => $nim));
        }
    }
}
