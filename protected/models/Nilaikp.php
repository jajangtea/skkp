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
            array('NIM', 'required'),
            array('NIM', 'numerical', 'integerOnly' => true),
            array('NilaiPembimbing, NilaiPenguji, NilaiPerusahaan, NA', 'numerical'),
            array('Index', 'length', 'max' => 2),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdNilaiKp, NIM, NilaiPembimbing, NilaiPenguji, NilaiPerusahaan, NA, Index', 'safe', 'on' => 'search'),
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
        }

        $criteria->compare('IdNilaiKp', $this->IdNilaiKp);
        $criteria->compare('NIM', $this->NIM);
        $criteria->compare('NilaiPembimbing', $this->NilaiPembimbing);
        $criteria->compare('NilaiPenguji', $this->NilaiPenguji);
        $criteria->compare('NilaiPerusahaan', $this->NilaiPerusahaan);
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
     * @return Nilaikp the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
