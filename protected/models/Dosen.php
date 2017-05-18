<?php

/**
 * This is the model class for table "prd_dosen".
 *
 * The followings are the available columns in table 'prd_dosen':
 * @property string $KodeDosen
 * @property string $NamaDosen
 * @property string $Tlp
 *
 * The followings are the available model relations:
 * @property Jabatan[] $jabatans
 * @property Sidangdetil[] $sidangdetils
 * @property Sidangdetil[] $sidangdetils1
 */
class Dosen extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_dosen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KodeDosen', 'required'),
			array('KodeDosen', 'length', 'max'=>3),
			array('NamaDosen', 'length', 'max'=>200),
			array('Tlp', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('KodeDosen, NamaDosen, Tlp', 'safe', 'on'=>'search'),
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
			'jabatans' => array(self::HAS_MANY, 'Jabatan', 'KodeDosen'),
			'sidangdetils' => array(self::HAS_MANY, 'Sidangdetil', 'Penguji1'),
			'sidangdetils1' => array(self::HAS_MANY, 'Sidangdetil', 'Penguji2'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'KodeDosen' => 'Kode Dosen',
			'NamaDosen' => 'Nama Dosen',
			'Tlp' => 'Tlp',
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

		$criteria->compare('KodeDosen',$this->KodeDosen,true);
		$criteria->compare('NamaDosen',$this->NamaDosen,true);
		$criteria->compare('Tlp',$this->Tlp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dosen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
