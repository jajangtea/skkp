<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<div class="main-box clearfix">                
    <div class="main-box-body clearfix">
        <div class="row">
            <div class="col-lg-12">
                <?php
                $dataTglPraSidang = strtotime($dataPraSidang['Tanggal']);
                $dataTglPraSidangBuka = strtotime($dataPraSidang['tglBuka']);
                $dataTglPraSidangTutup = strtotime($dataPraSidang['tglTutup']);

                $tglPraSidang = date('d-m-Y', $dataTglPraSidang);
                $tglPraSidangBuka = date('d-m-Y', $dataTglPraSidangBuka);
                $tglPraSidangTutup = date('d-m-Y', $dataTglPraSidangTutup);

                $hariPraSidang = date('D', strtotime($tglPraSidang));
                $hariPraSidangBuka = date('D', strtotime($tglPraSidangBuka));
                $hariPraSidangTutup = date('D', strtotime($tglPraSidangTutup));


                $dataTglSidangAkhir = strtotime($dataSidangAkhir['Tanggal']);
                $dataTglSidangAkhirBuka = strtotime($dataSidangAkhir['tglBuka']);
                $dataTglSidangAkhirTutup = strtotime($dataSidangAkhir['tglTutup']);

                $tglSidangAkhir = date('d-m-Y', $dataTglSidangAkhir);
                $tglSidangAkhirBuka = date('d-m-Y', $dataTglSidangAkhirBuka);
                $tglSidangAkhirTutup = date('d-m-Y', $dataTglSidangAkhirTutup);

                $hariSidangAkhir = date('D', strtotime($tglSidangAkhir));
                $hariSidangAkhirBuka = date('D', strtotime($tglSidangAkhirBuka));
                $hariSidangAkhirTutup = date('D', strtotime($tglSidangAkhirTutup));



                $dataTglSidangKP = strtotime($dataSidangKP['Tanggal']);
                $dataTglSidangKPBuka = strtotime($dataSidangKP['tglBuka']);
                $dataTglSidangKPTutup = strtotime($dataSidangKP['tglTutup']);

                $tglSidangKP = date('d-m-Y', $dataTglSidangKP);
                $tglSidangKPBuka = date('d-m-Y', $dataTglSidangKPBuka);
                $tglSidangKPTutup = date('d-m-Y', $dataTglSidangKPTutup);

                $hariSidangKP = date('D', strtotime($tglSidangKP));
                $hariSidangKPBuka = date('D', strtotime($tglSidangKPBuka));
                $hariSidangKPTutup = date('D', strtotime($tglSidangKPTutup));


                $dataTglSidangKompre = strtotime($dataSidangKompre['Tanggal']);
                $dataTglSidangKompreBuka = strtotime($dataSidangKompre['tglBuka']);
                $dataTglSidangKompreTutup = strtotime($dataSidangKompre['tglTutup']);

                $tglSidangKompre = date('d-m-Y', $dataTglSidangKompre);
                $tglSidangKompreBuka = date('d-m-Y', $dataTglSidangKompreBuka);
                $tglSidangKompreTutup = date('d-m-Y', $dataTglSidangKompreTutup);

                $hariSidangKompre = date('D', strtotime($tglSidangKompre));
                $hariSidangKompreBuka = date('D', strtotime($tglSidangKompreBuka));
                $hariSidangKompreTutup = date('D', strtotime($tglSidangKompreTutup));

                // $pen = new Penanggal
//                echo CHtml::form();
//                echo CHtml::ajaxButton(
//                        'DoAjaxRequest', //label
//                        '', // url for request
//                        array(
//                    'beforeSend' => 'function(){
//                    $("#myDiv").addClass("loading");}',
//                    'complete' => 'function(){
//                    $("#myDiv").removeClass("loading");}',
//                        )
//                );
//                echo CHtml::endForm();
                ?>

                <h3>Jumlah Pendaftar sidang Periode <strong> <?= Yii::t('zii', $hariPraSidang) . "," . $tglPraSidang ?></strong> </h3>
            </div>
        </div>                    
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-6 col-xs-12">
        <a href="index.php?r=pendaftaran/create" OnClick="return true;">
            <div class="main-box infographic-box colored emerald-bg">
                <i class="fa fa-users"></i>
                <span class="headline">Pendaftar Sidang Kerja Praktek</span>
                <span class="value"><?= $jumlahSidangKP ?></span>
            </div>
        </a>
    </div>    
    <div class="col-lg-3 col-sm-6 col-xs-12">
        <a href="index.php?r=pendaftaran/create" OnClick="return true;">
            <div class="main-box infographic-box colored green-bg">
                <i class="fa fa-table"></i>
                <span class="headline">Pendaftar Sidang Pra Sidang Skripsi</span>
                <span class="value"><?= $jumlahPrasidang ?></span>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6 col-xs-12">
        <a href="index.php?r=pendaftaran/create" OnClick="return true;">
            <div class="main-box infographic-box colored purple-bg">
                <i class="fa fa-graduation-cap"></i>
                <span class="headline">Pendaftar Sidang Sidang Akhir Skripsi</span>
                <span class="value"><?= $jumlahSidangAkhir ?></span>
            </div>
        </a>
    </div>   
    <div class="col-lg-3 col-sm-6 col-xs-12">
        <a href="index.php?r=pendaftaran/create" OnClick="return true;">
            <div class="main-box infographic-box colored red-bg">
                <i class="fa fa-thumbs-up"></i>
                <span class="headline">Pendaftar Sidang Komprehensif</span>
                <span class="value"><?= $jumlahSidangKompre ?></span>
            </div>
        </a>
    </div>    
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box">
            <header class="main-box-header clearfix">
                <h2><i class="fa fa-microphone"></i> Pengumuman</h2>
            </header>
            <div class="main-box-body clearfix">
                <?php
                if ($dataPraSidang > 0) {
                    echo "<div class=\"alert alert-info\">";
                    echo "<i class=\"fa fa-info-circle fa-fw fa-lg\"></i>";
                    echo "<strong>";
                    echo " Informasi PRA SIDANG SKRIPSI ! ";
                    echo "<br/>";
                    echo "<br/>";
                    echo "</strong>";
                    echo "Diberitahukan kepada mahasiswa/i Pra Sidang Skripsi akan diadakan pada tanggal : <strong>" . Yii::t('zii', $hariPraSidang) . "," . $tglPraSidang . "</strong>";
                    echo "<br/>";
                    echo "Pendaftaran dibuka Tanggal : <strong>" . Yii::t('zii', $hariPraSidang) . "," . $tglPraSidangBuka . "</strong>";
                    echo "<br/>";
                    echo "Pendaftaran ditutup Tanggal : <strong>" . Yii::t('zii', $hariPraSidangTutup) . "," . $tglPraSidangTutup . "</strong>";
                    echo "</div>";
                } else {
                    echo "<div class=\"alert alert-danger\">";
                    echo "<i class=\"fa fa-info-circle fa-fw fa-lg\"></i>";
                    echo "<strong>";
                    echo " Keterangan : ";
                    echo "<br/>";
                    echo "<br/>";
                    echo "</strong>";
                    echo 'Tidak ada Pelaksanaan sidang <strong>Pra Sidang</strong> pada bulan ini.';
                    echo "</div>";
                }

                if ($dataSidangAkhir > 0) {
                    echo "<div class=\"alert alert-success\">";
                    echo "<i class=\"fa fa-info-circle fa-fw fa-lg\"></i>";
                    echo "<strong>";
                    echo " Informasi SIDANG AKHIR SKRIPSI ! ";
                    echo "<br/>";
                    echo "<br/>";
                    echo "</strong>";
                    echo "Diberitahukan kepada mahasiswa/i bahwa Sidang Akhir Skripsi akan diadakan pada tanggal : <strong>" . Yii::t('zii', $hariSidangAkhir) . "," . $tglSidangAkhir . "</strong>";
                    echo "<br/>";
                    echo "Pendaftaran dibuka Tanggal : <strong>" . Yii::t('zii', $hariSidangAkhir) . "," . $tglSidangAkhir . "</strong>";
                    echo "<br/>";
                    echo "Pendaftaran ditutup Tanggal : <strong>" . Yii::t('zii', $hariSidangAkhirTutup) . "," . $tglSidangAkhirTutup . "</strong>";
                    echo "</div>";
                } else {
                    echo "<div class=\"alert alert-danger\">";
                    echo "<i class=\"fa fa-info-circle fa-fw fa-lg\"></i>";
                    echo "<strong>";
                    echo " Keterangan : ";
                    echo "<br/>";
                    echo "<br/>";
                    echo "</strong>";
                    echo 'Tidak ada Pelaksanaan sidang <strong>Sidang Akhir</strong> pada bulan ini.';
                    echo "</div>";
                }

                if ($dataSidangKP > 0) {
                    echo "<div class=\"alert alert-warning\">";
                    echo "<i class=\"fa fa-info-circle fa-fw fa-lg\"></i>";
                    echo "<strong>";
                    echo " Informasi SIDANG KERJA PRAKTEK ! ";
                    echo "<br/>";
                    echo "<br/>";
                    echo "</strong>";
                    echo "Diberitahukan kepada mahasiswa/i bahwa sidang Kerja Praktek akan diadakan pada tanggal : <strong>" . Yii::t('zii', $hariSidangKP) . "," . $tglSidangKP . "</strong>";
                    echo "<br/>";
                    echo "Pendaftaran dibuka Tanggal : <strong>" . Yii::t('zii', $hariSidangKPBuka) . "," . $tglSidangKPBuka . "</strong>";
                    echo "<br/>";
                    echo "Pendaftaran ditutup Tanggal : <strong>" . Yii::t('zii', $hariSidangKPTutup) . "," . $tglSidangKPTutup . "</strong>";
                    echo "</div>";
                } else {
                    echo "<div class=\"alert alert-danger\">";
                    echo "<i class=\"fa fa-info-circle fa-fw fa-lg\"></i>";
                    echo "<strong>";
                    echo " Keterangan : ";
                    echo "<br/>";
                    echo "<br/>";
                    echo "</strong>";
                    echo 'Tidak ada Pelaksanaan sidang <strong>Kerja Praktek</strong> pada bulan ini.';
                    echo "</div>";
                }

                if ($dataSidangKompre > 0) {
                    echo "<div class=\"alert alert-info\">";
                    echo "<i class=\"fa fa-info-circle fa-fw fa-lg\"></i>";
                    echo "<strong>";
                    echo " Informasi ! ";
                    echo "<br/>";
                    echo "<br/>";
                    echo "</strong>";
                    echo "Diberitahukan kepada mahasiswa/i bahwa sidang komprehensif akan diadakan pada tanggal : <strong>" . Yii::t('zii', $hariSidangKompre) . "," . $tglSidangKompre . "</strong>";
                    echo "<br/>";
                    echo "Pendaftaran dibuka Tanggal : <strong>" . Yii::t('zii', $hariSidangKompre) . "," . $tglSidangKompreBuka . "</strong>";
                    echo "<br/>";
                    echo "Pendaftaran ditutup Tanggal : <strong>" . Yii::t('zii', $hariSidangKompreTutup) . "," . $tglSidangKompreTutup . "</strong>";
                    echo "</div>";
                } else {
                    echo "<div class=\"alert alert-danger\">";
                    echo "<i class=\"fa fa-info-circle fa-fw fa-lg\"></i>";
                    echo "<strong>";
                    echo " Keterangan : ";
                    echo "<br/>";
                    echo "<br/>";
                    echo "</strong>";
                    echo 'Tidak ada Pelaksanaan sidang <strong>Kompre</strong> pada bulan ini.';
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>        	
</div>