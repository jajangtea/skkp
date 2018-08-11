<?php

/**
 * This is the model class for table "prd_periode".
 *
 * The followings are the available columns in table 'prd_periode':
 * @property integer $idPeriode
 * @property string $tgl
 * @property string $bulan
 * @property string $tahun
 * @property string $tglPeriode
 * @property string $statusVakasi
 * @property string $tglPencairan
 *
 * The followings are the available model relations:
 * @property Sidangmaster[] $sidangmasters
 */
class Periode extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'prd_periode';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tgl, bulan, tahun', 'length', 'max' => 4),
            array('statusVakasi', 'length', 'max' => 20),
            array('tglPeriode, tglPencairan', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPeriode, tgl, bulan, tahun, tglPeriode, statusVakasi, tglPencairan', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'sidangmasters' => array(self::HAS_MANY, 'Sidangmaster', 'idPeriode'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idPeriode' => 'Id Periode',
            'tgl' => 'Tgl',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'tglPeriode' => 'Tgl Periode',
            'statusVakasi' => 'Status Vakasi',
            'tglPencairan' => 'Tgl Pencairan',
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
        $criteria->order = 'tglPeriode DESC';
        $criteria->compare('idPeriode', $this->idPeriode);
        $criteria->compare('tgl', $this->tgl, true);
        $criteria->compare('bulan', $this->bulan, true);
        $criteria->compare('tahun', $this->tahun, true);
        $criteria->compare('tglPeriode', $this->tglPeriode, true);
        $criteria->compare('statusVakasi', $this->statusVakasi, true);
        $criteria->compare('tglPencairan', $this->tglPencairan, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
           
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Periode the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function ubahBulan() {
        if ($this->bulan == "01")
            return "Januari";
        elseif ($this->bulan == "02")
            return "Februari";
        elseif ($this->bulan == "03")
            return "Maret";
        elseif ($this->bulan == "04")
            return "April";
        elseif ($this->bulan == "05")
            return "Mei";
        elseif ($this->bulan == "06")
            return "Juni";
        elseif ($this->bulan == "07")
            return "Juli";
        elseif ($this->bulan == "08")
            return "Agustus";
        elseif ($this->bulan == "09")
            return "September";
        elseif ($this->bulan == "10")
            return "Oktober";
        elseif ($this->bulan == "11")
            return "November";
        elseif ($this->bulan == "12")
            return "Desember";
    }
    
    public function getYear()
    {
        $tahunSekarang=date('Y');
        $tahunDari=2015;
        $tahunAntara=range($tahunDari,$tahunSekarang);
        return array_combine($tahunAntara, $tahunAntara);
    }

}
