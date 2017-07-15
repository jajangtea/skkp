<?php

/**
 * This is the model class for table "prd_nilaidetilskirpsi".
 *
 * The followings are the available columns in table 'prd_nilaidetilskirpsi':
 * @property integer $idNilaiSkripsi
 * @property integer $IdPendaftaran
 * @property double $NilaiPenguji1
 * @property double $NIlaiPenguji2
 * @property double $NPraSidang
 *
 * The followings are the available model relations:
 * @property Pendaftaran $idPendaftaran
 */
class Nilaidetilskirpsi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_nilaidetilskirpsi';
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
			array('NilaiPenguji1, NIlaiPenguji2, NPraSidang', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idNilaiSkripsi, IdPendaftaran, NilaiPenguji1, NIlaiPenguji2,NPraSidang', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idNilaiSkripsi' => 'Id Nilai Skripsi',
			'IdPendaftaran' => 'Id Pendaftaran',
			'NilaiPenguji1' => 'Nilai Penguji1',
			'NIlaiPenguji2' => 'Nilai Penguji2',
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

		$criteria->compare('idNilaiSkripsi',$this->idNilaiSkripsi);
		$criteria->compare('IdPendaftaran',$this->IdPendaftaran);
		$criteria->compare('NilaiPenguji1',$this->NilaiPenguji1);
		$criteria->compare('NIlaiPenguji2',$this->NIlaiPenguji2);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Nilaidetilskirpsi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
