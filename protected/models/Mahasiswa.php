<?php

/**
 * This is the model class for table "prd_mahasiswa".
 *
 * The followings are the available columns in table 'prd_mahasiswa':
 * @property integer $NIM
 * @property string $Nama
 * @property string $Tlp
 * @property string $KodeJurusan
 *
 * The followings are the available model relations:
 * @property Jurusan $kodeJurusan
 * @property Nilaikp[] $nilaikps
 * @property Pendaftaran[] $pendaftarans
 */
class Mahasiswa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_mahasiswa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NIM', 'required'),
			array('NIM', 'numerical', 'integerOnly'=>true),
			array('Nama', 'length', 'max'=>200),
			array('Tlp', 'length', 'max'=>20),
			array('KodeJurusan', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NIM, Nama, Tlp, KodeJurusan', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'kodeJurusan' => array(self::BELONGS_TO, 'Jurusan', 'KodeJurusan'),
			'nilaikps' => array(self::HAS_MANY, 'Nilaikp', 'NIM'),
			'pendaftarans' => array(self::HAS_MANY, 'Pendaftaran', 'NIM'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'NIM' => 'Nim',
			'Nama' => 'Nama',
			'Tlp' => 'Tlp',
			'KodeJurusan' => 'Kode Jurusan',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('NIM',$this->NIM);
		$criteria->compare('Nama',$this->Nama,true);
		$criteria->compare('Tlp',$this->Tlp,true);
		$criteria->compare('KodeJurusan',$this->KodeJurusan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Mahasiswa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
