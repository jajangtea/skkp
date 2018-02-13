<?php

/**
 * This is the model class for table "prd_pengumuman".
 *
 * The followings are the available columns in table 'prd_pengumuman':
 * @property integer $idPengumuman
 * @property string $Deskripsi
 * @property string $tanggalBuka
 * @property string $tanggalTutup
 * @property string $keterangan
 */
class Pengumuman extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_pengumuman';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPengumuman', 'required'),
			array('idPengumuman', 'numerical', 'integerOnly'=>true),
			array('keterangan', 'length', 'max'=>100),
			array('Deskripsi, tanggalBuka, tanggalTutup', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPengumuman, Deskripsi, tanggalBuka, tanggalTutup, keterangan', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPengumuman' => 'Id Pengumuman',
			'Deskripsi' => 'Deskripsi',
			'tanggalBuka' => 'Tanggal Buka',
			'tanggalTutup' => 'Tanggal Tutup',
			'keterangan' => 'Keterangan',
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

		$criteria->compare('idPengumuman',$this->idPengumuman);
		$criteria->compare('Deskripsi',$this->Deskripsi,true);
		$criteria->compare('tanggalBuka',$this->tanggalBuka,true);
		$criteria->compare('tanggalTutup',$this->tanggalTutup,true);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pengumuman the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function lastPengumuman() {
        $sql = 'SELECT * FROM prd_pengumuman order by idPengumuman desc';
        $dataProvider = new CSqlDataProvider($sql, array(
            'keyField' => 'idPengumuman',
            'pagination' => array(
                'pageSize' => 5,
            ),
        ));
        return $dataProvider;
    }
}
