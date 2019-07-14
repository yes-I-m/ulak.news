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
											<img class="img-fluid img-circle" src="https://api.ulak.news/images/web/<?php echo $news_det['agency']; ?>.png" alt="<?php echo $news_det['agency_title']; ?>">
										</div>
										<div style="float: right;" class="entry-meta">
											<ul>
												<li>Kaynak; <a href="#"><?php echo $news_det['agency_title']; ?></a></li>
												<li><a href="#"> <?php echo $news_det['date']; ?></a></li>
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
								<a href="#"><img class="img-fluid" src="images/ico/favicon.ico" alt="Image"></a>
							</div><!-- /.add -->								

							<div style="display: none;" class="tr-comment">
								<div class="section-title">
									<h1><span>Yorumlar</span></h1>
								</div>								
								<ul class="post-comment">
								    <li class="media">
								        <div class="commenter-avatar">
								            <a href="#"><img class="img-fluid img-circle" src="images/others/author1.png" alt="Image"></a>
								        </div>
								        <div class="media-body">
							                <h2>Axel Bouaziz <span>2 Jan 2017</span></h2>
							                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
							                <a href="#" class="reply">Reply</a>
								        </div>
								    </li>
								    <li class="media">
								        <div class="commenter-avatar">
								            <a href="#"><img class="img-fluid img-circle" src="images/others/author1.png" alt="Image"></a>
								        </div>
								        <div class="media-body">
							                <h2>Adam Hianks<span>7 Jan 2017</span></h2>
							                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
							                <a href="#" class="reply">Reply</a>
								        </div>
								    </li>
								    <li class="media">
								        <div class="commenter-avatar">
								            <a href="#"><img class="img-fluid img-circle" src="images/others/author2.png" alt="Image"></a>
								        </div>
								        <div class="media-body">
							                <h2>Matt Cloey <span>12 Jan 2017</span></h2>
							                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
							                <a href="#" class="reply">Reply</a>
								        </div>
								    </li>
								</ul>									
							</div><!-- /.comment-section -->

							<div style="display: none;" class="tr-comment-box">
								<div class="section-title">
									<h1><span>Leave a Comments</span></h1>
								</div>
								<form class="contact-form" name="contact-form" method="post" action="#">
								    <div class="row">
								        <div class="col-md-4">
								            <div class="form-group">
								                <label for="one">Name</label>
								                <input type="text" class="form-control" required="required" id="one">
								            </div>
								        </div>
								        <div class="col-md-4">
								            <div class="form-group">
								                <label for="two">Email</label>
								                <input type="email" class="form-control" required="required" id="two">
								            </div> 
								        </div>
								        <div class="col-md-4">
								            <div class="form-group">
								                <label for="three">Subject</label>
								                <input type="text" class="form-control" required="required" id="three">
								            </div> 
								        </div>
								        <div class="col-md-12">
								            <div class="form-group">
								                <label for="four">Your Text</label>
								                <textarea name="message" required="required" class="form-control" rows="7" id="four"></textarea>
								            </div>             
								        </div>     
								    </div>
								    <div class="form-group text-center">
								        <button type="submit" class="btn btn-primary pull-right">Submit Your Text</button>
								    </div>
								</form><!-- /.contact-form -->																		
							</div><!-- /.tr-comment-box -->
						</div><!-- /.tr-content -->
					</div><!-- /.tr-sticky -->

					<div class="col-lg-3 tr-sidebar tr-sticky" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
						<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 963.75px;">

							<div  style="display: none;" class="tr-section tr-widget tr-ad ad-before">
								<a href="#"><img class="img-fluid" src="images/ai/2.jpg" alt="Image"></a>
							</div><!-- /.tr-post -->

							<?php
								include("view/breaking_news.php");
							?>

							<div style="display: none;" class="tr-weather tr-widget">
								<div class="weather-top">
									<div class="row">
										<div class="col-xs-6">
											<div class="weather-image">
												<img class="img-fluid" src="images/others/weather1.png" alt="Image">
											</div>
										</div>
										<div class="col-xs-6">
											<span class="weather-temp">21 <sup><span>°</span>C</sup></span>
											<span class="weather-type">Mostly Cloudy</span>
										</div>
									</div>
									<ul>
										<li>London, UK</li>
										<li><span><img class="img-fluid" src="images/others/weather2.png" alt="Image"></span>13%</li>
										<li><span><img class="img-fluid" src="images/others/weather3.png" alt="Image"></span>6.44 MPH</li>
									</ul>
								</div><!-- /.weather-top -->

								<div class="weather-bottom">
									<ul>
										<li>
											<div class="weather-icon">
												<img class="img-fluid" src="images/others/weather4.png" alt="Image">
											</div>
											<div class="weather-info">
												<span>23°</span>
												<span class="date">Sun, 3 Jan</span>
											</div>
										</li>
										<li>
											<div class="weather-icon">
												<img class="img-fluid" src="images/others/weather5.png" alt="Image">
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
								<a href="#"><img class="img-fluid" src="images/ai/2.jpg" alt="Image"></a>
							</div><!-- /.tr-post -->								

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
														<a href="#"><img class="img-fluid" src="images/others/author4.png" alt="Image"></a>
													</div>
													<div class="author-info">
														<h2><a href="#">Janet Jackson</a></h2>
													</div>						
												</div>
											</li>
											<li>
												<div class="entry-meta">
													<div class="author-image">
														<a href="#"><img class="img-fluid" src="images/others/author5.png" alt="Image"></a>
													</div>
													<div class="author-info">
														<h2><a href="#">Matt Cloey</a></h2>
													</div>						
												</div>
											</li>
											<li>
												<div class="entry-meta">
													<div class="author-image">
														<a href="#"><img class="img-fluid" src="images/others/author6.png" alt="Image"></a>
													</div>
													<div class="author-info">
														<h2><a href="#">Kolony Wispe</a></h2>
													</div>						
												</div>
											</li>
											<li>
												<div class="entry-meta">
													<div class="author-image">
														<a href="#"><img class="img-fluid" src="images/others/author7.png" alt="Image"></a>
													</div>
													<div class="author-info">
														<h2><a href="#">Matt Cloey</a></h2>
													</div>						
												</div>
											</li>
											<li>
												<div class="entry-meta">
													<div class="author-image">
														<a href="#"><img class="img-fluid" src="images/others/author8.png" alt="Image"></a>
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
					<a href="#"><img class="img-fluid" src="images/ai/5.jpg" alt="Image"></a>
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
	
    </body>
    </html>