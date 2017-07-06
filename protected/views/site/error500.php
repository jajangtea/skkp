<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Cube - Bootstrap Admin Template</title>
	
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />
	
	<!-- RTL support - for demo only -->
	<script src="js/demo-rtl.js"></script>
	<!-- 
	If you need RTL support just include here RTL CSS file <link rel="stylesheet" type="text/css" href="css/libs/bootstrap-rtl.min.css" />
	And add "rtl" class to <body> element - e.g. <body class="rtl"> 
	-->
	
	<!-- libraries -->
	<link rel="stylesheet" type="text/css" href="css/libs/font-awesome.css" />

	<!-- global styles -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme_styles.css" />

	<!-- this page specific styles -->

	<!-- google font libraries -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body id="error-page">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div id="error-box">
					<div class="row">
						<div class="col-xs-12">
							<div id="error-box-inner">
								<img alt="Have you seen this page" src="<?= Yii::app()->request->baseUrl . "/themes/cube/img/error-500-v1.png"?>" />
							</div>
							<h1>ERROR 500</h1>
							<p>
								ada sesuatu yang salah.
							</p>
							<p>
								Kembali ke <a href="index.php?r=site/index">homepage</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- global scripts -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	
	<!-- this page specific scripts -->

	
	<!-- theme scripts -->
	<script src="js/scripts.js"></script>
	
	<!-- this page specific inline scripts -->
	
</body>
</html>