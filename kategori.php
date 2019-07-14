<?php
	include("funcs.php");
	$desc="";
	$q="";
	$all_news=[];
	$cat_status=false;
	/// CACHE
	if(isset($_GET['kategori'])){
		$kategori=base64_decode($_GET['kategori']);
		$all_news=get_cat_news($kategori);
		if(count($all_news['result'])>=1){
			$all_news=$all_news['result'];
			$cat_status=true;
		}
	}
	$get_cats=get_categories(1000);
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
		<?php
			if($cat_status){
		?>
			<title><?php echo $kategori; ?> ile ilgili haberler | Ulak.news</title>
			<meta property="og:title" content="<?php echo $kategori; ?> ile ilgili haberler, Haberleri" />
			<meta name="keywords" content="<?php echo $kategori; ?> ile ilgili haberler, son dakika haberler" />
			<meta property="og:description" content="<?php echo $kategori; ?> ile ilgili haberler, son dakika haberler" />
			<meta name="description" content="<?php echo $kategori; ?> ile ilgili haberler, son dakika haberler" />
		<?php
			}else{
		?>
			<title>Tüm kategoriler | Ulak.news</title>
			<meta property="og:title" content="Tüm kategoriler | Ulak.news" />
			<meta name="keywords" content="tüm kategoriler, kategoriler, ulak news kategorileri" />
			<meta property="og:description" content="Tüm kategoriler | Ulak.news" />
			<meta name="description" content="Tüm kategoriler | Ulak.news" />
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
	<body class="homepage-2" style="transform: none;">
		<div class="main-wrapper tr-page-top" style="transform: none;">
			<div class="container-fluid" style="transform: none;">
			<?php include("view/header.php"); ?>

				<div class="row tr-content" style="transform: none;">
					<div class="col-md-12 col-lg-12 tr-sticky" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
						<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 15px;">
							<div class="tr-section">
								<?php
									if($cat_status){
									/**
									 * eğer kategori isteği varsa
									 */
								?>
									<h2 style="margin 0 auto;"><?php echo $kategori; ?> ile ilgili haberler</h2>
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
								<h2 style="margin 0 auto;">Tüm kategoriler (<?php echo count($get_cats); ?>)</h2><hr/>
								<div class="row">
									<?php
										foreach($get_cats as $key=>$raw){
									?>
											<div class="col-sm-6 col-lg-3">
												<a href="<?php echo $raw['seo_link']; ?>'">
													<div class="panel panel-<?php echo $key%2===0 ? 'blue' : 'purple'; ?>"><?php echo $raw['cat']; ?> <i class="fa fa-external-link" aria-hidden="true"></i></div>
												</a>
											</div>
									<?php
										}
									?>
								</div>
								<?php
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