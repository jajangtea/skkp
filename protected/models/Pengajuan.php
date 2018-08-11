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
 * @property integer $IDstatusProposal
 * @property string $keterangan
 * @property Pembimbing[] $pembimbings
 * 
 * The followings are the available model relations:
 * @property Pembimbing[] $pembimbings
 * @property Jenissidang $iDJenisSidang
 * @property Mahasiswa $nIM
 * @property StatusProposal $idstatus
 * @property UploadProposal[] $uploadProposals
 */
class Pengajuan extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $IDJenisSidang, $jmlsyarat, $telahupload, $status, $bulan, $tahun;

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
            array('IDJenisSidang', 'cekPendaftaran', 'on' => 'create'),
            array('update_at', 'safe'),
            array('IDJenisSidang,idPeriode, NIM,IDstatusProposal', 'numerical', 'integerOnly' => true),
            array('TanggalDaftar, Judul,keterangan,IDstatusProposal', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IDPengajuan, IDJenisSidang,idPeriode, NIM, TanggalDaftar,bulan,tahun,IDstatusProposal,keterangan, Judul', 'safe', 'on' => 'search'),
        );
    }

    public function cekPendaftaran($attribute, $params) {
        if (!$this->hasErrors()) {
            $sql = "select count(*) from prd_pengajuan where nim='$this->NIM' and IDJenisSidang='$this->IDJenisSidang'";
            $command = Yii::app()->db->createCommand($sql)->queryScalar();
            if ($command >= 1)
                $this->addError('IDJenisSidang', 'Anda telah terdaftar.');
        }
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
            'iDstatusProposal' => array(self::BELONGS_TO, 'StatusProposal', 'IDstatusProposal'),
            'uploadProposals' => array(self::HAS_MANY, 'UploadProposal', 'idPengajuan'),
            'pembimbings' => array(self::HAS_MANY, 'Pembimbing', 'idPengajuan'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IDPengajuan' => 'Idpengajuan',
            'IDJenisSidang' => 'Proposal',
            'idPeriode' => 'Id Periode',
            'NIM' => 'NIM',
            'TanggalDaftar' => 'Tanggal Daftar',
            'Judul' => 'Judul',
            'IDstatusProposal' => 'Status',
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
            $criteria = new CDbCriteria();
            $criteria->join ='INNER JOIN prd_jenissidang js ON js.IDJenisSidang=t.IDJenisSidang '
                    . 'INNER JOIN prd_periode pr ON t.idPeriode=pr.idPeriode';
            $criteria->order = 't.IDstatusProposal desc';
        }


        $criteria->compare('IDPengajuan', $this->IDPengajuan);
        $criteria->compare('t.IDJenisSidang', $this->IDJenisSidang);
        $criteria->compare('NIM', $this->NIM);
        $criteria->compare('TanggalDaftar', $this->TanggalDaftar, true);
        $criteria->compare('Judul', $this->Judul, true);
        $criteria->compare('IDstatusProposal', $this->IDstatusProposal);
        $criteria->compare('pr.bulan', $this->bulan);
        $criteria->compare('pr.tahun', $this->tahun);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function searc() {
        // @todo Please modify the following code to remove attributes that should not be searched.
     

  $criteria = new CDbCriteria();
        $criteria->compare('IDPengajuan', $this->IDPengajuan);
        $criteria->compare('t.IDJenisSidang', $this->IDJenisSidang);
        $criteria->compare('NIM', $this->NIM);
        $criteria->compare('TanggalDaftar', $this->TanggalDaftar, true);
        $criteria->compare('Judul', $this->Judul, true);
        $criteria->compare('IDstatusProposal', $this->IDstatusProposal);
        $criteria->compare('pr.bulan', $this->bulan);
        $criteria->compare('pr.tahun', $this->tahun);

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

    public function suggest($id, $limit = 20) {
        $sql = "SELECT * FROM prd_mahasiswa t 
            INNER JOIN prd_pengajuan pp ON pp.NIM=t.NIM 
            INNER JOIN prd_jenissidang ps ON pp.IDJenisSidang=ps.IDJenisSidang 
            WHERE t.Nama LIKE '%$id%' or t.NIM LIKE '%$id%'";
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
        return CHtml::listData(StatusProposal::model()->findAll(), 'idstatusProp', 'nstatusProposal');
    }
    
    public function searcproposal($bulan, $tahun) {
        // @todo Please modify the following code to remove attributes that should not be searched.
        if (Yii::app()->user->getLevel() == 2) {
            $criteria = new CDbCriteria(array
                (
                'condition' => 'NIM=:NIM',
                'params' => array(':NIM' => Yii::app()->user->name),
            ));
        } else {
            $criteria = new CDbCriteria(array
                (
                'condition' => "pr.bulan=$bulan and pr.tahun=$tahun",
            ));
            $criteria->join ='INNER JOIN prd_jenissidang js ON js.IDJenisSidang=t.IDJenisSidang '
                    . 'INNER JOIN prd_periode pr ON t.idPeriode=pr.idPeriode';
            $criteria->order = 'js.NamaSidang';
        }
        $criteria->compare('IDPengajuan', $this->IDPengajuan);
        $criteria->compare('TanggalDaftar', $this->TanggalDaftar, true);
        $criteria->compare('NIM', $this->NIM);
        $criteria->compare('js.IDJenisSidang', $this->IDJenisSidang);
        $criteria->compare('Judul', $this->Judul, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
