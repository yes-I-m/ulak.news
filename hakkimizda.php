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
	<?php include("view/gtag.php"); ?>
	<body class="about-page tr-page">
		<div class="main-wrapper tr-page-top" style="transform: none;">
			<div class="container-fluid" style="transform: none;">
			<?php include("view/header.php"); ?>
				<div style="background-image: url(images/logo_2.png);" class="page-breadcrumb2 tr-section text-center">
					<div class="breadcrumb-content">
						<h1>Yaklaşalım.</h1>
						<p>En iyi haber okuma deneyimini ve Türkiye'de ki  bir çok haber kaynaklarını birleştirerek sonuç alıyoruz.</p>
						<p>ulak.news açık kaynak kodlu bir projedir. Basının özgürlüğüne inanan, bireyin haber alma özgürlüğüne sahip çıkan bir ortam yaratmak amaçlı oluşturulan otomatik olarak haber yayınlayan sistemdir.</p>
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
									%99.9 oranında kodlarımız açık kaynak olarak yayınlamaktayız, kalan %0.01 kısmı veritabanlarımızın şifrelerinin, bazı doğrulama anahtarlarının ve haber kaynaklarını aldığımız servis linklerinin bulunduğu environment(değişken kütüphanesi genellikle env.php) dosyamızdır.<br/><br/>
									Kodlarımıza aşağıda ki linklerden ulaşabilirsiniz ve geliştirmemize yardımcı olabilirsiniz.<br/>
									<a href="https://github.com/orhanayd/ulak.news" class="btn btn-primary" target="_blank"><i class="fa fa-2x fa-github" aria-hidden="true"></i> Ulak.news</a>
									<a href="https://github.com/orhanayd/api.ulak.news" class="btn btn-primary" target="_blank"><i class="fa fa-2x fa-github" aria-hidden="true"></i> api.ulak.news</a>
								</p>
								<hr/>
								<div class="section-title">
									<h1>Topladığımız haberler ile ne yapacağız?</h1>
								</div><!-- /.section-title -->
								<p>Ülkemizin bir haber arşiv sistemi oluşturup geçmişe yönelik çeşitli aramalar yapılabilmesi ve bu sistemin tüm herkese açık olmasını planlıyoruz.</p>
								<p>Bu sistemi geliştirmek ve burada ki haberler üzerinden çeşitli somut veriler oluşturmak. Örneğin;  Hangi aylarda en çok ne tür haberler okunmakta ? Bu yıl en çok hangi içerikli haberler okundu veya yazıldı ? Bu yıl en çok kim haber yayınladı ? Bu yıl ki yalan haber sayısı gibi veriler üretmek ve herkesin erişimine açık hale getirmek.</p>			
								<p>Belki de dünyanın şu anda ki en büyük problemi olan yalan haberler için bir yapay zeka oluşturmak ve otomatik yalan haber tespiti yapabilmek ve oluşturulan bu sistem üzerinden belki de haber yayınlanır yayınlanmaz saniyesinde doğruluğu hakkında belli bir fikrimiz olabilmesi...</p>
								<p>Ve aklımıza fikir geldikçe ekliyoruz :)</p>
								<div class="section-title">
									<h1>Hangi teknolojiler kullanıyoruz?</h1>
								</div><!-- /.section-title -->
								<div class="tr-contact-section tr-section">
									<ul class="contact-content">
										<li>
											<div class="icon">
												<img src="images/others/mongodb.png" alt="MongDB" class="img-fluid">
											</div>
											<span>Veritabanı olarak MongoDB.</span>
										</li>
										<li>
											<div class="icon">
												<img style="width: 80px; height: 80px;" src="images/others/php7.png" alt="php 7" class="img-fluid">
											</div>
											<span>Tüm kodlar PHP ile yazıldı.</span>
										</li>
										<li>
											<div class="icon">
												<img src="images/others/nginx.png" alt="nginx" class="img-fluid">
											</div>
											<span>Web sunucusu olarak Nginx</span>
										</li>
										<li>
											<div class="icon">
												<img src="images/others/ubuntu.png" alt="ubuntu" class="img-fluid">
											</div>
											<span>Ubuntu ile çalışıyoruz :)</span>
										</li>
										<li>
											<div class="icon">
												<img src="images/others/vestacp.png" alt="vestacp" class="img-fluid">
											</div>
											<span>Panel yazılımımız.</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div><!-- /.tr-mission -->					
				
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