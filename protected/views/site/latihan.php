<html>
    <head>
        <title>Chat</title>
        <style type="text/css">
            body{
                font-family: arial,sans-serif;
                margin: 0;
                background-color: #f2f2f2;

            }
            #header{
                width: 100%;
                height: 60px;
                background-color: #333;
                box-shadow: 0px 4px 2px #333;
            }

            #header>h1{
                width: 1024px;
                margin: 0px auto;
                color: white;
                padding: 12px;
            }

            #container{
                width: 1000px;
                height: 500px;
                margin: 0px auto;
                margin-top: 20px;
                background-color: white;
                border: 1px solid #333;
                overflow: scroll;
            }
            #controls{
                width: 1024px;
                margin: 0px auto;
            }

            textArea{
                margin-top: 10px;
                resize: none;
                width: 900px;
                height: 40px;
            }

            #kirim{
                margin-top: 10px;
                font-size: 20px;
                width: 100px;
                height: 40px;
                position: absolute;
            }
            .username{
                color: green;
                font-weight: bold;
            }

            .bot{
                color: blue;
                font-weight: bold;
            }
        </style>

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
                    
                    if(m===1){
                        m="Senin";
                    }else if(m===2){
                        m="Selasa";
                    }else if(m===3){
                        m="Rabu";
                    }else if(m===4){
                        m="Kamis";
                    }else if(m===5){
                        m="Jumat";
                    }else if(m===6){
                        m="Sabtu";
                    }else if(m===7){
                        m="Minggu";
                    }
                    
                     if(bulan===1){
                        bulan="Januari";
                    }else if(bulan===2){
                        bulan="Februaru";
                    }else if(bulan===3){
                        bulan="Maret";
                    }else if(bulan===4){
                        bulan="April";
                    }else if(bulan===5){
                        bulan="Mei";
                    }else if(bulan===6){
                        bulan="Juni";
                    }else if(bulan===7){
                        bulan="Juli";
                    }else if(bulan===8){
                        bulan="Agustus";
                    }else if(bulan===9){
                        bulan="September";
                    }else if(bulan===10){
                        bulan="Oktober";
                    }else if(bulan===11){
                        bulan="November";
                    }else if(bulan===12){
                        bulan="Desember";
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
    </head>
    <body>
        <br>
        <div id="header">
            <h1>Belajar Chat Bot</h1>
        </div>
        <div id="container">
        </div>
        <div id="controls">
            <textarea id="area" placeholder="Masukan pesan anda..."></textarea>
            <button id="kirim">Kirim</button>
            <br/>
            <input checked type="checkbox" id="enter"/>
            <label>Kirim menggunakan Enter</label>
        </div>
    </body>
</html>