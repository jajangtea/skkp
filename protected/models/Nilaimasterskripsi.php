<?php

/**
 * This is the model class for table "prd_nilaimasterskripsi".
 *
 * The followings are the available columns in table 'prd_nilaimasterskripsi':
 * @property string $IdNMSkripsi
 * @property integer $IdPendaftaran
 * @property double $NKompre
 * @property double $NPraSidang
 * @property double $NSidangSkripsi
 * @property double $NPembimbing
 * @property double $NA
 * @property string $Index
 *
 * The followings are the available model relations:
 * @property Pendaftaran $idPendaftaran
 */
class Nilaimasterskripsi extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
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
            array('IdPendaftaran', 'numerical', 'integerOnly' => true),
            array('NKompre, NPraSidang, NSidangSkripsi, NPembimbing, NA', 'numerical'),
            array('Index', 'length', 'max' => 2),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdNMSkripsi, IdPendaftaran, NKompre, NPraSidang, NSidangSkripsi, NPembimbing, NA, Index', 'safe', 'on' => 'search'),
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
            'IdNMSkripsi' => 'Id Nmskripsi',
            'IdPendaftaran' => 'Id Pendaftaran',
            'NKompre' => 'Nkompre',
            'NPraSidang' => 'Npra Sidang',
            'NSidangSkripsi' => 'Nsidang Skripsi',
            'NPembimbing' => 'Npembimbing',
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
            $criteria = new CDbCriteria("Join pendaftaran p on p.IdPendaftaran=t.IdPendaftaran where p.nim=$this->idPendaftaran->nIM");
        } else {
            $criteria = new CDbCriteria();
        }


        $criteria->compare('IdNMSkripsi', $this->IdNMSkripsi, true);
        $criteria->compare('IdPendaftaran', $this->IdPendaftaran);
        $criteria->compare('NKompre', $this->NKompre);
        $criteria->compare('NPraSidang', $this->NPraSidang);
        $criteria->compare('NSidangSkripsi', $this->NSidangSkripsi);
        $criteria->compare('NPembimbing', $this->NPembimbing);
        $criteria->compare('NA', $this->NA);
        $criteria->compare('Index', $this->Index, true);

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
    
    public function loadModelNilaiMaster($idPendaftaran) {
        $sql = "SELECT COUNT(*) FROM prd_nilaimasterskripsi where IdPendaftaran=$idPendaftaran";
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

}
