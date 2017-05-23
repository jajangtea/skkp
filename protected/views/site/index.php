<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<div class="row">
    <div class="col-lg-3 col-sm-6 col-xs-12">
        <a href="#" OnClick="return false;">
            <div class="main-box infographic-box colored emerald-bg">
                <i class="fa fa-users"></i>
                <span class="headline">Pendaftar Sidang Kerja Praktek</span>
                <span class="value">2340</span>
            </div>
        </a>
    </div>    
    <div class="col-lg-3 col-sm-6 col-xs-12">
        <a href="#" OnClick="return false;">
            <div class="main-box infographic-box colored green-bg">
                <i class="fa fa-table"></i>
                <span class="headline">Pendaftar Sidang Pra Sidang Skripsi</span>
                <span class="value">1123</span>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6 col-xs-12">
        <a href="#" OnClick="return false;">
            <div class="main-box infographic-box colored purple-bg">
                <i class="fa fa-graduation-cap"></i>
                <span class="headline">Pendaftar Sidang Sidang Akhir Skripsi</span>
                <span class="value">11</span>
            </div>
        </a>
    </div>   
    <div class="col-lg-3 col-sm-6 col-xs-12">
        <a href="#" OnClick="return false;">
            <div class="main-box infographic-box colored red-bg">
                <i class="fa fa-thumbs-up"></i>
                <span class="headline">Pendaftar Sidang Kompre</span>
                <span class="value">819</span>
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
                    if ($data > 0) {
                        echo "<div class=\"alert alert-info\">";
                        echo "<i class=\"fa fa-info-circle fa-fw fa-lg\"></i>";
                        echo "<strong>";
                        echo " Informasi ! ";
                        echo "<br/>";
                        echo "<br/>";
                        echo "</strong>";
                        echo "Diberitahukan kepada mahasiswa/i bahwa sidang Kerja Praktek, Pra Sidang dan Sidang Skripsi akan diadakan pada tanggal : <strong>".$data['Tanggal']."</strong>";
                        echo "<br/>";
                        echo "Pendaftaran dibuka Tanggal : <strong>".$data['tglBuka']."</strong>";
                        echo "<br/>";
                        echo "Pendaftaran ditutup Tanggal : <strong>".$data['tglTutup']."</strong>";
                        echo "</div>";

                        echo "<div class=\"alert alert-danger\">";
                        echo "<i class=\"fa fa-info-circle fa-fw fa-lg\"></i>";
                        echo "<strong>";
                        echo " Keterangan : ";
                        echo "<br/>";
                        echo "<br/>";
                        echo "</strong>";
                        echo "Mahasiswa agar melakukan pendaftaran secara online pada link berikut :".CHtml::link('Daftar Sidang',array('pendaftaran/create'))." dan pengumpulan berkas paling lambat sesuai dengan penutupan pendaftaran.";
                        echo "</div>";
                    } else 
                    {
                        echo "<div class=\"alert alert-warning\">";
                        echo "<i class=\"fa fa-info-circle fa-fw fa-lg\"></i>";
                        echo "<strong>";
                        echo " Keterangan : ";
                        echo "<br/>";
                        echo "<br/>";
                        echo "</strong>";
                        echo 'Tidak ada Pelaksanaan sidang pada bulan ini.';
                        echo "</div>";
                        
                    }
                    ?>
            </div>
        </div>
    </div>        	
</div>