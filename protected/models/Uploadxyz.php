<?php

/**
 * This is the model class for table "prd_upload".
 *
 * The followings are the available columns in table 'prd_upload':
 * @property integer $idUpload
 * @property integer $idPendaftaran
 * @property string $namaFile
 * @property string $ukuranFIle
 * @property integer $idPersyaratan
 *
 * The followings are the available model relations:
 * @property Persyaratan $idPersyaratan0
 * @property Pengajuan $idPendaftaran0
 */
class Uploadxyz extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_upload';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPendaftaran, idPersyaratan', 'numerical', 'integerOnly'=>true),
			array('namaFile, ukuranFIle', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUpload, idPendaftaran, namaFile, ukuranFIle, idPersyaratan', 'safe', 'on'=>'search'),
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
			'idPersyaratan0' => array(self::BELONGS_TO, 'Persyaratan', 'idPersyaratan'),
			'idPendaftaran0' => array(self::BELONGS_TO, 'Pengajuan', 'idPendaftaran'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUpload' => 'Id Upload',
			'idPendaftaran' => 'Id Pendaftaran',
			'namaFile' => 'Nama File',
			'ukuranFIle' => 'Ukuran File',
			'idPersyaratan' => 'Id Persyaratan',
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

		$criteria->compare('idUpload',$this->idUpload);
		$criteria->compare('idPendaftaran',$this->idPendaftaran);
		$criteria->compare('namaFile',$this->namaFile,true);
		$criteria->compare('ukuranFIle',$this->ukuranFIle,true);
		$criteria->compare('idPersyaratan',$this->idPersyaratan);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Uploadxyz the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
