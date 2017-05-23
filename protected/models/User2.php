<?php

/**
 * This is the model class for table "prd_user".
 *
 * The followings are the available columns in table 'prd_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $saltPassword
 * @property string $email
 * @property string $joinDate
 * @property integer $level_id
 * @property string $avatar
 *
 * The followings are the available model relations:
 * @property Dosen[] $dosens
 * @property Mahasiswa[] $mahasiswas
 * @property Level $level
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prd_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, saltPassword, email, joinDate, level_id', 'required'),
			array('level_id', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>20),
			array('password, saltPassword, email', 'length', 'max'=>50),
			array('avatar', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, saltPassword, email, joinDate, level_id, avatar', 'safe', 'on'=>'search'),
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
			'dosens' => array(self::HAS_MANY, 'Dosen', 'IdUser'),
			'mahasiswas' => array(self::HAS_MANY, 'Mahasiswa', 'IdUser'),
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'saltPassword' => 'Salt Password',
			'email' => 'Email',
			'joinDate' => 'Join Date',
			'level_id' => 'Level',
			'avatar' => 'Avatar',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('saltPassword',$this->saltPassword,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('joinDate',$this->joinDate,true);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('avatar',$this->avatar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
