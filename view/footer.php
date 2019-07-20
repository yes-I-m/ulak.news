
			<div class="footer-menu">
				<div class="container">
					<ul class="nav navbar-nav">                       
						<li class="active"><a href="/index.html">Ana Sayfa</a></li>
						<li class="dropdown"><a href="/hakkimizda.html">Hakkımızda</a></li>
						<li><a href="/reddi_beyan.html">Reddi Beyan</a></li>
						<li><a href="/topluluk_sozlesmesi.html">Topluluk Sözleşmesi</a></li>
						<li><a href="/kullanim_sozlesmesi.html">Kullanım Sözleşmesi</a></li>
						<li><a href="/iletisim.html">İletişim</a></li>
					</ul> 
				</div>
			</div>
			<div class="footer-widgets">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="widget widget-menu-2">
								<h2>Kategoriler</h2> 
								<ul style="list-style-type: circle;">
                                    <?php
                                        foreach($get_cats as $key=>$raw){
											echo '<li><a href="'.$raw['seo_link'].'">'.$raw['cat'].'</a></li>';
											if($key===10){
												break;
											}
                                        }
                                    ?>
                                    <li><a style="font-weight: bold" href="kategori.html">Tüm kategoriler</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget">
								<h2>Ajanslar</h2> 
								<ul>
                                    <?php
                                        foreach($get_agency as $raw){
											echo '<li><a href="'.$raw['seo_link'].'"><img style="width: 25px" src="'.$raw['image'].'"> '.$raw['title'].'</a></li>';
										}
                                    ?>
                                    <li><a style="font-weight: bold" href="kaynak.html">Tüm Ajanslar</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-5">
							<div class="widget widget-menu-2">
								<h2>Son aramalar</h2> 
								<ul style="list-style-type: circle;">
                                    <?php
                                        foreach($lastSearch as $raw){
											echo '<li><a href="arama.html?q='.$raw['keyword'].'">'.(strlen($raw['keyword'])>=15 ? mb_substr($raw['keyword'], 0, 15)."..." : $raw['keyword']).'</a></li>';
										}
                                    ?>
								</ul>
							</div>
						</div>
					</div><!-- /.row -->
				</div>
			</div>
			<div class="footer-bottom text-center">
				<div class="container">
					<div class="footer-bottom-content">
						<div class="footer-logo">
							<img class="img-fluid" style="width: 30%" src="images/logo_2.png" alt="Logo">
						</div>
						<p>
                            ulak.news açık kaynak kodlu bir projedir. Basının özgürlüğüne inanan, bireyin haber alma özgürlüğüne sahip çıkan bir ortam yaratmak amaçlı oluşturulan otomatik olarak haber yayınlayan sistemdir. Daha fazla detay için hakkımızda kısmına göz atın ;)<br>
                            Bu İnternet Sitesinin her hangi bir sayfasına girilmesi halinde Kullanım Şartları, Topluluk Şartları, Sorumluluk Reddi Beyanı şartlarını kabul edilmiş sayılır. Bu şartların kabul edilmemesi durumunda İnternet Sitesine girilmemelidir. İlgili Şartlara Sayfalar bölümünden ulaşabilirsiniz.
                        </p>
						<address>
							<p>© 2019 
                                Ulak.News | 
                                <strong>Email:</strong>
                                <script type="text/javascript">
                                    document.write('info@' + 'orhanaydogdu.com.tr')
                                </script>
                                <br>
                                | Made with <i class="fa fa-heart-o" style="color: red" aria-hidden="true"></i> by <a href="https://orhanaydogdu.com.tr" target="_blank">O.A</a> |
                            </p>
						</address>					
					</div><!-- /.footer-bottom-content -->
				</div><!-- /.container -->
			</div><!-- /.footer-bottom -->		