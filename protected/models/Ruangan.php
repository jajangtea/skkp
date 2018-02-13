<?php

/**
 * This is the model class for table "ruangan".
 *
 * The followings are the available columns in table 'ruangan':
 * @property string $noRuangan
 * @property string $namaRuangan
 * @property integer $idPenanggungJawab
 *
 * The followings are the available model relations:
 * @property Inventarisasi[] $inventarisasis
 * @property User $idPenanggungJawab0
 */
class Ruangan extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'ruangan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('noRuangan, namaRuangan, idPenanggungJawab', 'required'),
            array('idPenanggungJawab', 'numerical', 'integerOnly' => true),
            array('noRuangan', 'length', 'max' => 10),
            array('namaRuangan', 'length', 'max' => 30),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('noRuangan, namaRuangan, idPenanggungJawab', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'inventarisasis' => array(self::HAS_MANY, 'Inventarisasi', 'noRuangan'),
            'idPenanggungJawab0' => array(self::BELONGS_TO, 'User', 'idPenanggungJawab'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'noRuangan' => 'No Ruangan',
            'namaRuangan' => 'Keterangan',
            'idPenanggungJawab' => 'Id Penanggung Jawab',
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

        $criteria->compare('noRuangan', $this->noRuangan, true);
        $criteria->compare('namaRuangan', $this->namaRuangan, true);
        $criteria->compare('idPenanggungJawab', $this->idPenanggungJawab);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Ruangan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPenanggungJawab()
    {
        return CHtml::listData(User::model()->findAll(), 'id', 'realname');
    }
    

}
