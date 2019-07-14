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
			<title>Kullanım Sözleşmesi | Ulak.news</title>
			<meta property="og:title" content="Kullanım Sözleşmesi | Ulak.news" />
			<meta name="keywords" content="ulak news Kullanım Sözleşmesi, ulak news nedir, ulak news bilgi" />
			<meta property="og:description" content="Ulak news Kullanım Sözleşmesi sayfası | Ulak.news" />
			<meta name="description" content="Ulak news Kullanım Sözleşmesi sayfası | Ulak.news" />

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
	<body class="about-page tr-page">
		<div class="main-wrapper tr-page-top" style="transform: none;">
			<div class="container-fluid" style="transform: none;">
			<?php include("view/header.php"); ?>
				<div class="tr-section tr-section-padding">
					<div class="tr-mission">
						<div class="text-center">
							<div class="mission-info">
								<div class="section-title">
									<h1>Kullanım Sözleşmesi</h1>
								</div><!-- /.section-title -->
						</div>
						<p style="color: black;">
							<strong>Siz Kullanıcılarımıza isteklerine cevap vermek için 7/24 bizimle iletişim kurabilirsiniz.</strong>
                            <br>1- Siteye erişiminizden veya siteyi kullanımınızdan önce lütfen bu sözleşmeyi dikkatle okuyunuz. İşbu sitenin sahibi, Kişisel olarak Orhan AYDOĞDU’ya aittir. İşbu web sitesine; https://www.ulak.news web adresinden ulaşılmaktadır. Siteye erişmekle veya siteyi kullanmakla, aşağıda belirtilen şartlara uymayı kabul etmektesiniz. 
                            <br>
                            ulak.news bu sözleşmede her zaman değişiklik yapabilir ve bu değişiklikler değiştirilmiş sözleşmenin siteye konulmasıyla derhal geçerlilik kazanır. Siz bu değişikliklerden haberdar olmak amacıyla periyodik olarak sözleşmeyi gözden geçirmeyi kabul ederek, siteye devam eden erişiminiz veya devam eden siteyi kullanımınız değiştirilmiş sözleşmeyi kesin olarak kabul ettiğiniz anlamına gelecektir.
                            <br>
                            2- İşbu site ve içeriği olduğu gibi kullanımınıza sunulmaktadır. Bu siteye giriş yapmak ve kullanmakla sitenin içeriği ile ilgili kullanımdan doğacak riskleri üstlenmiş olursunuz. 
                            <br>
                            ulak.news yönetimi site içeriği yada üçüncü şahısların sitelerindeki içeriklerin kullanımı ve kullanım sonuçları hakkında site forum alanları dahil olmak üzere doğruluk, güvenilirlik, kesinlik konularında ya da başka açılardan hiçbir garanti vermez. Aynı şekilde, web sitesinin işletme ve idaresinin hatasız ve kesintisiz olacağı, aksaklıklar kusur ve bozuklulukların düzeltileceği, web sitesinin zarar verici unsurlardan ve virüslerden temizlenmiş olduğu hususunda kullanıcıya herhangi bir öneri ve tavsiyede bulunmamakta ve bu hususlarda kullanıcıya herhangi bir güvence ve teminat verilmemektedir. 
                            <br>
                            İş bu sitede üçüncü şahıslar tarafından idare edilen internet sitelerine bağlantılar ve yönlendiriciler sağlanmakta,üçüncü kişilere ait sitelerdeki içerik kullanılmaktadır. Üçüncü kişilere ait sitelerdeki bilgiler, ürünler ve hizmetler hiçbir şekilde işletilmemekte ve denetlememektedir. Bu sitede ve üçüncü şahıs sitelerindeki içerik olduğu gibi sağlanmaktadır ve yukarıdaki paragrafta belirttiğimiz hususlar dahil hiçbir konuda açık ya da dolaylı hiç bir garanti verilmemektedir. Ayrıca, bu durum üçüncü kişilerin web sitelerinin içeriğinin doğruluğu ve güvenirliğinin onaylandığı anlamına gelmemektedir. Bu nedenle üçüncü kişilerin web sitelerinde yer alan bilgi veya fikir konusunda sorumluluk kabul edilmemektedir. Yine üçüncü kişilerin siteye verdikleri linklerin web içeriklerinin doğruluğu ve güvenilirliğinin tarafımızdan onaylandığı anlamı da asla çıkarılmamalıdır.
                            <br>
                            İşbu web sitesindeki bilgiler sadece kullanıcıyı bilgilendirmek amacı ile sunulmuş olup; hukuki, tıbbi, finansal, yatırım, vergi, muhasebe ve diğer benzeri konularda tavsiye niteliğinde değildir. İşbu web sitesinde yayınlanan bilgilere güvenerek yapacağınız herhangi bir işlemin sorumluluğu tamamen size aittir.
                            <br>
                            3- İş bu web sitesi kullanıcılar arasında gerçek zamanda etkileşim olmasını imkanlı kılan forum alanları içerebilir. Forum alanları için kullanıcılar kendisinden istendiği takdirde, kimlik bilgileri, telefon bilgileri, tebligat adresi, yazışma adresi, eposta, telefon, IP numarası gibi her türlü bilgiyi gerçeğe uygun bir şekilde vermek yükümlülüğündedir.<br>
                            ulak.news forum alanlarına gönderilen mesajları, bilgileri ya da dosyaları denetlemek zorunluluğu yoktur. Ancak, tek taraflı olarak her tür bilgiyi ve malzemeyi, değiştirme, yayınlamayı reddetme ya da yayından kaldırma hakkını ve herhangi bir adli ya da idari isteğe yanıt vermek için her türlü bilgiyi açıklama hakkını her zaman saklı tutar. İşbu web sitesinde yayınlanan her türlü kullanıcı mesajları, yayınlar ve benzeri eklemeler ilgili kişinin kendi görüşlerini yansıtmakta olup sadece kullanıcıyı bağlar. ulak.news  bu görüş ve fikirlerden ve ilgili mesaj, ekleme ve yüklemeler ile her tür diğer içerikten sorumlu değildir. Forum alanlarında yayınlanmış görüşler ulak.news'in kabul ya da reddettiği anlamına gelmez.
                            <br>
                            Forum alanlarını ve iş bu web sitesini kullanırken aşağıdaki şartlara uymayı kabul edersiniz: 
                            <br>
                            - içeriği hukuka aykırı yıldırıcı, tehdit edici, hakaret niteliğinde olan, genel ahlaka aykırı, yakışıksız, edebe aykırı, pornografik, aşağılayıcı, karalayıcı, küfürlü, lekeleyici ve benzeri her türlü bilgi ve görüş, 
                            <br>
                            - suç teşkil edecek veya suça teşvik edici nitelikte veya ulusal ve uluslararası kanunlara aykırı olan veya başkalarının kişisel haklarını zedeleyici, çiğneyici, hakaret edici, özel hayatlarına ve kamu haklarına tecavüz teşkil eden veya fikri mülkiyet hukuku ve ilgili diğer kanunla tarafından korunan telif hakları, patent, tasarım, ticari sır veya diğer fikri mülkiyet hakları ile bunlara ek olarak eser sahibinden izin almaksızın işleme ve derleme eser haklarına karşı ihlal ve tecavüz teşkil eden her türlü yazı, makale, resim, görüntü, fotoğraf, haber, yazılım programı veya benzeri unsurlar, 
                            <br>
                            - kin, nefret, ırkçılık, bağnazlık, başkalarına karşı her türlü fiziki tecavüzü teşvik eden veya küçüklere zararlı olabilecek, rahatsız edici, saldırgan veya başkalarına saldırganlığı teşvik edici, her türlü mesaj, eklemeler ve yayınlar,
                            <br>
                            - küçükleri şiddet ve cinselliğe yönelten, teşvik eden veya kanuna karşı faaliyetler hakkında eğitici bilgi veren, yasadışı silahların üretimi, nasıl yapıldığı, nasıl satıldığı hususunda bilgi veren mesajlar, 
                            <br>
                            - diğer kullanıcılara vermek üzere ve ticari amaçlı veya diğer başka yasal olmayan amaçlar için kullanmak üzere web sitesini kullananların şifre ve kişisel bilgilerini istemek veya almak, 
                            <br>
                            - virüs veya zararlı spamlar içeren veya virüs yaratan her türlü mesaj, ekleme ve yüklemeler , istenmeyen e-mail, zincirleme mektup, davetsiz toplu e-mail veya spam göndermek veya web sitesini ticari amaç için kullanmak, reklam, satış, ticari faaliyetle ilgili unsurlar taşıyan mesaj bırakma, eklemelerde bulunma veya yükleme yapmak, yasaktır. 
                            Aksi takdirde doğabilecek her türlü hukuki ve cezai sorumluluk kullanıcıya aittir. Kullanıcı ulak.news Yönetiminin bu nedenlerle muhatap olacağı her türlü talebi karşılamakla ve ödemek zorunda kalacağı idari ve cezai para cezaları dahil her türlü tazminatı ulak.news’e ödemekle yükümlüdür. 
                            <br>
                            <br>
                            ulak.news yönetimi yukarıda belirtilen kullanım koşullarını dilediği her zaman geliştirebilir ve güncelleyebilir. Kullanıcıların bildirdiği adres, kullanıcılara yapılacak her türlü bildirim için yasal adres kabul edilir. ulak.news kullanıcılarının kimliklerine, adreslerine, hizmet sağlayıcılarına ve benzeri bilgilerine erişemez. ulak.news'in üyelik bölümünde bazı bilgiler istenmektedir, kullanıcılar burada talep edilen bilgileri kendi rızalarıyla verir. Bunun dışında ulak.news donanım ve yazılım bilgilerinizi toplayabilir. Bu bilgiler arasında şunlar yer alır: IP adresiniz, tarayıcı türü, işletim sistemi, etki alan adı, erişim süreleri ve ilgili web adresleri.
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