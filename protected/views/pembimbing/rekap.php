<script type="text/javascript">
    var username = "";
    function kirim_pesan(pesan) {
        var pesanSebelumnya = $("#container").html();
        if (pesanSebelumnya.length > 9) {
            pesanSebelumnya = pesanSebelumnya + "<br>";
            alert("pesan telah dikirim");
        }

        $("#container").html(pesanSebelumnya + "<span class='pesanTerkini'>" + "<span class='bot'>Chatbot : </span>" + pesan + "</span>");
        $(".pesanTerkini").hide();
        $(".pesanTerkini").delay(500).fadeIn();
        $(".pesanTerkini").removeClass("pesanTerkini");

    }
    function getUsername() {
        kirim_pesan("Hello, Nama kamu siapa ?");
    }
    function ai(pesan) {
        if (username.length < 3) {
            username = pesan;
            kirim_pesan("Senang berkenalan dengan anda " + username + ", apa kabar ?");
        }

        if (pesan.indexOf("apa kabar") >= 0) {
            kirim_pesan("Terimakasih, Saya baik2 juga.")
        }

        if ((pesan.indexOf("jam") >= 0) || (pesan.indexOf("pukul") >= 0)) {
            var tanggal = new Date();
            var h = tanggal.getHours();
            var m = tanggal.getMinutes();
            kirim_pesan("sekarang jam : " + h + ":" + m);
        }

        if (pesan.indexOf("tanggal") >= 0) {
            var tanggal = new Date();
            var h = tanggal.getDate();
            var bulan = tanggal.getMonth();
            var tahun = tanggal.getYear();
            var m = tanggal.getDay();

            if (m === 1) {
                m = "Senin";
            } else if (m === 2) {
                m = "Selasa";
            } else if (m === 3) {
                m = "Rabu";
            } else if (m === 4) {
                m = "Kamis";
            } else if (m === 5) {
                m = "Jumat";
            } else if (m === 6) {
                m = "Sabtu";
            } else if (m === 7) {
                m = "Minggu";
            }

            if (bulan === 1) {
                bulan = "Januari";
            } else if (bulan === 2) {
                bulan = "Februaru";
            } else if (bulan === 3) {
                bulan = "Maret";
            } else if (bulan === 4) {
                bulan = "April";
            } else if (bulan === 5) {
                bulan = "Mei";
            } else if (bulan === 6) {
                bulan = "Juni";
            } else if (bulan === 7) {
                bulan = "Juli";
            } else if (bulan === 8) {
                bulan = "Agustus";
            } else if (bulan === 9) {
                bulan = "September";
            } else if (bulan === 10) {
                bulan = "Oktober";
            } else if (bulan === 11) {
                bulan = "November";
            } else if (bulan === 12) {
                bulan = "Desember";
            }
            kirim_pesan("sekarang hari : " + m + " Tanggal : " + h + " Bulan " + bulan + " Tahun  " + tahun);
        }
    }
    $(function () {
        getUsername();
        $("#area").keypress(function (event) {
            if (event.which == 13) {
                if ($("#enter").prop("checked")) {
                    console.log("berhasil");
                    $("#kirim").click();
                    event.preventDefault();
                }
            }
        });

        $("#kirim").click(function () {
            var username = "<span class='username'>Kamu : </span>";
            var pesanPengguna = $("#area").val();
            $("#area").val("");
            var pesanSebelumnya = $("#container").html();
            console.log(pesanSebelumnya.length);
            if (pesanSebelumnya.length > 9) {
                pesanSebelumnya = pesanSebelumnya + "<br>";
            }
            $("#container").html(pesanSebelumnya + username + pesanPengguna);
            $("#container").scrollTop($("#container").prop("scrollHeight"));
            ai(pesanPengguna);
        });
    });
</script>

<div>
    <hr/>
    <?php
    if (Yii::app()->user->getLevel() == 1) {
        $this->renderPartial('_searchNamaSidang', array(
            'model' => $model,
        ));
    }
    ?>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Data Pembimbing</h2> 
                <?php
                if (Yii::app()->user->getLevel() == 1) {
                    echo "<div class=\"filter-block pull-right\">";
                    echo "<a id=\"ctl0_maincontent_btnPrintOut\" class=\"btn btn-primary pull-left\" title=\"Print Out Data Pendaftaran\" href=\"pendaftaran/export\"><i class=\"fa fa-print fa-lg\"></i></a>";
                    echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('pengajuan/admin'), array('class' => 'btn btn-primary pull-left', 'title' => 'Tambah Pembimbing'));
                    echo "</div>";
                }
                ?>

            </header>
            <div class="main-box-body clearfix">  
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'pembimbing-grid',
                        'itemsCssClass' => 'table table-striped',
                        'dataProvider' => $model->carirekap(),
                        // 'filter' => $model,
                        'columns' => array(
                            array(
                                'header' => "No",
                                'value' => '($this->grid->dataProvider->pagination->currentPage*
                                               $this->grid->dataProvider->pagination->pageSize
                                              )+
                                              array_search($data,$this->grid->dataProvider->getData())+1',
                                'htmlOptions' => array(
                                    'style' => 'width: 2%; text-align: center;',
                                ),
                            ),
                            array(
                                'name' => 'kodeDosen',
                                'type' => 'raw',
                                'header' => 'Pembimbing',
                                'value' => '$data->kodeDosen',
                                'htmlOptions' => array('width' => '30%'),
                            ),
                            array(
                                'name' => 'namaDosen',
                                'type' => 'raw',
                                'header' => 'Nama',
                                'value' => '$data->namaDosen',
                                'htmlOptions' => array('width' => '30%'),
                            ),
                            array(
                                'name' => 'jml',
                                'type' => 'raw',
                                'header' => 'Jumlah',
                                'value' => '$data->jml',
                                'htmlOptions' => array('width' => '40px'),
                            ),
                        ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>   
