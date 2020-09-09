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
                                                <a href="/<?php echo $cat['seo_link']; ?>" class="author-name" style="margin-left: 15px;"><h4><?php echo $cat['cat']; ?> (<?php echo $cat['total']; ?>)</h4></a>
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
						<?php include("./view/sidebar_menu_group.php"); ?>
					</div>
				</div>
			</div>
		</section>