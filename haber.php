<?php
	include("funcs.php");
	
	$news_det=null;
	$page_status=false;

	$get_new=get_new($_GET['agency'], $_GET['id']);


	if($get_new['status']){
		$news_det=$get_new['result'];
		if($news_det!==null){
			$page_status=true;
		}
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
	$son_dakika=get_news("all", 3, 0);
	if($son_dakika['status']){
		$son_dakika=$son_dakika['result'];
	}else{
		$son_dakika=[];
	}
	$mostRead_today=getMostReaded("today", 5);
	$mostRead_week=getMostReaded("week", 5);
	$mostRead_month=getMostReaded("month", 5);

	if($mostRead_today['status']){
		$mostRead_today=$mostRead_today['result'];
	}else{
		$mostRead_today=[];
	}

	if($mostRead_week['status']){
		$mostRead_week=$mostRead_week['result'];
	}else{
		$mostRead_week=[];
	}

	if($mostRead_month['status']){
		$mostRead_month=$mostRead_month['result'];
	}else{
		$mostRead_month=[];
	}
	$lastSearch=lastSearch();
?>
<html lang="tr" style="transform: none;">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="ulak.news">
    	<meta itemprop="isFamilyFriendly" content="true"/>
		<?php
			// haber yoksa veya görüntülemeye kapalı ise arama motorlarından silinmesini istiyoruz.
			if(!$page_status || $news_det['visible']){echo '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';}
		?>
		<title><?php echo $news_det['title']; ?></title>
		<meta itemprop="image" content="<?php echo $news_det['image']; ?>" />
		<meta property="og:title" content="<?php echo $news_det['title']; ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="<?php echo $news_det['image']; ?>" />
		<link rel="image_src" href="<?php echo $news_det['image']; ?>" />
		<meta name="keywords" content="<?php echo $news_det['keywords']; ?>" />
		<meta property="og:description" content="<?php echo $news_det['spot']; ?>" />
		<meta name="description" content="<?php echo $news_det['spot']; ?>" />
		<meta itemprop="dateCreated" content="<?php echo $news_det['date']; ?>">
		<meta itemprop="dateModified" content="<?php echo $news_det['saved_date']; ?>">
		<meta name="news_keywords" content="<?php echo $news_det['keywords']; ?>"/>

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
	<style type="text/css">
		/* 
		 bazı haber ajanslarından gelen ilgili haberleri yada gereksiz divleri gizliyoruz yada şekil veriyoruz bu style da!
		*/
		.related-news-box{
			display:none;
		}
		.tr-details img{
			width: 300px;
			height: 300px;
			padding-top: 15px;
		}
	</style>
	<style id="theia-sticky-sidebar-stylesheet-TSS">.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style></head>
	<?php include("view/gtag.php"); ?>
	<body class="detailspage" style="transform: none;">
	  	<div class="main-wrapper tr-page-top" style="transform: none;">
		  	<div class="container-fluid" style="transform: none;">
			  <?php include("view/header.php"); ?>
				<div class="row" style="transform: none;">
					<div class="col-lg-9 tr-sticky" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
						<div class="tr-content theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
							<div class="tr-section">
								<?php
									// haber var mı yok mu ve bazı kontroller,
									if($page_status || $news_det['visible']){
								?>
								<div class="tr-post">
									<div class="entry-header">
										<h2 class="entry-title">
											<?php echo $news_det['title']; ?>
										</h2>
										<div class="entry-thumbnail d-flex justify-content-center">
											<img class="img-fluid w-75" src="<?php echo $news_det['image'] ?>" alt="<?php echo $news_det['title']; ?>">
										</div>
									</div>
									<div class="post-content">
										<div class="author">
											<a href="kaynak_<?php echo $news_det['agency']; ?>.html"><img class="img-fluid img-circle" src="https://api.ulak.news/images/web/<?php echo $news_det['agency']; ?>.png" alt="<?php echo $news_det['agency_title']; ?>"></a>
										</div>
										<div style="float: right;" class="entry-meta">
											<ul>
												<li><?php echo $news_det['date']; ?></li>
												<li><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $news_det['read_times']; ?> kere okundu</li>
												<li>
													<ul>
														<li>Paylaş;</li>
														<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://ulak.news/<?php echo $news_det['seo_link']; ?>&t=<?php echo $news_det['title']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
														<li><a target="_blank" href="https://twitter.com/share?url=https://ulak.news/<?php echo $news_det['seo_link']; ?>&via=ulak_news&text=<?php echo $news_det['title']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
													</ul>
												</li>
											</ul>
										</div><!-- /.entry-meta -->
										
									</div><!-- /.post-content -->									
								</div><!-- /.tr-post -->

								<div style="color: black; font-size: 16px;" class="tr-details">
									<?php echo $news_det['text']; ?>
									<br/>
									<hr/>
									Bu haber hiçbir şekilde değiştirilmeden <?php echo date('d.m.Y h:i:s', $news_det['saved_date']); ?> tarihinde <?php echo $news_det['agency_title']; ?> den alınmıştır.<br/>
									<a href="<?php echo $news_det['url']; ?>" target="_blank">Haberin orjinaline ulaşmak için tıklayınız. <i class="fa fa-external-link" aria-hidden="true"></i></a>
								</div><!-- /.tr-details -->
								<?php
									}else{ 
									/// eğer haber ilgili ajansta yoksa yada görüntüleme kapalı ise;
										include("view/404.php");
									}
								?>
							</div><!-- /.tr-section -->

							<div style="display: none;" class="tr-ad">
								<a href="#"><img class="img-fluid" src="" alt="Image"></a>
							</div><!-- /.add -->								

							<div class="tr-comment">
							<a name="comments"></a>
								<div class="section-title">
									<h1><span>Yorumlar <i onClick="getComments();" style="text-align: center; color: green;" class="fa fa-refresh" aria-hidden="true"></i></span></h1>
								</div>
								<ul class="post-comment ajax-comments">

								</ul>									
							</div><!-- /.comment-section -->

							<div class="tr-comment-box">
								<div class="section-title">
									<h1><span>Yorum Ekle</span></h1>
								</div>
								    <div class="row">
								        <div class="col-md-4">
								            <div class="form-group">
								                <label for="one"><strong>Adınız Soyadınız:</strong></label>
								                <input name="name" type="text" autocomplete="off" class="form-control" required="required" id="one">
								            </div>
								        </div>
								        <div class="col-md-12">
								            <div class="form-group">
								                <label for="four"><strong>Yorumunuz:</strong></label>
								                <textarea name="message" required="required" class="form-control" id="four"></textarea>
								            </div>             
								        </div>     
								    </div>
								    <div class="form-group text-center">
										Yorumu gönderdiğinizde reddi beyan, topluluk sözleşmesi ve kullanım sözleşmesini kabul etmiş sayılırsınız.
								        <button onclick="addComment();" type="submit" style="color: white;" class="btn btn-primary pull-right">Yorumu ekle</button>
								    </div>
							</div><!-- /.tr-comment-box -->
						</div><!-- /.tr-content -->
					</div><!-- /.tr-sticky -->

					<div class="col-lg-3 tr-sidebar tr-sticky" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
						<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 963.75px;">

							<div  style="display: none;" class="tr-section tr-widget tr-ad ad-before">
								<a href="#"><img class="img-fluid" src="" alt="Image"></a>
							</div><!-- /.tr-post -->

							<?php
								include("view/breaking_news.php");
							?>

							<div style="display: none;" class="tr-weather tr-widget">
								<div class="weather-top">
									<div class="row">
										<div class="col-xs-6">
											<div class="weather-image">
												<img class="img-fluid" src="" alt="Image">
											</div>
										</div>
										<div class="col-xs-6">
											<span class="weather-temp">21 <sup><span>°</span>C</sup></span>
											<span class="weather-type">Mostly Cloudy</span>
										</div>
									</div>
									<ul>
										<li>London, UK</li>
										<li><span><img class="img-fluid" src="" alt="Image"></span>13%</li>
										<li><span><img class="img-fluid" src="" alt="Image"></span>6.44 MPH</li>
									</ul>
								</div><!-- /.weather-top -->

								<div class="weather-bottom">
									<ul>
										<li>
											<div class="weather-icon">
												<img class="img-fluid" src="" alt="Image">
											</div>
											<div class="weather-info">
												<span>23°</span>
												<span class="date">Sun, 3 Jan</span>
											</div>
										</li>
										<li>
											<div class="weather-icon">
												<img class="img-fluid" src="" alt="Image">
											</div>
											<div class="weather-info">
												<span>26°</span>
												<span class="date">Sun, 3 Jan</span>
											</div>
										</li>
									</ul>
								</div><!-- /.weather-bottom -->
							</div><!-- /.weather-widget -->

							<div style="display: none;" class="tr-section tr-widget tr-ad ad-before">
								<a href="#"><img class="img-fluid" src="" alt="Image"></a>
							</div><!-- /.tr-post -->								
							<hr/>
							<?php
								include("view/most_read.php");
							?>

							<div style="display: none;" class="tr-widget meta-widget">
								<div class="widget-title">
									<span>TEST</span>
								</div>
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation"><a class="active" href="#author" data-toggle="tab"><i class="fa fa-user"></i>Authors</a></li>
									<li role="presentation"><a href="#comment" data-toggle="tab"><i class="fa fa-comment-o"></i>Comments</a></li>
								</ul>
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active fade in show" id="author">
										<ul class="authors-post">
											<li>
												<div class="entry-meta">
													<div class="author-image">
														<a href="#"><img class="img-fluid" src="" alt="Image"></a>
													</div>
													<div class="author-info">
														<h2><a href="#">Janet Jackson</a></h2>
													</div>						
												</div>
											</li>
											<li>
												<div class="entry-meta">
													<div class="author-image">
														<a href="#"><img class="img-fluid" src="" alt="Image"></a>
													</div>
													<div class="author-info">
														<h2><a href="#">Matt Cloey</a></h2>
													</div>						
												</div>
											</li>
											<li>
												<div class="entry-meta">
													<div class="author-image">
														<a href="#"><img class="img-fluid" src="" alt="Image"></a>
													</div>
													<div class="author-info">
														<h2><a href="#">Kolony Wispe</a></h2>
													</div>						
												</div>
											</li>
											<li>
												<div class="entry-meta">
													<div class="author-image">
														<a href="#"><img class="img-fluid" src="" alt="Image"></a>
													</div>
													<div class="author-info">
														<h2><a href="#">Matt Cloey</a></h2>
													</div>						
												</div>
											</li>
											<li>
												<div class="entry-meta">
													<div class="author-image">
														<a href="#"><img class="img-fluid" src="" alt="Image"></a>
													</div>
													<div class="author-info">
														<h2><a href="#">Jhon dun</a></h2>
													</div>						
												</div>
											</li>			
										</ul>
									</div>
									<div role="tabpanel" class="tab-pane fade in" id="comment">
										<ul class="comment-list">
											<li>
												<div class="post-content">	
													<div class="entry-meta">
														<span><a href="#">Jhon dun</a></span>
													</div>
													<h2 class="entry-title">
														<a href="#">3 students arrested after body-slamming principal</a>
													</h2>
												</div>
											</li>
											<li>
												<div class="post-content">	
													<div class="entry-meta">
														<span><a href="#">Matt Cloey</a></span>
													</div>
													<h2 class="entry-title">
														<a href="#">4 students arrested after body-slamming principal</a>
													</h2>
												</div>
											</li>
											<li>
												<div class="post-content">	
													<div class="entry-meta">
														<span><a href="#">Kolony Wispe</a></span>
													</div>
													<h2 class="entry-title">
														<a href="#">3 students arrested after body-slamming principal</a>
													</h2>
												</div>
											</li>
											<li>
												<div class="post-content">	
													<div class="entry-meta">
														<span><a href="#">Janet Jackson</a></span>
													</div>
													<h2 class="entry-title">
														<a href="#">4 students arrested after body-slamming principal</a>
													</h2>
												</div>
											</li>
											<li>
												<div class="post-content">	
													<div class="entry-meta">
														<span><a href="#">Matt Cloey</a></span>
													</div>
													<h2 class="entry-title">
														<a href="#">2 students arrested after body-slamming principal</a>
													</h2>
												</div>
											</li>	
										</ul>
									</div>
								</div>
							</div><!-- meta-tab -->	
						</div><!-- /.theiaStickySidebar -->						
					</div>			
				</div><!-- /.row -->

				<div style="display: none;" class="tr-ad ad-bottom ad-image text-center">
					<a href="#"><img class="img-fluid" src="" alt="Image"></a>
				</div><!-- /.tr-ad -->

		  	</div><!-- /.container-fulid -->  		
	  	</div><!-- /.main-wrapper -->

		<footer id="footer">
			<?php
				include("view/footer.php");
			?>	
		</footer><!-- /#footer -->  	


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
		<script>
		function getComments(){
		    $.ajax({
				type: 'GET', 
				url: 'view/comments.php', 
				data: { process: "getComments", agency: '<?php echo $news_det['agency']; ?>', id: <?php echo $news_det['id']; ?> }, 
				dataType: 'html',
				beforeSend: function(){
					$(".ajax-comments").html('<i style="text-align: center" class="fa fa-spin fa-4x fa-spinner" aria-hidden="true"></i> Yorumlar Yükleniyor...');	
				},
				success: function (data) {
					$(".ajax-comments").html(data);
				},
				error: function (data) {
					alert("Yorumlar alınamadı.");
				}
			});
		}
		function addComment(){
			if($("textarea[name=message]").val().length>4 && $("input[name=name]").val().length>=3){
				var data={name: $("input[name=name]").val(), message: $("textarea[name=message]").val()};
				$.ajax({
					type: 'POST', 
					url: 'view/comments.php?process=addComment&agency=<?php echo $news_det['agency']; ?>&id=<?php echo $news_det['id']; ?>', 
					data: data, 
					dataType: 'json',
					success: function (data) {
						if(data.status){
							alert("Yorumunuz eklendi.");
							$("input[name=name]").val('');
							$("textarea[name=message]").val('');
							getComments();
							location.href = "#comments";
						}else{
							alert("Yorumunuz eklenemedi.")
						}
					},
					error: function (data) {
						alert("Tekrar deneyiniz.");
					}
				});
			}else{
				alert("Adınız veya yorumunuz kısa...")
			}
		}
		getComments();
		</script>
    </body>
    </html>