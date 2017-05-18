<?php

/**
 * This is the model class for table "prd_pendaftaran".
 *
 * The followings are the available columns in table 'prd_pendaftaran':
 * @property integer $idPendaftaran
 * @property string $Tanggal
 * @property integer $NIM
 * @property integer $IDJenisSidang
 * @property string $KodePembimbing1
 * @property string $KodePembimbing2
 * @property string $Judul
 *
 * The followings are the available model relations:
 * @property Nilaidetilskirpsi[] $nilaidetilskirpsis
 * @property Nilaimasterskripsi[] $nilaimasterskripsis
 * @property Mahasiswa $nIM
 * @property Jenissidang $iDJenisSidang
 * @property Sidangdetil[] $sidangdetils
 */
class Pendaftaran extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_pendaftaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NIM, IDJenisSidang', 'numerical', 'integerOnly'=>true),
			array('KodePembimbing1, KodePembimbing2', 'length', 'max'=>3),
			array('Tanggal, Judul', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPendaftaran, Tanggal, NIM, IDJenisSidang, KodePembimbing1, KodePembimbing2, Judul', 'safe', 'on'=>'search'),
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
			'nilaidetilskirpsis' => array(self::HAS_MANY, 'Nilaidetilskirpsi', 'IdPendaftaran'),
			'nilaimasterskripsis' => array(self::HAS_MANY, 'Nilaimasterskripsi', 'IdPendaftaran'),
			'nIM' => array(self::BELONGS_TO, 'Mahasiswa', 'NIM'),
			'iDJenisSidang' => array(self::BELONGS_TO, 'Jenissidang', 'IDJenisSidang'),
			'sidangdetils' => array(self::HAS_MANY, 'Sidangdetil', 'IdPendaftaran'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPendaftaran' => 'Id Pendaftaran',
			'Tanggal' => 'Tanggal',
			'NIM' => 'Nim',
			'IDJenisSidang' => 'Idjenis Sidang',
			'KodePembimbing1' => 'Kode Pembimbing1',
			'KodePembimbing2' => 'Kode Pembimbing2',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idPendaftaran',$this->idPendaftaran);
		$criteria->compare('Tanggal',$this->Tanggal,true);
		$criteria->compare('NIM',$this->NIM);
		$criteria->compare('IDJenisSidang',$this->IDJenisSidang);
		$criteria->compare('KodePembimbing1',$this->KodePembimbing1,true);
		$criteria->compare('KodePembimbing2',$this->KodePembimbing2,true);
		$criteria->compare('Judul',$this->Judul,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pendaftaran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
