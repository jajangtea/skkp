<?php

/**
 * This is the model class for table "prd_pembimbing".
 *
 * The followings are the available columns in table 'prd_pembimbing':
 * @property integer $idPembimbing
 * @property integer $idDosen
 * @property integer $idPengajuan
 * @property string $status
 *
 * The followings are the available model relations:
 * @property User $idDosen0
 * @property Pengajuan $idPengajuan0
 */
class Pembimbing extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $kodeDosen,$bulan, $tahun, $jml, $namaDosen, $namaSidang;
    public function tableName() {
        return 'prd_pembimbing';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idDosen, idPengajuan,namaSidang', 'numerical', 'integerOnly' => true),
            array('status', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPembimbing, idDosen, kodeDosen,namaSidang, namaDosen jml, idPengajuan', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idDosen0' => array(self::BELONGS_TO, 'User', 'idDosen'),
            'idPengajuan0' => array(self::BELONGS_TO, 'Pengajuan', 'idPengajuan'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idPembimbing' => 'Id Pembimbing',
            'idDosen' => 'Id Dosen',
            'idPengajuan' => 'Id Pengajuan',
            'jml'=>'jml',
            'kodeDosen'=>'kodeDosen',
            'status'=>'status',
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
        if (Yii::app()->user->getLevel() == 3) {
            $criteria = new CDbCriteria(array
                (
                'condition' => 'idDosen=:idDosen',
                'params' => array(':idDosen' => Yii::app()->user->id),
            ));
        } else {
            $criteria = new CDbCriteria;
        }
        $criteria->compare('idPembimbing', $this->idPembimbing);
        $criteria->compare('idDosen', $this->idDosen);
        $criteria->compare('idPengajuan', $this->idPengajuan);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public function carirekap() {
        if (Yii::app()->user->getLevel() == 3) {
            $criteria = new CDbCriteria(array
                (
                'condition' => 'idDosen=:idDosen',
                'params' => array(':idDosen' => Yii::app()->user->id),
            ));
        } else {
            $criteria = new CDbCriteria();
            $criteria->select='count(t.idPengajuan) as jml,pu.username as kodeDosen,pd.NamaDosen as namaDosen';
            $criteria->join = ' INNER JOIN prd_user pu ON t.idDosen=pu.id
                                INNER JOIN prd_pengajuan pj ON t.idPengajuan=pj.IDPengajuan
                                INNER JOIN prd_jenissidang ps ON pj.IDJenisSidang=ps.IDJenisSidang
                                INNER JOIN prd_dosen pd ON pu.id=pd.idUser';
            $criteria->group='t.idDosen';
            $criteria->order = 'jml Desc';
        }
       
        $criteria->compare('t.idPembimbing', $this->idPembimbing);
        $criteria->compare('t.idDosen', $this->idDosen);
        $criteria->compare('kodeDosen', $this->kodeDosen);
        $criteria->compare('namaDosen', $this->namaDosen);
        $criteria->compare('ps.IDJenisSidang', $this->namaSidang,true);
        $criteria->compare('jml', $this->jml);
        $criteria->compare('status', $this->status);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination'=>array
            (
                'pageSize'=>50,
            )
        ));
    }
    
    public function searchid($id) {
        // @todo Please modify the following code to remove attributes that should not be searched.
        if (Yii::app()->user->getLevel() == 3) {
            $criteria = new CDbCriteria(array
                (
                'condition' => 'idDosen=:idDosen',
                'params' => array(':idDosen' => Yii::app()->user->id),
            ));
        } else {
            $criteria = new CDbCriteria;
        }
        $criteria->compare('idPengajuan', $id);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Pembimbing the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    
    public function getIDJenisSidang() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(Sidangmaster::model()->with('iDJenisSidang')->findAll('t.idJenisSidang in(5,6)'), 'IDJenisSidang', 'iDJenisSidang.NamaSidang');
    }
    
    public function statuspembimbing($nim){
        Yii::app()->db->createCommand();
    }

}
