<?php

/**
 * This is the model class for table "prd_jadwalBimbingan".
 *
 * The followings are the available columns in table 'prd_jadwalBimbingan':
 * @property integer $idJadwalBimbingan
 * @property string $hari
 * @property string $jam
 * @property string $KodeDosen
 *
 * The followings are the available model relations:
 * @property Dosen $kodeDosen
 */
class JadwalBimbingan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_jadwalbimbingan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hari, jam', 'length', 'max'=>200),
			array('KodeDosen', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idJadwalBimbingan, hari, jam, KodeDosen', 'safe', 'on'=>'search'),
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
			'kodeDosen' => array(self::BELONGS_TO, 'Dosen', 'KodeDosen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idJadwalBimbingan' => 'Id Jadwal Bimbingan',
			'hari' => 'Hari',
			'jam' => 'Jam',
			'KodeDosen' => 'Kode Dosen',
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

		$criteria->compare('idJadwalBimbingan',$this->idJadwalBimbingan);
		$criteria->compare('hari',$this->hari,true);
		$criteria->compare('jam',$this->jam,true);
		$criteria->compare('KodeDosen',$this->KodeDosen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return JadwalBimbingan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getHari()
        {
            return array(
                'Senin'=>'Senin',
                'Selasa'=>'Selasa',
                'Rabu'=>'Rabu',
                'Kamis'=>'Kamis',
                'Jumat'=>'Jumat',
                'Sabtu'=>'Sabtu',
            );
        }
        
        public function getBulan() {
        return array(
            '01'=>'Januari',
            '02'=>'Februari',
            '03'=>'Maret',
            '04'=>'April',
            '05'=>'Mei',
            '06'=>'Juni',
            '07'=>'Juli',
            '08'=>'Agustus',
            '09'=>'September',
            '10'=>'Oktober',
            '11'=>'November',
            '12'=>'Desember',
        );
    }
}
