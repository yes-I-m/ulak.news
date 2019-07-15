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
			<title>İletişim | Ulak.news</title>
			<meta property="og:title" content="İletişim | Ulak.news" />
			<meta name="keywords" content="ulak news İletişim, ulak news nedir, ulak news bilgi" />
			<meta property="og:description" content="Ulak news İletişim sayfası | Ulak.news" />
			<meta name="description" content="Ulak news İletişim sayfası | Ulak.news" />

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
		<link rel="apple-touch-icon" sizes="57x57" href="images/icon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="images/icon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="images/icon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="images/icon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="images/icon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="images/icon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="images/icon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="images/icon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="images/icon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="images/icon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/icon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="images/icon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/icon/favicon-16x16.png">
		<link rel="manifest" href="manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="images/icon/ms-icon-144x144.png">
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
				<div class="tr-section tr-section-padding">
					<div class="tr-mission">
						<div class="text-center">
							<div class="mission-info">
								<div class="section-title">
									<h1>İletişim</h1>
								</div><!-- /.section-title -->
						</div>
							<p style="color: black;">
								Ulak News ile 7/24 iletişim kurabilirsiniz: 
								<script type="text/javascript">
                                    document.write('info@' + 'orhanaydogdu.com.tr');
                                </script> <br/><br/>
								Bir haberin doğrulundan şüphe ediyorsanız yada kaynağında ki güncellemeden dolayı sitemizde ki bir haberin güncelleşmesini istiyorsanız ilgili haber sayfasından bildirim gönderebilirsiniz.<br/>
								Sitemizde ki bir içerik ile ilgili <i><strong>Hukuki</strong></i> bir durum söz konusu ise lütfen bizimle iletişime geçin. İlgili talebiniz ivediklikle yerine getirilecetir.
                            </p>
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