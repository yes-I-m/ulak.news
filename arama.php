<?php
	include("config.php");
	$ulak_api_class = new UlakNews();
	$ulak_class = new UlakClass();

	$all_cats = $ulak_api_class->get_cats();
	$agencies = $ulak_api_class->get_agencies();
	$most_read = $ulak_api_class->get_most_readed("today", 4);

	$search_status = false;
	$cat_data=[];
	$desc = "";
	$q = "";

	if(isset($_GET['q'])){
		$q = strip_tags(htmlentities($_GET['q']));
		$all_news = $ulak_api_class->search_news($q);
		if($all_news !== false){
			$search_status = true;
			$desc = "<strong>".$q."</strong> ilgili arama sonuçları";
			if(count($all_news)<1){
				$search_status = false;
				$desc = "Sonuç bulunamadı.";
			}
		}else{
			$desc = "Arama yapılamadı.";
		}
	}else{
		$all_cats = $ulak_api_class->get_cats(10000);
		$desc = "Ulak ile istediğinizi arayın.";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="ulak.news">
	<meta name="robots" content="index, follow">

	<?php
		if($search_status){
	?>

	<title><?php echo $q; ?> ile ilgili haberler | Ulak.news</title>
	<meta property="og:title" content="<?php echo $q; ?> ile ilgili haberler, Haberleri" />
	<meta name="keywords" content="<?php echo $q; ?> ile ilgili haberler, son dakika haberler" />
	<meta property="og:description" content="<?php echo $q; ?>, ile ilgili haberler, son dakika haberler" />
	<meta name="description" content="<?php echo $q; ?> ile ilgili haberler, son dakika haberler" />
	<meta name="robots" content="index, follow">

	<?php
		}else{
	?>
	<title>Ulak News ile Gelişmiş Haber Arama | Ulak.news</title>
	<meta property="og:title" content="Ulak News Gelişmiş Haber Arama | Ulak.news" />
	<meta name="keywords" content="haber ara, detaylı haber ara, haber arama, türkiye haber ara, tüm haberlerde arama" />
	<meta property="og:description" content="Ulak News Gelişmiş Haber Arama | Ulak.news" />
	<meta name="description" content="Ulak News Gelişmiş Haber Arama | Ulak.news" />
	<meta name="robots" content="noindex, nofollow">

	<?php
		}
	?>
	<!-- icons -->
	<link rel="apple-touch-icon" sizes="57x57" href="img/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/icon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="img/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/icon/favicon-16x16.png">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,900&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Tooltip plugin (zebra) css file -->
	<link rel="stylesheet" type="text/css" href="plugins/zebra-tooltip/zebra_tooltips.min.css">

	<!-- Owl Carousel plugin css file. only used pages -->
	<link rel="stylesheet" type="text/css" href="plugins/owl-carousel/assets/owl.carousel.min.css">

	<!-- Ideabox main theme css file. you have to add all pages -->
	<link rel="stylesheet" type="text/css" href="css/main-style.css">

	<!-- Ideabox responsive css file -->
	<link rel="stylesheet" type="text/css" href="css/responsive-style.css">
</head>

<body>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-43122854-40"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-43122854-40');
	</script>	
	<!-- header start -->
	<header class="header">
		<?php include("./view/header.php"); ?>
	</header>
	<!-- header end -->


	<!-- Left sidebar menu start -->
	<div class="sidebar">
		<?php include("./view/sidebar.php"); ?>
	</div>
	<!-- Left sidebar menu end -->

	<!--Main container start -->
	<main class="main-container">
	<section class="main-highlight">
			
            </section>
            <section class="main-content">
                <div class="main-content-wrapper">
                    <div class="content-body">
                        <div class="content-timeline">
                            <div class="post-list-header">
                                <span class="post-list-title">Gelişmiş Arama</span> 
									<div class="search">
										<form action="arama.html" class="search-form" onsubmit="return validate('q', 3)">
											<input type="text" autocomplete="off" min="1" value="<?php echo $q; ?>" require name="q" id="q" placeholder="Aramak istediğiniz Haber içeriği hakkında bir şeyler girebilirsiniz...">
											<input type="submit" value="Ara">
										</form>
									</div>
								<?php
								if(isset($search_status)){
								?>
									<select id="agency_filter" class="frm-input">
										<option value="all">Sırala</option>
									</select>
								<?php
								}
								?>
                            </div>

                            <div class="timeline-items">
                                <span class="timeline-items-desc"><?php echo $desc; ?></span><br/>
								<?php
										include("./view/timeline.php");
								?>
                            </div>
                        </div>
    
                    </div>
                    <div class="content-sidebar">
                        <div class="sidebar_inner">
                            <?php include("./view/most-read.php"); ?>
                            <div class="seperator"></div>
                        </div>
                    </div>
                </div>
            </section>
	</main>
	<footer>
		<?php include("./view/footer.php"); ?>
	</footer>

	<script src="js/jquery-3.2.1.min.js"></script>

	<!-- Tooltip plugin (zebra) js file -->
	<script src="plugins/zebra-tooltip/zebra_tooltips.min.js"></script>

	<!-- Owl Carousel plugin js file -->
	<script src="plugins/owl-carousel/owl.carousel.min.js"></script>

	<!-- Ideabox theme js file. you have to add all pages. -->
	<script src="js/main-script.js"></script>

	<style>
		.no_display_news{
			display: none;
		}
		/* ===========================
		====== Search Box ====== 
		=========================== */
		.search
		{
			border: 2px solid #CF5C3F;
			overflow: auto;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		}

		.search input[type="text"]
		{
			border: 0px;
			width: 67%;
			padding: 10px 10px;
		}

		.search input[type="text"]:focus
		{
			outline: 0;
		}

		.search input[type="submit"]
		{
			border: 0px;
			background: none;
			background-color: #CF5C3F;
			color: #fff;
			float: right;
			padding: 10px;
			border-radius-top-right: 5px;
			-moz-border-radius-top-right: 5px;
			-webkit-border-radius-top-right: 5px;
			border-radius-bottom-right: 5px;
			-moz-border-radius-bottom-right: 5px;
			-webkit-border-radius-bottom-right: 5px;
				cursor:pointer;
		}

		/* ===========================
		====== Medua Query for Search Box ====== 
		=========================== */

		@media only screen and (min-width : 150px) and (max-width : 780px)
		{
			{}
			.search
			{
				width: 95%;
				margin: 0 auto;
			}

		}
	</style>
	<script type="text/javascript">

		//Owl carousel initializing
		$('#postCarousel').owlCarousel({
		    loop:true,
		    dots:true,
		    nav:true,
		    navText: ['<span><i class="material-icons">&#xE314;</i></span>','<span><i class="material-icons">&#xE315;</i></span>'],
		    items:1,
		    margin:20
		});

		//widget carousel initialize
		$('#widgetCarousel').owlCarousel({
		    dots:true,
		    nav:false,
		    items:1
		});



	</script>

</body>

</html>