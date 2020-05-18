<?php
	include("config.php");
	$ulak_api_class = new UlakNews();
	$ulak_class = new UlakClass();

	$agencies = $ulak_api_class->get_agencies();
	$most_read = $ulak_api_class->get_most_readed("today", 4);

	$cat_status = false;
	$cat_data=[];

	if(isset($_GET['kategori'])){
		$_GET['kategori'] = strip_tags($_GET['kategori']);
		$all_cats = $ulak_api_class->get_cats();
		$all_news = $ulak_api_class->get_cat_news($_GET['kategori']);
		if(count($all_news)>0){
			$cat_data['title']=base64_decode($_GET['kategori']);
			$cat_status = true;
		}
	}else{
		$all_cats = $ulak_api_class->get_cats(10000);
	}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="ulak.news">
	<meta name="robots" content="index, follow">

	<?php
		if($cat_status){
	?>

	<title><?php echo $cat_data['title']; ?> ile ilgili haberler | Ulak.news</title>
	<meta property="og:title" content="<?php echo $cat_data['title']; ?> ile ilgili haberler, Haberleri" />
	<meta name="keywords" content="<?php echo $cat_data['title']; ?> ile ilgili haberler, son dakika haberler" />
	<meta property="og:description" content="<?php echo $cat_data['title']; ?>, ile ilgili haberler, son dakika haberler" />
	<meta name="description" content="<?php echo $cat_data['title']; ?> ile ilgili haberler, son dakika haberler" />
	<link rel="canonical" href="https://ulak.news/kategori.php?kategori=<?php echo base64_encode($cat_data['title']); ?>" />
	<meta property="og:locale" content="tr_TR" />

	<?php
		}else{
	?>
	<title>Tüm kategoriler | Ulak.news</title>
	<meta property="og:title" content="Tüm kategoriler | Ulak.news" />
	<meta name="keywords" content="tüm kategoriler, kategoriler, ulak news kategorileri" />
	<meta property="og:description" content="Tüm kategoriler | Ulak.news" />
	<meta name="description" content="Tüm kategoriler | Ulak.news" />
	<link rel="canonical" href="https://ulak.news/kategori.html" />
	<meta property="og:locale" content="tr_TR" />

	<?php
		}
	?>
	<link rel="alternate" type="application/rss+xml" title="ulak news rss beslemesi" href="https://ulak.news/atom_news.php?cat=sondakika" />
	
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

	
	<link rel="stylesheet" type="text/css" href="fonts/material-icons.css">

	<!-- Tooltip plugin (zebra) css file -->
	<link rel="stylesheet" type="text/css" href="plugins/zebra-tooltip/zebra_tooltips.min.css">

	<!-- Owl Carousel plugin css file. only used pages -->
	<link rel="stylesheet" type="text/css" href="plugins/owl-carousel/assets/owl.carousel.min.css">

	<!-- Ideabox main theme css file. you have to add all pages -->
	<link rel="stylesheet" type="text/css" href="css/main-style.min.css?v=<?php echo date('Ymd'); ?>">

	<!-- Ideabox responsive css file -->
	<link rel="stylesheet" type="text/css" href="css/responsive-style.min.css?v=<?php echo date('Ymd'); ?>">

	<link rel="manifest" href="manifest.json">
</head>

<body>
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
		<?php
			if($cat_status){
				include("./view/cat.php");
			}else{
				include("./view/cats.php");
			}
		?>
	</main>

	<?php include("./view/footer.php"); ?>


	<script src="js/jquery-3.5.1.min.js"></script>

	<!-- Tooltip plugin (zebra) js file -->
	<script src="plugins/zebra-tooltip/zebra_tooltips.min.js"></script>

	<!-- Owl Carousel plugin js file -->
	<script src="plugins/owl-carousel/owl.carousel.min.js"></script>

	<!-- Ideabox theme js file. you have to add all pages. -->
	<script src="js/main-script.min.js"></script>
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