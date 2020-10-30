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
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="ulak.news">
	<meta name="robots" content="index, follow">

	<title>Hakkımızda | Ulak.news</title>
	<meta property="og:title" content="Hakkımızda | Ulak.news" />
	<meta name="keywords" content="Hakkımızda, kategoriler, ulak news kategorileri" />
	<meta property="og:description" content="Hakkımızda | Ulak.news" />
	<meta name="description" content="Hakkımızda | Ulak.news" />
	<meta property="og:locale" content="tr_TR" />
	<link rel="canonical" href="https://ulak.news/hakkimizda.html" />
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

	<!-- Ideabox main theme css file. you have to add all pages -->
	<link rel="stylesheet" type="text/css" href="css/main-style.min.css?v=<?php echo date('Ymd'); ?>">
	
	<link rel="manifest" href="manifest.json">
	<?php include("./view/head-under.php"); ?>

</head>

<body>

	<?php include("./view/body-under.php"); ?>

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
							<h1 class="extra-title">DİJİTAL DÜNYANIN SANAL ULAĞI: ULAK NEWS</h1>
							<div class="article-inner">
								<ul style="list-style-type: circle;">
									<li>Ulak News dijital dünyadaki sanal ulağınızdır. Biz, Ulak News olarak, basın özgürlüğüne ve bireysel haber alma özgürlüğüne inanıyoruz. Bu nedenle dijital dünyadaki sanal ulağınız olacağız. Amacımız, haber ajanslarına giren tüm haberlere tek bir akış üzerinden ulaşmanızı sağlamak.</li><br/>
									<li>Açık kaynak kodlu bir dijital ortam projesi olan Ulak News’te, tamamen kendimize ait bir yazılımla sizler için en iyi okuma deneyimini geliştirmek üzere sürekli olarak çalışıyoruz. Sistemimiz otomatik olarak haber yayınlayan gerçek zamanlı bir haber takip ve yayın sistemidir.</li>	<br/>
									<li>Ulak News farklı haber kaynaklarından derlenen haberleri yayına girdikleri anda yayına sokulan şekliyle hiçbir editoryal müdahale yapmaksızın sizlere iletir. Haberlere özgürce yorum yapabilir, dilediğiniz platformda paylaşabilir ya da emojilerle kısa yoldan tepkinizi gösterebilirsiniz.</li>	<br/>
									<li>Reklamsız, özgür ve tarafsız bir yayın akışı ile tüm bilgiye sürekli erişim sağlamanızı amaçlayan platformumuz, sürekli gelişimine Ulak haber takip sistemleri ve raporları ile devam etmektedir. Çok yakında sizlere kişisel ulağınız olarak ilave hizmetler sunacağımız platformumuzda yayınlarımız, haber kaynaklarından izin alınarak sizinle buluşturulmaktadır.</li>	<br/>
									<li>Okurlarımızın verilerinin güvenliği bizler için birincil öneme sahiptir. Bu nedenle güvenilir olmayan hiçbir üçüncü taraf ile veri paylaşımı kesinlikle yapmamaktayız. </li><br/>
									<li>Platformumuza katılım için haber ajansları ve merkezleri iletişim sayfamızdan bizimle hemen <a href="https://ulak.news/iletisim.html">buraya tıklayarak</a> iletişime geçebilir. Diğer sorular ve hukuki konular hakkında da bizimle şimdi iletişime geçebilirsiniz.</li>	
								</ul>
							</div>

							<!--this is important for the left ad box or share box fixer -->
							<div id="endOfTheArticle"></div>

						</div>
                        </div>
    
                    </div>
                    <div class="content-sidebar">
                        <div class="sidebar_inner">
							<?php include("./view/sidebar_menu_group.php"); ?>
                            <!-- 
                            <a href="#" class="widget-ad-box">
                                <img src="img/adbox300x250.png" width="300" height="250">
                            </a> -->
                        </div>
                    </div>
                </div>
            </section>
	</main>

	<script src="js/jquery-3.5.1.min.js"></script>

	<!-- Tooltip plugin (zebra) js file -->
	<script src="plugins/zebra-tooltip/zebra_tooltips.min.js"></script>

	<!-- Owl Carousel plugin js file -->
	<script src="plugins/owl-carousel/owl.carousel.min.js"></script>

	<!-- Ideabox theme js file. you have to add all pages. -->
	<script src="js/main-script.js?v=<?php echo date('Ymd'); ?>"></script>
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