<?php

/**
 * This is the model class for table "prd_sidangmaster".
 *
 * The followings are the available columns in table 'prd_sidangmaster':
 * @property integer $IdSidang
 * @property string $Tanggal
 * @property integer $IDJenisSidang
 * @property integer $IdTa
 * @property integer $status
 * @property string $tglBuka
 * @property string $tglTutup
 * @property integer $idPeriode
 *
 * The followings are the available model relations:
 * @property Pendaftaran[] $pendaftarans
 * @property Jenissidang $iDJenisSidang
 * @property Ta $idTa
 * @property Periode $idPeriode0
 */
class Sidangmaster extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_sidangmaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tglBuka', 'required'),
			array('IDJenisSidang, IdTa, status, idPeriode', 'numerical', 'integerOnly'=>true),
			array('Tanggal, tglTutup', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdSidang, Tanggal, IDJenisSidang, IdTa, status, tglBuka, tglTutup, idPeriode', 'safe', 'on'=>'search'),
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
			'pendaftarans' => array(self::HAS_MANY, 'Pendaftaran', 'IdSidang'),
			'iDJenisSidang' => array(self::BELONGS_TO, 'Jenissidang', 'IDJenisSidang'),
			'idTa' => array(self::BELONGS_TO, 'Ta', 'IdTa'),
			'idPeriode0' => array(self::BELONGS_TO, 'Periode', 'idPeriode'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdSidang' => 'Id Sidang',
			'Tanggal' => 'Tanggal',
			'IDJenisSidang' => 'Idjenis Sidang',
			'IdTa' => 'Id Ta',
			'status' => 'Status',
			'tglBuka' => 'Tgl Buka',
			'tglTutup' => 'Tgl Tutup',
			'idPeriode' => 'Id Periode',
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

		$criteria->compare('IdSidang',$this->IdSidang);
		$criteria->compare('Tanggal',$this->Tanggal,true);
		$criteria->compare('IDJenisSidang',$this->IDJenisSidang);
		$criteria->compare('IdTa',$this->IdTa);
		$criteria->compare('status',$this->status);
		$criteria->compare('tglBuka',$this->tglBuka,true);
		$criteria->compare('tglTutup',$this->tglTutup,true);
		$criteria->compare('idPeriode',$this->idPeriode);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sidangmaster the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
