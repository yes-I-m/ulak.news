<?php
	include("funcs.php");
	$desc="";
	$q="";
	$all_news=[];
	$agency_status=false;
	$page_status=false;
	$agency_title="";
	$agency_about=[];
	//////
	$get_cats=get_categories();
	if($get_cats['status']){
		$get_cats=$get_cats['result'];
	}else{
		$get_cats=[];
	}

	$get_agency=get_agency_list();
	if($get_agency['status']){
		$get_agency=$get_agency['result'];
	}else{
		$get_agency=[];
	}

	//////
	if(isset($_GET['agency'])){
		$agency=$_GET['agency'];
		if(array_key_exists($agency, $get_agency)){
			$agency_about=$get_agency[$agency];
			$agency_title=$agency_about['title'];
			$all_news=get_news($agency);
			$all_news=$all_news['result'];
			$agency_status=true;
			$page_status=true;
		}
	}else{
		$page_status=true;
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
		<?php
			if($agency_status){
		?>
			<title><?php echo $agency_title; ?> ile ilgili haberler | Ulak.news</title>
			<meta property="og:title" content="<?php echo $agency_title; ?> ile ilgili haberler, Haberleri" />
			<meta name="keywords" content="<?php echo $agency_title; ?> ile ilgili haberler, son dakika haberler" />
			<meta property="og:description" content="<?php echo $agency_title; ?> ile ilgili haberler, son dakika haberler" />
			<meta name="description" content="<?php echo $agency_title; ?> ile ilgili haberler, son dakika haberler" />
		<?php
			}else{
		?>
			<title>Tüm ajanslar, türkiye haber ajansları | Ulak.news</title>
			<meta property="og:title" content="Tüm ajanslar, türkiye haber ajansları | Ulak.news" />
			<meta name="keywords" content="tüm ajanslar, ajanslar, türkiye haber ajansları, haber ajanslar, ulak news ajanslar" />
			<meta property="og:description" content="Tüm ajanslar, türkiyeden haber ajanslarının son dakika haberleri | Ulak.news" />
			<meta name="description" content="Tüm ajanslar, türkiyeden haber ajanslarının son dakika haberleri | Ulak.news" />
		<?php
			}
		?>

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
	<body class="homepage-2" style="transform: none;">
		<div class="main-wrapper tr-page-top" style="transform: none;">
			<div class="container-fluid" style="transform: none;">
			<?php include("view/header.php"); ?>

				<div class="row tr-content" style="transform: none;">
					<div class="col-md-12 col-lg-12 tr-sticky" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
						<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 15px;">
							<div class="tr-section">
								<?php
								if($page_status){
									// sayfa sorunsuz yüklendiyse diğer işlemleri yapıyoruz.
									if($agency_status){
									/**
									 * eğer kategori isteği varsa
									 */
								?>
									<h2 style="margin 0 auto;"><?php echo $agency_title; ?> - son dakika haberleri</h2><hr/>
									<p><?php echo $agency_about['about']; ?></p>
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
								<?php
									}else{
									/**
									 * eğer kategori isteği yoksa tüm kategorileri listeliyoruz.
									 */
								?>
								<style>
								.panel {
									text-align: center;
									border-radius: 0.3rem;
									padding: 1rem;
									margin-bottom: 1rem;
								}
								.panel.panel-blue {
									border: 1px solid #0087FF;
									background-color: #DDEDFF;
									color: #0087FF;
								}
								.panel.panel-yellow {
									border: 1px solid #FFBD00;
									background-color: #FEF0B2;
									color: #FFBD00;
								}
								.panel.panel-pink {
									border: 1px solid #F84F7F;
									background-color: #FAD2E1;
									color: #F84F7F;
								}
								.panel.panel-purple {
									border: 1px solid #7F51F4;
									background-color: #DFCCFF;
									color: #7F51F4;
								}
								</style>
								<div class="tr-weekly-top">
									<div class="container">
										<div class="section-title">
											<h1>Tüm haber kaynakları</h1>
										</div>
									</div>
									<div class="entertainment-content">
										<div class="container">
											<ul class="entertainment-slider tr-before">
											<?php
												foreach($get_agency as $key=>$raw){
											?>
												<li>
													<div class="entertainment">
														<div class="entertainment-image">
															<a href="/<?php echo $raw['seo_link']; ?>"><img class="img-fluid" src="<?php echo $raw['image']; ?>" alt="<?php echo $raw['title']; ?>"></a>
														</div>
														<div class="entertainment-info">
															<h2><?php echo $raw['title']; ?></h2>
															<p><?php echo $raw['about']; ?></p>
															<a style="margin-top: 10px;" href="/<?php echo $raw['seo_link']; ?>" class="btn btn-primary">Haberleri</a>
														</div>									
													</div>
												</li>
												<?php
												}
												?>
											</ul><!-- /.entertainment-slider -->						
										</div><!-- /.container -->
									</div><!-- /.entertainment-content -->
								</div><!-- /.tr-weekly-top -->
								<?php
									}
								}else{
									// page status false ise;
									include("view/404.php");
								}
								?>
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