<nav class="navbar navbar-default navbar-expand-lg">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        	<span class="navbar-toggler-icon"><i class="fa fa-align-justify"></i></span>
                    	</button>

						<a class="navbar-brand d-lg-none" href="index.php"><img class="img-fluid" style="width: 100%" src="images/logo_2.png" alt="Logo"></a>
		
						<div class="collapse navbar-left navbar-collapse" id="navbarNav">
							<ul class="nav navbar-nav">
							<li><a style="font-weight: bold; color: #ab1d1d" href="/index.html"><i class="fa fa-home" aria-hidden="true"></i> Ana Sayfa</a></li>
							<li class="dropdown"><a style="font-weight: bold; color: #ab1d1d" href="#"><i class="fa fa-folder" aria-hidden="true"></i> Sayfalar</a>
								<ul class="sub-menu">
									<li><a href="hakkimizda.html">Hakkımızda</a></li>
									<li><a href="reddi_beyan.html">Reddi Beyan</a></li>
									<li><a href="topluluk_sozlesmesi.html">Topluluk Sözleşmesi</a></li>
									<li><a href="kullanim_sozlesmesi.html">Kullanım Sözleşmesi</a></li>
									<li><a href="iletisim.html">İletişim</a></li>
								</ul>
							</li>
							<li class="dropdown"><a style="font-weight: bold; color: #ab1d1d" href="#"><i class="fa fa-list" aria-hidden="true"></i> Ajanslar</a>
								<ul class="sub-menu">
									<?php 
										foreach($get_agency as $raw){
											echo '<li><a href="'.$raw['seo_link'].'"><img style="width: 25px" src="'.$raw['image'].'"> '.$raw['title'].'</a></li>';
										}
									echo '<li><a href="kaynak.html"><i class="fa fa-globe"></i> Tüm Ajanslar</a></li>';
									?>
								</ul>
							</li>
								<?php
									foreach($get_cats as $key=>$raw){
										echo '<li><a href="'.$raw['seo_link'].'">'.$raw['cat'].'</a></li>';
										if($key===5){
											break;
										}
									}
								?>
								<li><a style="font-weight: bold; color: #ab1d1d" href="kategori.html">Tüm kategoriler</a></li>								
							</ul>
						</div>						
						<ul class="feed pull-right">
							<li><a href="https://fb.com/ulaknewstr" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="https://twitter.com/ulak_news" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						</ul>						
					</nav><!-- navbar -->	