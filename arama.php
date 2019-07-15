<?php
	///// CACHE //////////
		require_once "sCache.php";
		$options = array(
			'time'   => 60, // 60 saniye
			'dir'    => 'cache/', // sCache2 klasörü oluşturup buraya yazılsın.
			'load'   => false,  // sayfamızın sonunda load değerimiz görünsün.
			'extension' => ".html", // standart değer .html olarak ayarlanmıştır cache dosyalarınızın uzantısını temsil etmektedir.
			);
		
		$sCache = new sCache($options); // ayarları sınıfımıza gönderip sınıfı çalıştıralım.
	///// CACHE BITIS /////
	
	include("funcs.php");
	$desc="";
	$q="";
	$all_news=[];
	/// CACHE
	if(isset($_GET['q'])){
		$q=Sanitizer::alfanumerico($_GET['q'], true, true);
		if(strlen($q)>=3){
			$all_news=getSearchResult($q, 5);
			if($all_news['status']){
				$all_news=$all_news['result'];
			}else{
				$all_news=[];
			}
		}else{
			$desc="Lütfen en az üç harflik bir kelime girin";
		}
	}else{
		header("Location: /index.html");
		exit();
	}
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
		<title><?php echo $q; ?> ile ilgili haberler | Ulak.news</title>
        <meta property="og:title" content="<?php echo $q; ?> ile ilgili haberler, Haberleri" />
        <meta name="keywords" content="<?php echo $q; ?> ile ilgili haberler, son dakika haberler" />
        <meta property="og:description" content="<?php echo $q; ?> ile ilgili haberler, son dakika haberler" />
        <meta name="description" content="<?php echo $q; ?> ile ilgili haberler, son dakika haberler" />

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
	<body class="homepage-2" style="transform: none;">
		<div class="main-wrapper tr-page-top" style="transform: none;">
			<div class="container-fluid" style="transform: none;">
			<?php include("view/header.php"); ?>

				<div class="row tr-content" style="transform: none;">
					<div class="col-md-12 col-lg-12 tr-sticky" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
						<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 15px;">
							<div class="tr-section">
							<div class="row col-md-6" style="margin: 0 auto;">
								<style>
									/* Style the buttons */
									.btn {
									border: none;
									outline: none;
									padding: 12px 16px;
									background-color: #f1f1f1;
									cursor: pointer;
									}

									.btn:hover {
									background-color: #ddd;
									}

									.btn.active {
									background-color: #666;
									color: white;
									}
								</style>
								<button class="active btn" id="all">Tüm ajanslar</button>
								<?php
								foreach($get_agency as $key=>$raw){
									echo '<button class="btn" id="'.$key.'">'.$raw['title'].'</button>';
								}
							?>
							</div>
								<h2 style="margin 0 auto;"><?php echo $q; ?> ile ilgili arama sonuçları</h2>
								<div id="main_news" class="medium-post-content row">
									<?php
										if(strlen($desc)>=1){ 
									?>
											<h2 style="color: red; text-align:center;"><?php echo $desc; ?></h2>
									<?php
									 	}else{
											include("view/main_news.php"); 
										} 
									?>
								</div>				
							</div>									
						</div>
					</div>				
				</div><!-- /.row -->
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