<?php

/**
 * This is the model class for table "prd_pengajuan".
 *
 * The followings are the available columns in table 'prd_pengajuan':
 * @property integer $IDPengajuan
 * @property integer $IDJenisSidang
 * @property integer $NIM
 * @property string $TanggalDaftar
 * @property string $Judul
 *
 * The followings are the available model relations:
 * @property Jenissidang $iDJenisSidang
 * @property Mahasiswa $nIM
 */
class Pengajuan extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'prd_pengajuan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('IDJenisSidang', 'required', 'message' => 'Jenis proposal tidak boleh kosong.'),
            array('IDJenisSidang, NIM', 'numerical', 'integerOnly' => true),
            array('TanggalDaftar, Judul', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IDPengajuan, IDJenisSidang, NIM, TanggalDaftar, Judul', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'iDJenisSidang' => array(self::BELONGS_TO, 'Jenissidang', 'IDJenisSidang'),
            'nIM' => array(self::BELONGS_TO, 'Mahasiswa', 'NIM'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IDPengajuan' => 'Idpengajuan',
            'IDJenisSidang' => 'Idjenis Sidang',
            'NIM' => 'Nim',
            'TanggalDaftar' => 'Tanggal Daftar',
            'Judul' => 'Judul',
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
            $criteria = new CDbCriteria(array
                (
                'condition' => 'NIM=:NIM',
                'params' => array(':NIM' => Yii::app()->user->name),
            ));
        } else {
            $criteria = new CDbCriteria;
        }


        $criteria->compare('IDPengajuan', $this->IDPengajuan);
        $criteria->compare('IDJenisSidang', $this->IDJenisSidang);
        $criteria->compare('NIM', $this->NIM);
        $criteria->compare('TanggalDaftar', $this->TanggalDaftar, true);
        $criteria->compare('Judul', $this->Judul, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Pengajuan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
