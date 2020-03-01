<section class="main-content extra-pages">
			<div class="main-content-wrapper add-to-margin">
				<div class="content-body">
					<!-- article body start -->
					<article class="article-wrapper">
						<div class="article-content">
							<h1 class="extra-title">Tüm Kategoriler</h1>
							<div class="article-inner">
								<div class="author-list">
                                    <?php
                                        foreach($all_cats as $cat){
                                    ?>
                                        <div class="author-item">
                                            <div class="author-info">
                                                <a href="/<?php echo $cat['seo_link']; ?>" class="author-name" style="margin-left: 15px;"><h4><?php echo $cat['cat']; ?></h4></a>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    ?>
								</div>
							</div>
							<!--this is important for the left ad box or share box fixer -->
							<div id="endOfTheArticle"></div>
						</div>
					</article>
					<!-- article body end -->
				</div>
				<div class="content-sidebar">
					<div class="sidebar_inner" style="position: absolute; top: 0px;">

						<div class="sidebar-spacer"></div>
						<div class="sidebar-button-group">
							<a href="about-us.html" class="sidebar-buttons material-button"><i class="material-icons"></i><span class="btn-label">About Us</span></a>
							<a href="authors.html" class="sidebar-buttons material-button active"><i class="material-icons"></i><span class="btn-label">Authors</span></a>
							<a href="privacy-policy.html" class="sidebar-buttons material-button"><i class="material-icons"></i><span class="btn-label">Privacy Policy</span></a>
							<a href="contact.html" class="sidebar-buttons material-button"><i class="material-icons"></i><span class="btn-label">Contacts</span></a>
						</div>


					</div>
				</div>
			</div>
		</section>