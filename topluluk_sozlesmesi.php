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
			<title>Topluluk Sözleşmesi | Ulak.news</title>
			<meta property="og:title" content="Topluluk Sözleşmesi | Ulak.news" />
			<meta name="keywords" content="ulak news Topluluk Sözleşmesi, ulak news nedir, ulak news bilgi" />
			<meta property="og:description" content="Ulak news Topluluk Sözleşmesi sayfası | Ulak.news" />
			<meta name="description" content="Ulak news Topluluk Sözleşmesi sayfası | Ulak.news" />

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
									<h1>Topluluk Sözleşmesi</h1>
								</div><!-- /.section-title -->
						</div>
						<p style="color: black;">
							<strong>Siz Kullanıcılarımıza isteklerine cevap vermek için 7/24 bizimle iletişim kurabilirsiniz.</strong><br>
                           ulak.news’teki kullanıcı hesapları veya sosyal ağ hesaplarıyla kullanıcıların tescil edilmesi ve yetkilendirilmesi aşağıdaki kuralların kullanıcılar tarafından bilindiğini ve kabul edildiğini gösterir: <br> 
													 Kullanıcılar ulusal ve uluslararası kurallara riayet etmek, görüşmelerdeki diğer katılımcı ve gönderilerde adı geçen kişilere karşı saygılı davranmak zorundadır. Site yönetimi, sitenin genel kullanımı dışındaki herhangi bir dilde yapılan her türlü yorumu silme hakkına sahiptir. <br>
													 <br> ulak.news’un bütün dillerdeki yayınlarına gönderilen her türlü yorum üzerinde oynama yapılabilir. <br>
													 <br> Kullanıcı yorumları aşağıdaki durumlar halinde silinecektir; <br>
													 <br> Mevcut gönderiyle alakalı değilse. <br>
													 <br> Herhangi bir ırkçı, etnik, cinsiyetçi, dini veya içtimai esasa dayalı nefret söylemi ve ayrımcılık içeriyor ise veya azınlık hakları ihlal ediliyorsa. <br>
													 <br> Ruhsal veya başka bir yönden zarar vererek, çocuk hakları ihlal ediliyorsa, <br><br> 
													 Herhangi bir aşırı düşünce içeriyor veya yasa dışı eylemlere teşvik ediyorsa. <br>
													 <br> Başka kullanıcılara, kişilere veya özel kuruluşa yönelik tehdit, itibara zarar verme veya ticari şöhret zedelemeye yönelik bir söylem içeriyorsa. <br>
													 <br> ulak.news’e yönelik saygısızca bir söylem veya aşağılama içeriyorsa. <br><br> 
													 Özel hayatın gizliliği ihlal ediliyor, üçüncü kişilerin onayı olmaksızın kişisel bilgiler yayınlanıyor veya haberleşme gizliliği ihlal ediliyorsa. <br><br
													 > Hayvanlara yönelik şiddet, işkenceden bahsediliyor veya bu tarz görüntüleri barındırıyorsa. <br>
													 <br> İntihar yöntemlerine ilişkin söylemler veya buna yönelik bir teşvik içeriyorsa. <br><br> 
													 Ticari amaç güdüyor, yasadışı siyasi kuruluş reklamı veya uygunsuz bir reklam içeriyor, ya da bu çeşit bilgi barındıran başka bir çevrimiçi kaynağa bağlantı gösteriliyorsa. <br><br>
													  Yetkilendirilmeksizin üçüncü kişilerin hizmetleri veya ürünlerin tanıtımı yapılıyorsa. <br><br>
														Küfür, saldırı veya türevlerini içeren veya bu tanımlamaya uyan herhangi bir sözcüğe yönelik ipuçları içeriyorsa. <br><br> 
														Spam içeriyor, spam barındıran toplu mail hizmetlerinin ve çabuk zengin olma planı bulunduran içeriklerin reklamı yapılıyorsa. <br><br>
														Uyuşturucu madde kullanımına teşvik ediliyor, bu maddelerin kullanımı ve üretimine yönelik bilgi içeriyorsa. <br><br>
														Virüs veya kötü amaçlı yazılım içeriyorsa. <br><br>
														Aynı temalı birçok yorumun gönderildiği örgütlü bir hareket planının parçasıysa (flash mob). <br><br> 
														Birçok tutarsız ve ilgisiz iletiyle tartışma sekmesi altında yığılma yaratıyorsa (flood yapma). <br><br> 
														Görgü kurallarına aykırı, her türlü saldırgan, küçük düşürücü ve kötüye kullanım bulunduran bir söylem barındırıyorsa (trolleme). <br><br> 
														Dilin standart kurallarına uygunsuz bir şekilde yazılmışsa (Çoğunlukla veya tamamen büyük harfle ya da cümle cümle ayırmamak gibi). <br><br> 
														Kullanıcı bu kurallardan herhangi birini ihlal eder veya sözü geçenlere yönelik ihlal belirtisi gösteren davranışta bulunursa, site yönetimi kullanıcının sayfaya erişimini engelleyebilir veya hiçbir bilgilendirme yapmaksızın kullanıcının hesabını silebilir. <br>
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