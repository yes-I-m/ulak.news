<div class="seperator"></div>
<!-- Footer -->
<footer class="page-footer font-small" style="width: 70%;">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
        <p>
            ulak.news açık kaynak kodlu bir projedir. Basının özgürlüğüne inanan, bireyin haber alma özgürlüğüne sahip çıkan bir ortam yaratmak amaçlı oluşturulan otomatik olarak haber yayınlayan sistemdir. Daha fazla detay için hakkımızda kısmına göz atın...<br>
            Bu İnternet Sitesinin her hangi bir sayfasına girilmesi halinde Kullanım Şartları, Topluluk Şartları, Sorumluluk Reddi Beyanı şartlarını kabul edilmiş sayılır. Bu şartların kabul edilmemesi durumunda İnternet Sitesine girilmemelidir. İlgili Şartlara Sayfalar bölümünden ulaşabilirsiniz.
        </p>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


	<!-- Register popup html source start -->
	<div class="m-modal-box" id="registerModal">
		<div class="m-modal-overlay"></div>
		<div class="m-modal-content small">
			<div class="m-modal-header">
				<h3 class="m-modal-title">Register</h3>
				<span class="m-modal-close"><i class="material-icons">&#xE5CD;</i></span>
			</div>
			<div class="m-modal-body">
				<div class="m-modal-social-logins">
					<div class="columns column-2">
						<button class="frm-button facebook material-button full" type="button">Facebook</button>
					</div>
					<div class="columns column-2">
						<button class="frm-button twitter material-button full" type="button">Twitter</button>
					</div>
					<div class="columns column-2">
						<button class="frm-button google material-button full" type="button">Google</button>
					</div>
				</div>

				<div class="m-modal-seperator"><span>OR</span></div>

				<form>
					<div class="frm-row">
						<input class="frm-input" type="text" name="name" placeholder="Name">
					</div>
					<div class="frm-row">
						<input class="frm-input" type="text" name="username" placeholder="Username">
					</div>
					<div class="frm-row">
						<input class="frm-input" type="text" name="email" placeholder="Email">
					</div>
					<div class="frm-row">
						<input class="frm-input" type="text" name="password" placeholder="Password">
					</div>
					<div class="frm-row">
						<label class="frm-check-radio-label"><input type="checkbox" name="test"> <span>I accept your <a href="#">register policy</a>.</span></label>
					</div>
					<div class="frm-row">
						<button class="frm-button material-button full" type="button">Register</button>
					</div>
				</form>
				<div class="frm-row">
					<p class="txt-center">Do you already have an account? <a href="#" data-modal="loginModal">Login</a></p>
				</div>
			</div>
		</div>
	</div>
	<!-- Register popup html source end ---->

	<!-- Login popup html source start -->
	<div class="m-modal-box" id="loginModal">
		<div class="m-modal-overlay"></div>
		<div class="m-modal-content small">
			<div class="m-modal-header">
				<h3 class="m-modal-title">Login</h3>
				<span class="m-modal-close"><i class="material-icons">&#xE5CD;</i></span>
			</div>
			<div class="m-modal-body">
				<div class="m-modal-social-logins">
					<div class="columns column-3">
						<button class="frm-button facebook material-button full" type="button">Facebook</button>
					</div>
					<div class="columns column-3">
						<button class="frm-button google material-button full" type="button">Google</button>
					</div>
				</div>

				<div class="m-modal-seperator"><span>OR</span></div>

				<form>
					<div class="frm-row">
						<input class="frm-input" type="text" name="email" placeholder="Email">
					</div>
					<div class="frm-row">
						<input class="frm-input" type="text" name="password" placeholder="Password">
					</div>
					<div class="frm-row">
						<button class="frm-button material-button full" type="button">Login</button>
					</div>
				</form>
				<div class="frm-row">
					<p class="txt-center">Don't you have an account yet? <a href="#" data-modal="registerModal">Register</a></p>
				</div>
			</div>
		</div>
	</div>
	<!-- Login popup html source end -->

	<!-- Newsletter popup html source start -->
	<div class="m-modal-box" id="newsletterModal">
		<div class="m-modal-overlay"></div>
		<div class="m-modal-content small">
			<div class="m-modal-header">
				<h3 class="m-modal-title">Newsletter</h3>
				<span class="m-modal-close"><i class="material-icons">&#xE5CD;</i></span>
			</div>
			<div class="m-modal-body">
				<p>Submit to our newsletter to receive exclusive stories delivered to you inbox!</p>
				<form>
					<div class="frm-row">
						<input class="frm-input" type="text" name="email" placeholder="Email address">
					</div>
					<div class="frm-row">
						<button class="frm-button material-button full" type="button">Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Newsletter popup html source end -->

	<div class="overlay"></div>

	<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "Organization",
		"url": "https://ulak.news",
			"logo": {
				"@type": "ImageObject",
				"url": "https://ulak.news/img/ulak/logo_2.webp",
				"width": 190,
				"height": 90    
			}
		}
	</script>
	<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "WebSite",
		"url": "https://ulak.news/",
		"potentialAction": {
			"@type": "SearchAction",
			"target": "https://ulak.news/arama.html?q={search_term_string}",
			"query-input": "required name=search_term_string"
		}
	}
	</script>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-43122854-40"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-43122854-40');
	</script>


	<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(62533783, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/62533783" style="position:absolute; left:-9999px;" alt="yandex" /></div></noscript> <!-- /Yandex.Metrika counter -->