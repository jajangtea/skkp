<?php

/**
 * This is the model class for table "prd_mahasiswa".
 *
 * The followings are the available columns in table 'prd_mahasiswa':
 * @property integer $NIM
 * @property string $Nama
 * @property string $Tlp
 * @property string $KodeJurusan
 * @property integer $IdUser
 *
 * The followings are the available model relations:
 * @property Jurusan $kodeJurusan
 * @property User $idUser
 * @property Nilaikp[] $nilaikps
 * @property Pendaftaran[] $pendaftarans
 */
class Mahasiswa extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'prd_mahasiswa';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('NIM', 'required'),
            array('NIM, IdUser', 'numerical', 'integerOnly' => true),
            array('Nama', 'length', 'max' => 200),
            array('Tlp', 'length', 'max' => 20),
            array('KodeJurusan', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('NIM, Nama, Tlp, KodeJurusan, IdUser', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'kodeJurusan' => array(self::BELONGS_TO, 'Jurusan', 'KodeJurusan'),
            'idUser' => array(self::BELONGS_TO, 'User', 'IdUser'),
            'nilaikps' => array(self::HAS_MANY, 'Nilaikp', 'NIM'),
            'pendaftarans' => array(self::HAS_MANY, 'Pendaftaran', 'NIM'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'NIM' => 'Nim',
            'Nama' => 'Nama',
            'Tlp' => 'Tlp',
            'KodeJurusan' => 'Kode Jurusan',
            'IdUser' => 'Id User',
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

        $criteria = new CDbCriteria;

        $criteria->compare('NIM', $this->NIM);
        $criteria->compare('Nama', $this->Nama, true);
        $criteria->compare('Tlp', $this->Tlp, true);
        $criteria->compare('KodeJurusan', $this->KodeJurusan, true);
        $criteria->compare('IdUser', $this->IdUser);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Mahasiswa the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function suggest($keyword, $limit = 20) {
        $models = $this->findAll(array(
            'condition' => 'Nama LIKE :keyword or NIM LIKE :kode',
            'order' => 'Nama',
            'limit' => $limit,
            'params' => array(':keyword' => "%$keyword%", ':kode' => "%$keyword%")
        ));
        $suggest = array();
        foreach ($models as $model) {
            $suggest[] = array(
                'label' => $model->NIM . ' - ' . $model->Nama . ' - ' . $model->KodeJurusan, // label for dropdown list
                'value' => $model->NIM, // value for input field
                'nimMhs' => $model->NIM, // return values from autocomplete
                'namaMhs' => $model->Nama,
                'namaProdi' => $model->KodeJurusan,
            );
        }
        return $suggest;
    }

    public function suggestpendaftaran($keyword, $limit = 20) {
        $sql="SELECT * FROM prd_mahasiswa t INNER JOIN prd_pendaftaran pp ON pp.NIM=t.NIM
            INNER JOIN prd_sidangmaster ps ON ps.IdSidang=pp.IdSidang
            INNER JOIN prd_jenissidang pj ON pj.IDJenisSidang=ps.IDJenisSidang WHERE t.Nama LIKE '%$keyword%' or t.NIM LIKE '%$keyword%'";
        $models= Yii::app()->db->createCommand($sql)->queryAll();
        $suggest = array();
        foreach ($models as $model) {
            $suggest[] = array(
                'label' => $model['NIM'] . ' - ' . $model['Nama'] . ' - ' . $model['KodeJurusan']. ' - ' . $model['NamaSidang'], // label for dropdown list
                'value' => $model['NIM'], // value for input field
                'nim' => $model['NIM'], // return values from autocomplete
                'namaMhs' => $model['Nama'],
                'namaProdi' => $model['KodeJurusan'],
                'namaSidang' => $model['NamaSidang'],
                'namaSidang' => $model['idPendaftaran'],
            );
        }
        return $suggest;
    }
    
    public function suggestnilai($keyword, $limit = 20) {
        $sql="SELECT * FROM prd_mahasiswa t INNER JOIN prd_pendaftaran pp ON pp.NIM=t.NIM
            INNER JOIN prd_sidangmaster ps ON ps.IdSidang=pp.IdSidang
            INNER JOIN prd_jenissidang pj ON pj.IDJenisSidang=ps.IDJenisSidang WHERE t.Nama LIKE '%$keyword%' or t.NIM LIKE '%$keyword%'";
        $models= Yii::app()->db->createCommand($sql)->queryAll();
        $suggest = array();
        foreach ($models as $model) {
            $suggest[] = array(
                'label' => $model['NIM'] . ' - ' . $model['Nama'] . ' - ' . $model['KodeJurusan']. ' - ' . $model['NamaSidang'], // label for dropdown list
                'value' => $model['NIM'], // value for input field
                'nim' => $model['NIM'], // return values from autocomplete
                'namaMhs' => $model['Nama'],
                'namaProdi' => $model['KodeJurusan'],
                'namaSidang' => $model['NamaSidang'],
                'namaSidang' => $model['idPendaftaran'],
            );
        }
        return $suggest;
    }
}
