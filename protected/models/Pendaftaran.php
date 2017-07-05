<?php

/**
 * This is the model class for table "prd_pendaftaran".
 *
 * The followings are the available columns in table 'prd_pendaftaran':
 * @property integer $idPendaftaran
 * @property string $Tanggal
 * @property integer $NIM
 * @property integer $IdSidang
 * @property string $KodePembimbing1
 * @property string $KodePembimbing2
 * @property string $Judul
 *
 * The followings are the available model relations:
 * @property Nilaidetilskirpsi[] $nilaidetilskirpsis
 * @property Nilaimasterskripsi[] $nilaimasterskripsis
 * @property Mahasiswa $nIM
 * @property Sidangmaster $idSidang
 * @property Dosen $kodePembimbing1
 * @property Dosen $kodePembimbing2
 * @property Sidangdetil[] $sidangdetils
 */
class Pendaftaran extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'prd_pendaftaran';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('NIM, IdSidang', 'numerical', 'integerOnly' => true),
            array('IdSidang', 'required','message'=>'Sidang harus dipilih.'),
            array('KodePembimbing1', 'required','message'=>'Pembimbing 1 tidak boleh kosong.'),
            array('KodePembimbing2', 'required','message'=>'Pembimbing 2 tidak boleh kosong.'),
            array('Judul', 'required','message'=>'Judul tidak boleh kosong.'),
            array('KodePembimbing1, KodePembimbing2', 'length', 'max' => 3),
            array('Tanggal, Judul', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPendaftaran, Tanggal, NIM, IdSidang, KodePembimbing1, KodePembimbing2, Judul', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'nilaidetilskirpsis' => array(self::HAS_MANY, 'Nilaidetilskirpsi', 'IdPendaftaran'),
            'nilaimasterskripsis' => array(self::HAS_MANY, 'Nilaimasterskripsi', 'IdPendaftaran'),
            'nIM' => array(self::BELONGS_TO, 'Mahasiswa', 'NIM'),
            'idSidang' => array(self::BELONGS_TO, 'Sidangmaster', 'IdSidang'),
            'kodePembimbing1' => array(self::BELONGS_TO, 'Dosen', 'KodePembimbing1'),
            'kodePembimbing2' => array(self::BELONGS_TO, 'Dosen', 'KodePembimbing2'),
            'sidangdetils' => array(self::HAS_MANY, 'Sidangdetil', 'IdPendaftaran'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idPendaftaran' => 'Id Pendaftaran',
            'Tanggal' => 'Tanggal',
            'NIM' => 'Nim',
            'IdSidang' => 'Id Sidang',
            'KodePembimbing1' => 'Kode Pembimbing1',
            'KodePembimbing2' => 'Kode Pembimbing2',
            'Judul' => 'Judul',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.
        if(Yii::app()->user->getLevel()==3)
        {
            $criteria = new CDbCriteria(array(
            'condition'=>'NIM=:NIM',
            'params'=>array(':NIM'=>Yii::app()->user->getUsername()),
        ));
        }
        else
        {
             $criteria = new CDbCriteria();
        }
        $criteria->compare('idPendaftaran', $this->idPendaftaran);
        $criteria->compare('Tanggal', $this->Tanggal, true);
        $criteria->compare('NIM', $this->NIM);
        $criteria->compare('IdSidang', $this->IdSidang);
        $criteria->compare('KodePembimbing1', $this->KodePembimbing1, true);
        $criteria->compare('KodePembimbing2', $this->KodePembimbing2, true);
        $criteria->compare('Judul', $this->Judul, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Pendaftaran the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getNamaSidang() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(Jenissidang::model()->with('sidangmasters')->findAll('status=1'), 'IDJenisSidang', 'NamaSidang');
    }
    
    public function getPembimbing(){
        return CHtml::listData(Dosen::model()->findAll(), 'KodeDosen', 'NamaDosen');
    }
    
    public function cekPendaftaran($nim)
    {
        $sql="select count(*) from prd_pendaftaran p left join prd_sidangmaster sm on p.IdSidang=sm.IdSidang where p.nim=".$nim." and sm.status=1 and  sm.IDJenisSidang in(1,2,3)";// and sm.IDJenisSidang=".$kompre."";
        $command=Yii::app()->db->createCommand($sql)->queryScalar();
        return $command;
    }
    
    public function cekKompre($nim)
    {
        $sql="select count(*) from prd_pendaftaran p left join prd_sidangmaster sm on p.IdSidang=sm.IdSidang where p.nim=".$nim." and sm.status=1 and  sm.IDJenisSidang=4";// and sm.IDJenisSidang=".$kompre."";
        $command=Yii::app()->db->createCommand($sql)->queryScalar();
        return $command;
    }
    
    public function getTanggalSidang()
    {
        $sql="SELECT tanggal FROM prd_sidangmaster WHERE STATUS=1;";
        $command=Yii::app()->db->createCommand($sql)->queryScalar();
        return $command;
    }
    public function hitungjmlsidang($idjenis)
    {
        if($idjenis=="")
            $idjenis=0;
        $sql="SELECT COUNT(*) FROM prd_pendaftaran p 
            LEFT JOIN prd_sidangmaster sm ON p.IdSidang=sm.IdSidang 
            LEFT JOIN prd_jenissidang js ON sm.IdJenisSidang=js.IdJenisSidang 
            WHERE js.IdJenisSidang=".$idjenis." AND sm.tanggal<=(SELECT tanggal 
            FROM prd_sidangmaster WHERE STATUS=1 AND IdJenisSidang=".$idjenis.")";
        $command=Yii::app()->db->createCommand($sql)->queryScalar();
        return $command;
    }

}
