<?php

/**
 * This is the model class for table "prd_persyaratan_jenis".
 *
 * The followings are the available columns in table 'prd_persyaratan_jenis':
 * @property integer $idPersyaratanJenis
 * @property integer $idJenisSidang
 * @property integer $idPersyaratan
 *
 * The followings are the available model relations:
 * @property Jenissidang $idJenisSidang0
 * @property Persyaratan $idPersyaratan0
 */
class PersyaratanJenis extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'prd_persyaratan_jenis';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idJenisSidang, idPersyaratan', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPersyaratanJenis, idJenisSidang, idPersyaratan', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idJenisSidang0' => array(self::BELONGS_TO, 'Jenissidang', 'idJenisSidang'),
            'idPersyaratan0' => array(self::BELONGS_TO, 'Persyaratan', 'idPersyaratan'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idPersyaratanJenis' => 'Id Persyaratan Jenis',
            'idJenisSidang' => 'Jenis Sidang',
            'idPersyaratan' => 'Persyaratan',
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

        $criteria->compare('idPersyaratanJenis', $this->idPersyaratanJenis);
        $criteria->compare('idJenisSidang', $this->idJenisSidang);
        $criteria->compare('idPersyaratan', $this->idPersyaratan);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PersyaratanJenis the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPersyaratan() {
        return CHtml::listData(Persyaratan::model()->findAll(), 'idPersyaratan', 'namaPersyaratan');
    }

}
