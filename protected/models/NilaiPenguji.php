<?php

/**
 * This is the model class for table "prd_nilai_penguji".
 *
 * The followings are the available columns in table 'prd_nilai_penguji':
 * @property integer $idNilaiPenguji
 * @property integer $idPengujiSkripsi
 * @property double $nilaiSkripsi
 *
 * The followings are the available model relations:
 * @property Pengujiskripsi $idPengujiSkripsi0
 */
class NilaiPenguji extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_nilai_penguji';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPengujiSkripsi', 'numerical', 'integerOnly'=>true),
			array('nilaiSkripsi', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idNilaiPenguji, idPengujiSkripsi, nilaiSkripsi', 'safe', 'on'=>'search'),
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
			'idPengujiSkripsi0' => array(self::BELONGS_TO, 'Pengujiskripsi', 'idPengujiSkripsi'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idNilaiPenguji' => 'Id Nilai Penguji',
			'idPengujiSkripsi' => 'Id Penguji Skripsi',
			'nilaiSkripsi' => 'Nilai Skripsi',
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

		$criteria->compare('idNilaiPenguji',$this->idNilaiPenguji);
		$criteria->compare('idPengujiSkripsi',$this->idPengujiSkripsi);
		$criteria->compare('nilaiSkripsi',$this->nilaiSkripsi);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NilaiPenguji the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
