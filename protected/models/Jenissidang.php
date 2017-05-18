<?php

/**
 * This is the model class for table "prd_jenissidang".
 *
 * The followings are the available columns in table 'prd_jenissidang':
 * @property integer $IDJenisSidang
 * @property string $NamaSidang
 *
 * The followings are the available model relations:
 * @property Pendaftaran[] $pendaftarans
 * @property Sidangmaster[] $sidangmasters
 */
class Jenissidang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_jenissidang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IDJenisSidang', 'required'),
			array('IDJenisSidang', 'numerical', 'integerOnly'=>true),
			array('NamaSidang', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IDJenisSidang, NamaSidang', 'safe', 'on'=>'search'),
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
			'pendaftarans' => array(self::HAS_MANY, 'Pendaftaran', 'IDJenisSidang'),
			'sidangmasters' => array(self::HAS_MANY, 'Sidangmaster', 'IDJenisSidang'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDJenisSidang' => 'Idjenis Sidang',
			'NamaSidang' => 'Nama Sidang',
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

		$criteria->compare('IDJenisSidang',$this->IDJenisSidang);
		$criteria->compare('NamaSidang',$this->NamaSidang,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Jenissidang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
