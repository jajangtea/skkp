<?php

/**
 * This is the model class for table "prd_pengujiskripsi".
 *
 * The followings are the available columns in table 'prd_pengujiskripsi':
 * @property integer $idPengujiSkripsi
 * @property integer $idPendaftaran
 * @property integer $idUser
 *
 * The followings are the available model relations:
 * @property Pendaftaran $idPendaftaran0
 * @property User $idUser0
 */
class Pengujiskripsi extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $bulan, $tahun;

    public function tableName() {
        return 'prd_pengujiskripsi';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idPengajuan', 'required', 'message' => 'tidak boleh kosong.'),
            array('idPendaftaran,idPengajuan,nilai, idUser', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPengujiSkripsi, idPendaftaran,bulan,tahun, idUser, nilai', 'safe', 'on' => 'search'),
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
            'idPengajuan0' => array(self::BELONGS_TO, 'Pengajuan', 'idPengajuan'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idPengujiSkripsi' => 'Id Penguji Skripsi',
            'idPendaftaran' => 'Nama Mahasiswa',
            'idUser' => 'Kode Dosen',
            'nilai' => 'NIlai',
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

        if (Yii::app()->user->getLevel() == 3) {
            $criteria = new CDbCriteria(array
                (
                'condition' => 'idUser=:idUser and sm.idJenisSidang in(1,2)',
                'params' => array(':idUser' => Yii::app()->user->id),
            ));
        } else {
            $criteria = new CDbCriteria();
            $criteria->order = 't.idPendaftaran DESC';
        }
        $criteria->join = 'INNER JOIN prd_pendaftaran pp ON t.idPendaftaran=pp.idPendaftaran '
                . 'INNER JOIN prd_sidangmaster sm ON pp.IdSidang=sm.IdSidang '
                . 'INNER JOIN prd_periode pr ON sm.idPeriode=pr.idPeriode';
        $criteria->compare('pr.bulan', $this->bulan);
        $criteria->compare('pr.tahun', $this->tahun);
        $criteria->compare('idPengujiSkripsi', $this->idPengujiSkripsi);
        $criteria->compare('idUser', $this->idUser);
        $criteria->compare('t.idPendaftaran', $this->idPendaftaran);
        $criteria->order = 't.idPendaftaran DESC';
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchid($id) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria();

        $criteria->compare('idPengujiSkripsi', $this->idPengujiSkripsi);
        $criteria->compare('idPendaftaran', $id);
        $criteria->compare('idUser', $this->idUser);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Pengujiskripsi the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPendaftaranSkripsiStatusAktif() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(Pendaftaran::model()->with('idSidang.iDJenisSidang')->findAll('status=1 and iDJenisSidang.IDJenisSidang in(1,2)'), 'idPendaftaran', 'nIM.Nama');
    }

}
