<?php

/**
 * This is the model class for table "inventarisasi".
 *
 * The followings are the available columns in table 'inventarisasi':
 * @property string $noInventaris
 * @property string $noRuangan
 * @property string $kodeBarang
 * @property integer $jumlah
 * @property string $tanggal
 * @property string $kondisi
 * @property string $subNilai
 *
 * The followings are the available model relations:
 * @property Ruangan $noRuangan0
 * @property AsetBarang $kodeBarang0
 */
class Inventarisasi extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'inventarisasi';
    }
    
    public function afterFind() {
        $this->subNilai = Yii::app()->format->number($this->subNilai);
        return parent::afterFind();
    }

    public function behavior() {
        return array(
            array(
                'class' => 'ext.autonumber.MdmAutonumberBehavior',
                'attribute' => 'noInventaris', // required
                'group' => 'kodeBarang', // required, unique
                'value' => 'SA-' . date('Y-m-d') . '?', // format auto number. '?' will be replaced with generated number
                'digit' => 4 // optional, default to null. 
            ),
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('jumlah,tanggal,kondisi,noRuangan,kodeBarang', 'required'),
            array('jumlah', 'numerical', 'integerOnly' => true),
            array('noInventaris', 'length', 'max' => 20),
            array('noRuangan, kondisi', 'length', 'max' => 10),
            array('kodeBarang', 'length', 'max' => 15),
            array('tanggal', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('noInventaris, noRuangan,subNilai,kodeBarang, jumlah, tanggal, kondisi', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'noRuangan0' => array(self::BELONGS_TO, 'Ruangan', 'noRuangan'),
            'kodeBarang0' => array(self::BELONGS_TO, 'AsetBarang', 'kodeBarang'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'noInventaris' => 'No Inventaris',
            'noRuangan' => 'No Ruangan',
            'kodeBarang' => 'Kode Barang',
            'jumlah' => 'Jumlah',
            'tanggal' => 'Tanggal',
            'kondisi' => 'Kondisi',
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

        $criteria->compare('noInventaris', $this->noInventaris, true);
        $criteria->compare('noRuangan', $this->noRuangan, true);
        $criteria->compare('kodeBarang', $this->kodeBarang, true);
        $criteria->compare('jumlah', $this->jumlah);
        $criteria->compare('tanggal', $this->tanggal, true);
        $criteria->compare('kondisi', $this->kondisi, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Inventarisasi the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getRuangan() {
        return CHtml::listData(Ruangan::model()->findAll(), 'noRuangan', 'noRuangan');
    }

    public function getKondisi() {
        return array('Baik' => 'Baik', 'Layak' => 'Layak', 'Rusak' => 'Rusak');
    }

    public function generateKode() {
        $_d = date("ym");
        $_i = "AS";
        $_left = $_i . $_d;
        $_first = "000001";
        $_len = strlen($_left);
        $no = $_left . $_first;

        $last_po = $this->find(
                array(
                    "select" => "noInventaris",
                    "condition" => "left(noInventaris, " . $_len . ") = :_left",
                    "params" => array(":_left" => $_left),
                    "order" => "noInventaris DESC"
        ));

        if ($last_po != null) {
            $_no = substr($last_po->noInventaris, $_len);
            $_no++;
            $_no = substr("000000", strlen($_no)) . $_no;
            $no = $_left . $_no;
        }

        return $no;
    }
    
    public function getTotals($ids) {
        $ids = implode("','", $ids);
        $connection = Yii::app()->db;
        $command = $connection->createCommand("SELECT SUM(subNilai)FROM `inventarisasi` where noInventaris in ('$ids')");
        return Yii::app()->format->number($amount = $command->queryScalar());
    }
    
    

}
