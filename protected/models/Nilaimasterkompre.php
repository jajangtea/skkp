<?php

/**
 * This is the model class for table "prd_nilaimasterskripsi".
 *
 * The followings are the available columns in table 'prd_nilaimasterskripsi':
 * @property string $IdNMSkripsi
 * @property double $NKompre
 * @property double $NPraSidang
 * @property double $NSidangSkripsi
 * @property double $NPembimbing
 * @property double $NA
 * @property string $Index
 * @property integer $NIM
 * @property integer $idPendaftaran
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Mahasiswa $nIM
 * @property Pendaftaran $idPendaftaran0
 */
class Nilaimasterkompre extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_nilaimasterskripsi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NIM, status', 'required'),
			array('NIM, idPendaftaran', 'numerical', 'integerOnly'=>true),
			array('NKompre, NPraSidang, NSidangSkripsi, NPembimbing, NA', 'numerical'),
			array('Index', 'length', 'max'=>2),
			array('status', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdNMSkripsi, NKompre, NPraSidang, NSidangSkripsi, NPembimbing, NA, Index, NIM, idPendaftaran, status', 'safe', 'on'=>'search'),
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
			'nIM' => array(self::BELONGS_TO, 'Mahasiswa', 'NIM'),
			'idPendaftaran0' => array(self::BELONGS_TO, 'Pendaftaran', 'idPendaftaran'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdNMSkripsi' => 'Id Nmskripsi',
			'NKompre' => 'Nkompre',
			'NPraSidang' => 'Npra Sidang',
			'NSidangSkripsi' => 'Nsidang Skripsi',
			'NPembimbing' => 'Npembimbing',
			'NA' => 'Na',
			'Index' => 'Index',
			'NIM' => 'Nim',
			'idPendaftaran' => 'Id Pendaftaran',
			'status' => 'Status',
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

		$criteria->compare('IdNMSkripsi',$this->IdNMSkripsi,true);
		$criteria->compare('NKompre',$this->NKompre);
		$criteria->compare('NPraSidang',$this->NPraSidang);
		$criteria->compare('NSidangSkripsi',$this->NSidangSkripsi);
		$criteria->compare('NPembimbing',$this->NPembimbing);
		$criteria->compare('NA',$this->NA);
		$criteria->compare('Index',$this->Index,true);
		$criteria->compare('NIM',$this->NIM);
		$criteria->compare('idPendaftaran',$this->idPendaftaran);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Nilaimasterkompre the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
