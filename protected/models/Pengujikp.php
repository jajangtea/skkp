<?php

/**
 * This is the model class for table "prd_pengujikp".
 *
 * The followings are the available columns in table 'prd_pengujikp':
 * @property integer $idPengujiKp
 * @property integer $idPendaftaran
 * @property integer $idUser
 *
 * The followings are the available model relations:
 * @property Pendaftaran $idPendaftaran0
 * @property User $idUser0
 */
class Pengujikp extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $bulan, $tahun;

    public function tableName() {
        return 'prd_pengujikp';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idPendaftaran, idUser', 'required'),
            array('idPendaftaran, idUser', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPengujiKp, idPendaftaran, idUser', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idPendaftaran0' => array(self::BELONGS_TO, 'Pendaftaran', 'idPendaftaran'),
            'idUser0' => array(self::BELONGS_TO, 'User', 'idUser'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idPengujiKp' => 'Penguji Kp',
            'idPendaftaran' => 'Nama Mahasiswa',
            'idUser' => 'Penguji KP',
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
        $criteria = new CDbCriteria();

        $criteria->join = 'INNER JOIN prd_pendaftaran pp ON t.idPendaftaran=pp.idPendaftaran '
                . 'INNER JOIN prd_sidangmaster sm ON pp.IdSidang=sm.IdSidang '
                . 'INNER JOIN prd_periode pr ON sm.idPeriode=pr.idPeriode';
        $criteria->order = 'pr.bulan';
        $criteria->compare('pr.bulan', $this->bulan);
        $criteria->compare('pr.tahun', $this->tahun);
        $criteria->compare('idPengujiKp', $this->idPengujiKp);
        $criteria->compare('idUser', $this->idUser);
        $criteria->compare('t.idPendaftaran', $this->idPendaftaran);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchid($id) {
        $criteria = new CDbCriteria();
        $criteria->compare('idPendaftaran', $id);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPendaftaranKpStatusAktif() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(Pendaftaran::model()->with('idSidang.iDJenisSidang')->findAll('status=1 and iDJenisSidang.IDJenisSidang=3'), 'idPendaftaran', 'nIM.Nama');
    }

    public function getNamaSidang() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(Sidangmaster::model()->with('iDJenisSidang')->findAll('status=1'), 'IdSidang', 'iDJenisSidang.NamaSidang');
    }

    public function cekPengujiKP($id, $NIM) {

        $cek = Yii::app()->db->createCommand("select count(*) from prd_pengujikp pp inner join prd_pendaftaran pd on pp.idPendaftaran=pd.idPendaftaran where pp.idUser='$id' and pd.NIM='$NIM'")->queryScalar();
        return $cek;
    }

    public function cekPembimbingKP($id, $NIM) {
        $cek = Yii::app()->db->createCommand("select count(*) from prd_pendaftaran where KodePembimbing1='$id' and NIM='$NIM'")->queryScalar();
        return $cek;
    }

}
