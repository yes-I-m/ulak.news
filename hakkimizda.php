<?php
	include("funcs.php");
	//////
	$get_cats=get_categories();
	if($get_cats['status']){
		$get_cats=$get_cats['result'];
	}else{
		$get_cats=[];
	}
	//////
	$get_agency=get_agency_list();
	if($get_agency['status']){
		$get_agency=$get_agency['result'];
	}else{
		$get_agency=[];
	}
	//////
	$son_dakika=get_news("all", 5, 0);
	if($son_dakika['status']){
		$son_dakika=$son_dakika['result'];
	}else{
		$son_dakika=[];
	}
?>
<html lang="tr" style="transform: none;">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="ulak.news">
			<title>Hakkımızda | Ulak.news</title>
			<meta property="og:title" content="Hakkımızda | Ulak.news" />
			<meta name="keywords" content="ulak news hakkında, ulak news nedir, ulak news bilgi" />
			<meta property="og:description" content="Ulak news hakkında sayfası | Ulak.news" />
			<meta name="description" content="Ulak news hakkında sayfası | Ulak.news" />

		<!-- CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/slick.css">
		<link rel="stylesheet" href="css/jplayer.css">
		<link rel="stylesheet" href="css/main.css">  
		<link rel="stylesheet" href="css/responsive.css">

		<!-- font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Signika+Negative" rel="stylesheet">


		<!-- icons -->
		<link rel="icon" href="images/ico/favicon.ico">	
		<link rel="apple-touch-icon" sizes="144x144" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon" sizes="114x114" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon" sizes="72x72" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon" sizes="57x57" href="images/ico/favicon.ico">
		<!-- icons -->

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Template Developed By ThemeRegion -->
	<style id="theia-sticky-sidebar-stylesheet-TSS">.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style></head>
	<body class="about-page tr-page">
		<div class="main-wrapper tr-page-top" style="transform: none;">
			<div class="container-fluid" style="transform: none;">
			<?php include("view/header.php"); ?>
				<div style="background-image: url(images/logo_2.png); height: 300px;" class="page-breadcrumb2 tr-section text-center">
					<div class="breadcrumb-content">
						<div class="page-title">
							<h1>Yaklaşalım.</h1>
						</div>
						<p>En iyi haber okuma deneyimini ve Türkiye'de ki  bir çok haber kaynaklarını birleştirerek sonuç alıyoruz.</p>
					</div>
				</div>
				<div class="tr-section tr-section-padding">
					<div class="tr-mission">
						<div class="text-center">
							<div class="mission-info">
								<div class="section-title">
									<h1>Görevimiz.</h1>
								</div><!-- /.section-title -->
								<p>Birinci görevimiz asla ve asla aldığımız haberlerin içeriklerini değiştirmeden daha okunaklı bir şekilde kullanıcıya REKLAMSIZ Sunmak.</p>
								<p>Haber kaynaklarının emeklerine saygı duymak ve aldığımız bu haberlerin üzerinden maddi bir gelir elde etmemek.</p>
								<p>Saydamlık bizim için çok önemli :) Topladığımız tüm haber verilerini nasıl işlediğimizi isteyen her kullanıcı görebilir.<br/><br/> 
									%99.9 oranında kodlarımız halka açık olarak yayınlamaktayız, kalan %0.01 kısmı veritabanlarımızın şifrelerinin ve bazı doğrulama anahtarlarının bulunduğu environment(değişken kütüphanesi genellikle env.php) dosyamızdır.<br/><br/>
									Kodlarımıza aşağıda ki linklerden ulaşabilirsiniz ve geliştirmemize yardımcı olabilirsiniz.<br/>
								</p>							
							</div>
						</div>
					</div><!-- /.tr-mission -->					

					<div class="tr-services">
						<div class="container">
							<div class="section-title">
								<h1>tr-services</h1>
							</div><!-- /.section-title -->
							<div class="row">
								<div class="col-md-4">
									<div class="service">
										<div class="service-icon">
											<img src="images/service/1.png" alt="Image" class="img-fluid">
										</div>
										<h2>web design</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="service">
										<div class="service-icon">
											<img src="images/service/2.png" alt="Image" class="img-fluid">
										</div>
										<h2>media & content</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="service">
										<div class="service-icon">
											<img src="images/service/3.png" alt="Image" class="img-fluid">
										</div>
										<h2>vedeo prod.</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="service">
										<div class="service-icon">
											<img src="images/service/4.png" alt="Image" class="img-fluid">
										</div>
										<h2>Adv. & PR</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="service">
										<div class="service-icon">
											<img src="images/service/5.png" alt="Image" class="img-fluid">
										</div>
										<h2>development</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="service">
										<div class="service-icon">
											<img src="images/service/6.png" alt="Image" class="img-fluid">
										</div>
										<h2>strategy</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
									</div>
								</div>
							</div><!-- /.row -->
						</div><!-- /.container -->
					</div><!-- /.tr-services -->
					
				</div><!-- /.tr-section -->



			</div><!-- /.container-fluid -->	
		</div><!-- main-wrapper -->

		<footer id="footer">
			<?php
				include("view/footer.php");
			?>
		</footer><!-- /#foot  er -->  	
		<!-- JS -->
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/marquee.js"></script>
		<script src="js/moment.min.js"></script>
		<script src="js/theia-sticky-sidebar.min.js"></script>
		<script src="js/jquery.jplayer.min.js"></script>
		<script src="js/jplayer.playlist.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/carouFredSel.js"></script>
		<script src="js/magnific-popup.min.js"></script>
		<script src="js/main.js"></script>
		<script src="https://www.andreaverlicchi.eu/lazyload/dist/lazyload.min.js"></script>
		<script>
			var $btns = $('.btn').click(function() {
				if (this.id == 'all') {
					$('#main_news > div').fadeIn(450);
				} else {
					var $el = $('.' + this.id).fadeIn(450);
					$('#main_news > div').not($el).hide();
				}
				$btns.removeClass('active');
				$(this).addClass('active');
			});
		</script>
		<script>
			new LazyLoad();
		</script>
    </body>
    </html>