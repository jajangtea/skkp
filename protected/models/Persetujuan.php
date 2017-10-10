<?php

/**
 * This is the model class for table "prd_persetujuan".
 *
 * The followings are the available columns in table 'prd_persetujuan':
 * @property integer $idPersetujuan
 * @property string $statusPersetujuan
 * @property integer $idPersyaratanPersetujuan
 * @property string $kodeDosen
 *
 * The followings are the available model relations:
 * @property Dosen $kodeDosen0
 * @property PersyaratanPersetujuan $idPersyaratanPersetujuan0
 */
class Persetujuan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_persetujuan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPersyaratanPersetujuan', 'numerical', 'integerOnly'=>true),
			array('statusPersetujuan', 'length', 'max'=>50),
			array('kodeDosen', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPersetujuan, statusPersetujuan, idPersyaratanPersetujuan, kodeDosen', 'safe', 'on'=>'search'),
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
			'kodeDosen0' => array(self::BELONGS_TO, 'Dosen', 'kodeDosen'),
			'idPersyaratanPersetujuan0' => array(self::BELONGS_TO, 'PersyaratanPersetujuan', 'idPersyaratanPersetujuan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPersetujuan' => 'Id Persetujuan',
			'statusPersetujuan' => 'Status Persetujuan',
			'idPersyaratanPersetujuan' => 'Id Persyaratan Persetujuan',
			'kodeDosen' => 'Kode Dosen',
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

		$criteria->compare('idPersetujuan',$this->idPersetujuan);
		$criteria->compare('statusPersetujuan',$this->statusPersetujuan,true);
		$criteria->compare('idPersyaratanPersetujuan',$this->idPersyaratanPersetujuan);
		$criteria->compare('kodeDosen',$this->kodeDosen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Persetujuan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
