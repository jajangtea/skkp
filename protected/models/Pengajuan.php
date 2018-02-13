 <?php

/**
 * This is the model class for table "prd_pengajuan".
 *
 * The followings are the available columns in table 'prd_pengajuan':
 * @property integer $IDPengajuan
 * @property integer $IDJenisSidang
 * @property integer $NIM
 * @property string $TanggalDaftar
 * @property string $Judul
 * @property integer $idstatusProposal
 * @property string $keterangan
 *
 * The followings are the available model relations:
 * @property Pembimbing[] $pembimbings
 * @property Jenissidang $iDJenisSidang
 * @property Mahasiswa $nIM
 * @property StatusProposal $idstatusProposal0
 * @property UploadProposal[] $uploadProposals
 */
class Pengajuan extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'prd_pengajuan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('IDJenisSidang', 'required', 'message' => 'Jenis proposal tidak boleh kosong.'),
            array('IDJenisSidang, NIM,idstatusProposal', 'numerical', 'integerOnly' => true),
            array('TanggalDaftar, Judul,keterangan,idstatusProposal', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IDPengajuan, IDJenisSidang, NIM, TanggalDaftar,idstatusProposal,keterangan, Judul', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'iDJenisSidang' => array(self::BELONGS_TO, 'Jenissidang', 'IDJenisSidang'),
            'nIM' => array(self::BELONGS_TO, 'Mahasiswa', 'NIM'),
            'idstatusProposal0' => array(self::BELONGS_TO, 'StatusProposal', 'idstatusProposal'),
            'uploadProposals' => array(self::HAS_MANY, 'UploadProposal', 'idPengajuan'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IDPengajuan' => 'Idpengajuan',
            'IDJenisSidang' => 'Proposal',
            'NIM' => 'NIM',
            'TanggalDaftar' => 'Tanggal Daftar',
            'Judul' => 'Judul',
            'idstatusProposal' => 'Status',
            'keterangan' => 'Keterangan'
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
        if (Yii::app()->user->getLevel() == 2) {
            $criteria = new CDbCriteria(array
                (
                'condition' => 'NIM=:NIM',
                'params' => array(':NIM' => Yii::app()->user->name),
            ));
        } else {
            $criteria = new CDbCriteria;
        }


        $criteria->compare('IDPengajuan', $this->IDPengajuan);
        $criteria->compare('IDJenisSidang', $this->IDJenisSidang);
        $criteria->compare('NIM', $this->NIM);
        $criteria->compare('TanggalDaftar', $this->TanggalDaftar, true);
        $criteria->compare('Judul', $this->Judul, true);
        $criteria->compare('idstatusProposal', $this->idstatusProposal);
       
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Pengajuan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function suggest($keyword, $limit = 20) {
        $sql = "SELECT * FROM prd_mahasiswa t 
            INNER JOIN prd_pengajuan pp ON pp.NIM=t.NIM 
            INNER JOIN prd_jenissidang ps ON pp.IDJenisSidang=ps.IDJenisSidang 
            WHERE t.Nama LIKE '%$keyword%' or t.NIM LIKE '%$keyword%'";
//        echo $sql;
//        exit();
        $models = Yii::app()->db->createCommand($sql)->queryAll();
        $suggest = array();
        foreach ($models as $model) {
            $suggest[] = array(
                'label' => $model['NIM'] . ' - ' . $model['Nama'] . ' - ' . $model['KodeJurusan'] . ' - ' . $model['NamaSidang'], // label for dropdown list
                'value' => $model['IDPengajuan'], // value for input field
                'nim' => $model['NIM'], // return values from autocomplete
                'namaMhs' => $model['Nama'],
                'judul' => $model['Judul'],
                'idPengajuan' => $model['IDPengajuan'],
            );
        }
        return $suggest;
    }

    public function status() {
        //this function returns the list of categories to use in a dropdown        
        return CHtml::listData(StatusProposal::model()->findAll(), 'idstatusProposal', 'statusProposal');
    }

}
