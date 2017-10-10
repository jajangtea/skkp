<?php

/**
 * This is the model class for table "prd_persyaratan_persetujuan".
 *
 * The followings are the available columns in table 'prd_persyaratan_persetujuan':
 * @property integer $idPersyaratanPersetujuan
 * @property integer $idPersyaratan
 * @property integer $idJenisSidang
 * @property integer $idLevel
 *
 * The followings are the available model relations:
 * @property Persetujuan[] $persetujuans
 * @property Persyaratan $idPersyaratan0
 * @property Jenissidang $idJenisSidang0
 * @property Level $idLevel0
 */
class PersyaratanPersetujuan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_persyaratan_persetujuan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPersyaratan, idJenisSidang, idLevel', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPersyaratanPersetujuan, idPersyaratan, idJenisSidang, idLevel', 'safe', 'on'=>'search'),
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
			'persetujuans' => array(self::HAS_MANY, 'Persetujuan', 'idPersyaratanPersetujuan'),
			'idPersyaratan0' => array(self::BELONGS_TO, 'Persyaratan', 'idPersyaratan'),
			'idJenisSidang0' => array(self::BELONGS_TO, 'Jenissidang', 'idJenisSidang'),
			'idLevel0' => array(self::BELONGS_TO, 'Level', 'idLevel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPersyaratanPersetujuan' => 'Id Persyaratan Persetujuan',
			'idPersyaratan' => 'Id Persyaratan',
			'idJenisSidang' => 'Id Jenis Sidang',
			'idLevel' => 'Id Level',
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

		$criteria->compare('idPersyaratanPersetujuan',$this->idPersyaratanPersetujuan);
		$criteria->compare('idPersyaratan',$this->idPersyaratan);
		$criteria->compare('idJenisSidang',$this->idJenisSidang);
		$criteria->compare('idLevel',$this->idLevel);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PersyaratanPersetujuan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
