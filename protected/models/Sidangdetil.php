<?php

/**
 * This is the model class for table "prd_sidangdetil".
 *
 * The followings are the available columns in table 'prd_sidangdetil':
 * @property integer $IdSidangDetil
 * @property integer $IdPendaftaran
 * @property string $Penguji1
 * @property string $Penguji2
 *
 * The followings are the available model relations:
 * @property Pendaftaran $idPendaftaran
 * @property Dosen $penguji1
 * @property Dosen $penguji2
 */
class Sidangdetil extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_sidangdetil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdPendaftaran', 'numerical', 'integerOnly'=>true),
			array('Penguji1, Penguji2', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdSidangDetil, IdPendaftaran, Penguji1, Penguji2', 'safe', 'on'=>'search'),
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
			'idPendaftaran' => array(self::BELONGS_TO, 'Pendaftaran', 'IdPendaftaran'),
			'penguji1' => array(self::BELONGS_TO, 'Dosen', 'Penguji1'),
			'penguji2' => array(self::BELONGS_TO, 'Dosen', 'Penguji2'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdSidangDetil' => 'Id Sidang Detil',
			'IdPendaftaran' => 'Id Pendaftaran',
			'Penguji1' => 'Penguji1',
			'Penguji2' => 'Penguji2',
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

		$criteria->compare('IdSidangDetil',$this->IdSidangDetil);
		$criteria->compare('IdPendaftaran',$this->IdPendaftaran);
		$criteria->compare('Penguji1',$this->Penguji1,true);
		$criteria->compare('Penguji2',$this->Penguji2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sidangdetil the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
