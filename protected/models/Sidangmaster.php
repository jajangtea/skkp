<?php

/**
 * This is the model class for table "prd_sidangmaster".
 *
 * The followings are the available columns in table 'prd_sidangmaster':
 * @property integer $IdSidang
 * @property string $Tanggal
 * @property integer $IDJenisSidang
 * @property integer $IdTa
 * @property integer $status
 * @property string $tglBuka
 * @property string $tglTutup
 *
 * The followings are the available model relations:
 * @property Pendaftaran[] $pendaftarans
 * @property Jenissidang $iDJenisSidang
 * @property Ta $idTa
 */
class Sidangmaster extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
      public $bulan, $tahun;
    public function tableName() {
        return 'prd_sidangmaster';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('IDJenisSidang, IdTa, status', 'numerical', 'integerOnly' => true),
            array('Tanggal, tglBuka, tglTutup', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdSidang, Tanggal, IDJenisSidang, IdTa, status, tglBuka, idPeriode,bulan,tahun, tglTutup', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pendaftarans' => array(self::HAS_MANY, 'Pendaftaran', 'IdSidang'),
            'iDJenisSidang' => array(self::BELONGS_TO, 'Jenissidang', 'IDJenisSidang'),
            'idTa' => array(self::BELONGS_TO, 'Ta', 'IdTa'),
            'idPeriode0' => array(self::BELONGS_TO, 'Periode', 'idPeriode'),
            'pendaftarans' => array(self::HAS_MANY, 'Pendaftaran', 'IdSidang'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IdSidang' => 'Id Sidang',
            'Tanggal' => 'Tanggal',
            'IDJenisSidang' => 'Idjenis Sidang',
            'IdTa' => 'Id Ta',
            'status' => 'Status',
            'tglBuka' => 'Tgl Buka',
            'tglTutup' => 'Tgl Tutup',
            'idPeriode' => 'Id Periode',
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

        $criteria = new CDbCriteria;
        $criteria->join = 'INNER JOIN prd_periode pr ON t.idPeriode=pr.idPeriode';
        $criteria->order = 'js.NamaSidang';
        $criteria->order = 'Tanggal DESC';
        $criteria->compare('IdSidang', $this->IdSidang);
        $criteria->compare('Tanggal', $this->Tanggal, true);
        $criteria->compare('IDJenisSidang', $this->IDJenisSidang);
        $criteria->compare('IdTa', $this->IdTa);
        $criteria->compare('status', $this->status);
        $criteria->compare('tglBuka', $this->tglBuka, true);
        $criteria->compare('tglTutup', $this->tglTutup, true);
        $criteria->compare('pr.bulan', $this->bulan);
        $criteria->compare('pr.tahun', $this->tahun);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Sidangmaster the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function sidangaktif() {
        $sql = "SELECT js.`IDJenisSidang`,js.`NamaSidang`,sm.`Tanggal`,sm.`tglBuka`,sm.`tglTutup`,ta.`Tahun`,ta.`Semester` FROM prd_sidangmaster sm 
                LEFT JOIN prd_jenissidang js ON js.`IDJenisSidang`=sm.`IDJenisSidang`  
                LEFT JOIN prd_ta ta ON ta.`IdTa`=sm.`IdTa` WHERE sm.`status`=1";
        return $data = Yii::app()->db->createCommand($sql)->queryRow();
        ;
    }

    public function jenisSidangAktif($idjenis) {
        $sql = "SELECT js.`IDJenisSidang`,js.`NamaSidang`,sm.`Tanggal`,sm.`tglBuka`,sm.`tglTutup`,ta.`Tahun`,ta.`Semester` FROM prd_sidangmaster sm 
                LEFT JOIN prd_jenissidang js ON js.`IDJenisSidang`=sm.`IDJenisSidang`  
                LEFT JOIN prd_ta ta ON ta.`IdTa`=sm.`IdTa` WHERE sm.`status`=1 and sm.`IDJenisSidang`=" . $idjenis . "";
        return $data = Yii::app()->db->createCommand($sql)->queryRow();
        ;
    }

    public function ubahStatus() {
        if ($this->status == "1")
            return true;
        else
            return false;
    }
    
    public function kondisiStatus() {
        if ($this->status == "1")
            return "Aktif";
        else
            return "Tidak Aktif";
    }

    public static function jenisStatus() {
        return array(
            '1' => 'Aktif',
            '0' => 'Tidak Aktif',
        );
    }

    public function getComplete() {
        return Ta::model()->Tahun . ' ' . Ta::model()->Semester;
    }

    public function getTA() {
        return CHtml::listData(Ta::model()->findAll(), 'IdTa', 'complete');
    }

    public function actionGetValue() {

        $arr = explode(',', $_POST['theIds']);
        echo $arr;
    }

}
