<?php

/**
 * This is the model class for table "prd_uploadProposal".
 *
 * The followings are the available columns in table 'prd_uploadProposal':
 * @property integer $idUpload
 * @property integer $idPengajuan
 * @property string $namaFile
 * @property string $ukuranFIle
 * @property integer $idPersyaratan
 *
 * The followings are the available model relations:
 * @property Pengajuan $idPengajuan0
 * @property Persyaratan $idPersyaratan0
 */
class UploadProposal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_uploadProposal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('namaFile','required'),
			array('idPengajuan, idPersyaratan', 'numerical', 'integerOnly'=>true),
                        array('namaFile', 'file', 'allowEmpty'=>true, 'types'=>'jpg,doc,docx','maxSize'=>200000,'tooLarge'=>'Ukuran File Maksimal 200KB', 'message'=>'Jpg files only ','on'=>'update', 'on'=>'insert'),
                        //array('yourfile','file', 'types'=>'mp3,mp4,3gp', 'maxSize'=>2097152, 'tooLarge'=>'File has to be smaller than 80MB') .	
                        array('namaFile, ukuranFIle', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUpload, idPengajuan, namaFile, ukuranFIle, idPersyaratan', 'safe', 'on'=>'search'),
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
			'idPengajuan0' => array(self::BELONGS_TO, 'Pengajuan', 'idPengajuan'),
			'idPersyaratan0' => array(self::BELONGS_TO, 'Persyaratan', 'idPersyaratan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUpload' => 'Id Upload',
			'idPengajuan' => 'Id Pengajuan',
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
		$criteria->compare('idPengajuan',$this->idPengajuan);
		$criteria->compare('namaFile',$this->namaFile,true);
		$criteria->compare('ukuranFIle',$this->ukuranFIle,true);
		$criteria->compare('idPersyaratan',$this->idPersyaratan);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function searchUpload($idPengajuan)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idPengajuan',$idPengajuan);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UploadProposal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
