<div class="tr-topbar clearfix margin-bottom-0">
					<div class="row">
						<div class="col-lg-3">
							<a class="navbar-brand d-none d-lg-block" href="index.php"><img class="img-fluid" src="images/logo_2.png" alt="Logo"></a>
						</div>
						<div class="col-lg-9">
							<div class="topbar-left">
			                    <div class="breaking-news">
			                        <span>#SonDakika</span>
			                        <div id="ticker"> 
			                            <ul style="left: -982.3px;">
										<?php
											foreach($son_dakika as $raw){
												echo '<li><a href="'.$raw['seo_link'].'">'.$raw['title'].'</a></li>';
											}
										?>
			                            </ul> 
			                   	 	</div>
			                	</div><!-- breaking-news -->							
							</div><!-- /.topbar-left -->
							<div class="topbar-right">
								<div class="user">
									<div class="user-image">
										<img class="img-fluid img-circle" src="images/others/user.png" alt="Image">
									</div>
									<div class="dropdown user-dropdown">
										Hoşgeldin,						
										<a href="#" aria-expanded="true">Ziyaretçi<i class="fa fa-caret-down" aria-hidden="true"></i></a>
										<ul style="visibility: hidden" class="sub-menu text-left">
											<li><a href="#">My Profile</a></li>
											<li><a href="#">Settings</a></li>
											<li><a href="#">Log Out</a></li>
										</ul>								
									</div>							
								</div>
								<div class="searchNlogin">
									<ul>
										<li class="search-icon"><i class="fa fa-search"></i></li>
										<li style="visibility: hidden;"><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
										<li style="visibility: hidden;"><a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i></a></li>
										<li style="visibility: hidden;" class="dropdown language-dropdown">						
											<a href="#" aria-expanded="true">EN<i class="fa fa-angle-down" aria-hidden="true"></i></a>
											<ul class="sub-menu text-center">
												<li><a href="#">EN</a></li>
												<li><a href="#">FR</a></li>
												<li><a href="#">GR</a></li>
												<li><a href="#">ES</a></li>
											</ul>
										</li>
									</ul>
									<div class="search">
										<form action="arama.html" id="searchform" method="get" role="form">
											<input type="text" name="q" class="search-form" autocomplete="off" placeholder="Haber içeriklerinde ara">
										</form>
									</div> <!--/.search--> 								
								</div>										
							</div><!-- /.topbar-right -->								
						</div>							
					</div><!-- /.row -->				
				</div><!-- /.tr-topbar -->	

				<div class="tr-menu menu-responsive">
                    <?php include("menu.php"); ?>
				</div><!-- /tr-menu -->
				<div class="header-secondary" style="height: auto;">
				<div class="container">
					<div class="market-data">
						<?php
							$time=1;
							foreach(getCurrency() as $currency){
								$time=$currency['time'];
								if($currency["green"]===null){
									$color="color: color;";
									$currencyStatus='';
								}elseif($currency['green']){
									$color="color: green;";
									$currencyStatus='<i class="fa fa-thumbs-o-up"></i>';
								}else{
									$color="color: red;";
									$currencyStatus='<i class="fa fa-thumbs-o-down"></i>';
								}
								?>
								<div class="items item-text">
										<span class="name" style="font-size: 14px;"><?php echo $currency['currency']; ?></span><br/>
										<span class="value" style=""><?php echo $currency['value']; ?></span><br/>
										<span style="font-size: 11px; position: relative; <?php echo $color; ?>" class="change">% <?php echo $currency['change_percent']; ?> <?php echo $currencyStatus; ?></span>
								</div>
								<?php
							}
						?>
					</div>
					<hr style="background-color: white; height: 0.1px;"/>
						<div style="float: right;">
							<span style="color: white; font-size: 11px;">Son Güncelleme: <?php echo date('d.m.Y - H:i:s', $time); ?> (kaynak: investing.com)</span>
						</div>
				</div>
				</div>