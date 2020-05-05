<?php
	include("config.php");
	$ulak_api_class = new UlakNews();
	$ulak_class = new UlakClass();

	$agencies = $ulak_api_class->get_agencies();
	$most_read = $ulak_api_class->get_most_readed("today", 4);
	$all_cats = $ulak_api_class->get_cats();

	$cat_status = false;
	$cat_data=[];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="ulak.news">
	<meta name="robots" content="index, follow">

	<title>Reddi Beyan | Ulak.news</title>
	<meta property="og:title" content="Reddi Beyan | Ulak.news" />
	<meta name="keywords" content="Reddi Beyan, kategoriler, ulak news kategorileri" />
	<meta property="og:description" content="Reddi Beyan | Ulak.news" />
	<meta name="description" content="Reddi Beyan | Ulak.news" />
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

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,900&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Tooltip plugin (zebra) css file -->
	<link rel="stylesheet" type="text/css" href="plugins/zebra-tooltip/zebra_tooltips.min.css">

	<!-- Owl Carousel plugin css file. only used pages -->
	<link rel="stylesheet" type="text/css" href="plugins/owl-carousel/assets/owl.carousel.min.css">

	<!-- Ideabox main theme css file. you have to add all pages -->
	<link rel="stylesheet" type="text/css" href="css/main-style.min.css?v=<?php echo date('Ymd'); ?>">

	<!-- Ideabox responsive css file -->
	<link rel="stylesheet" type="text/css" href="css/responsive-style.min.css?v=<?php echo date('Ymd'); ?>">
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
			<section class="main-highlight">
            </section>
            <section class="main-content">
                <div class="main-content-wrapper">
                    <div class="content-body">
                        <div class="content-timeline">
						<div class="article-content">
							<h1 class="extra-title">Reddi Beyan</h1>
							<div class="article-inner">
								<p>
								ulak.news yayınladığı haberleri ilgili haber sayfasının alt kısmında belirttiği kaynaktan alır. Kesinlikle kaynağı olmayan haber yayınlanmaz.<br>
								Yayınladığımız haberlerin doğruluğunu, yeterliliğini veya eksiksizliğini açıkça reddediyoruz.<br>Bu tür verilerdeki hatalardan, eksikliklerden veya diğer kusurlardan, gecikmelerden ya da kesintilerden veya bu verilere itimat edilerek yapılan işlemlerden sorumlu değiliz.<br>
								Haber kaynağının haberi güncelleştirmesi veya kaldırması durumunda yapılan işlemden haberimiz olamayacağından dolayı ilgili haber/yazı vb. şeyler sitemizde yayında kalabilir. Bu durumundan dolayı doğabilecek her türlü hukuki ve cezai sorumluluk sorumluluğu ulak.news sitesi olarak kabul etmemekteyiz.<br>
								<u>Bir haberin doğrulundan şüphe ediyorsanız yada kaynağında ki güncellemeden dolayı sitemizde ki bir haberin güncelleşmesini istiyorsanız ilgili haber sayfasından bildirim gönderebilirsiniz.<br><br>Sitemizde ki bir içerik ile ilgili <i><strong>Hukuki</strong></i> bir durum söz konusu ise lütfen bizimle iletişime geçin. İlgili talebiniz ivediklikle yerine getirilecetir.<br></u><br>
								ulak.news yukarıda belirtilen reddi beyan niteliğinde ki yazıyı dilediği her zaman değiştirebilir veya güncelleyebilir.
								</p>	
							</div>

							<!--this is important for the left ad box or share box fixer -->
							<div id="endOfTheArticle"></div>

						</div>
                        </div>
    
                    </div>
                    <div class="content-sidebar">
                        <div class="sidebar_inner">
						<ul>
							<li>
								<a href="./hakkimizda.html"><span class="menu-label">Hakkımızda</span></a>
							</li>
							<li>
								<a href="./iletisim.html"><span class="menu-label">İletişim</span></a>
							</li>
							<li>
								<a href="./reddi_beyan.html"><span class="menu-label">Reddi Beyan</span></a>
							</li>
							<li>
								<a href="./topluluk_sozlesmesi.html"><span class="menu-label">Topluluk Sözleşmesi</span></a>
							</li>
							<li>
								<a href="./kullanim_sozlesmesi.html"><span class="menu-label">Kullanım Sözleşmesi</span></a>
							</li>
						</ul>
                            <div class="seperator"></div>
                            <!-- 
                            <a href="#" class="widget-ad-box">
                                <img src="img/adbox300x250.png" width="300" height="250">
                            </a> -->
                        </div>
                    </div>
                </div>
            </section>
	</main>

	<script src="js/jquery-3.2.1.min.js"></script>

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