<?php
	include("funcs.php");
	if(!$is_local){
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
	$get_news=get_news("all", 60, 0);
	if($get_news['status']){
		$get_news=$get_news['result'];
	}else{
		$get_news=[];
	}
	$son_dakika=array_splice($get_news, 0, 5);
	$all_news=array_splice($get_news, 5, 60);
	
	$lastSearch=lastSearch();
?>
<html lang="tr" style="transform: none;">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="ulak.news">
		<title>Ulak News | Haberler, Son Dakika Haberleri ve Güncel Haber</title>
		<meta property="og:title" content="Ulak News | Haberler, Son Dakika Haberleri ve Güncel Haber" />
		<meta name="keywords" content="ulak.news, ulak haber, ulak news, ulak, haber, haberler, son dakika, son dakika haber, haber oku, gazete haberleri,gazeteler" />
		<meta property="og:description" content="Ulak news, Haberler, son dakika haberleri, yerel ve dünyadan en güncel gelişmeler, magazin, ekonomi, spor, gündem ve tüm haberleri ulak news'de!" />
		<meta name="description" content="Ulak news, Haberler, son dakika haberleri, yerel ve dünyadan en güncel gelişmeler, magazin, ekonomi, spor, gündem ve tüm haberleri ulak news'de!" />

		<!-- CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/slick.css">
		<link rel="stylesheet" href="css/jplayer.css">
		<link rel="stylesheet" href="css/main.css?v=<?php echo $version; ?>">  
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
				<div class="tr-home-slider slider-style-two">
						<?php
							include("view/main_slider.php");
						?>
						</div><!-- /.carousel-inner -->
					</div><!-- /#home-carousel -->					
				</div><!-- /.tr-home-slider -->

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

				<div class="row tr-content" style="transform: none;">
					<div class="col-md-12 col-lg-12 tr-sticky" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
						<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 15px;">
							<div class="tr-section">
								<span style="color:red; margin-left: 40%;" class="main_news_notif"></span>
								<div id="main_news" class="medium-post-content row">
									<?php include("view/main_news.php"); ?>
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
		<script src="js/main.js?v=<?php echo $version; ?>"></script>
		<script src="https://www.andreaverlicchi.eu/lazyload/dist/lazyload.min.js"></script>
		<script>
			new LazyLoad();
			function getNews(agency="all"){
				$.ajax({
					type: 'GET',
					url: 'view/ajax_news.php',
					data: { agency: agency }, 
					dataType: 'html',
					success: function (data) {
						$("#main_news").append(data);
						$('.main_news_notif').html("");
						console.log(agency+" haberleri main_news e append edildi. getNews();")
					},
					error: function (data) {
						console.log(agency+" => haberleri alınamadı. getNews();")
					}
				});
			}
			getNews("cumhuriyet");
			var $btns = $('.btn').click(function() {
				$('.main_news_notif').text("");
				var agency = this.id;
				if (agency === 'all') {
					$('#main_news > div').fadeIn(450);
				} else {
					var sum = 0;
					$('.'+agency).each(function(){
						sum++;
					});
					if(sum===0){
						$('.main_news_notif').html("İlgili ajans haberleri tekrar yükleniyor...");
						getNews(agency);
					}
					var $el = $('.' + agency).fadeIn(450);
					$('#main_news > div').not($el).hide();
				}
				$btns.removeClass('active');
				$(this).addClass('active');
			});
		</script>
    </body>
    </html>