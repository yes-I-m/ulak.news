                            <div class="tr-section tr-widget">
								<div class="widget-title">
									<span>Son Dakika</span>
								</div>
								<ul class="medium-post-list">
									<?php
										foreach($son_dakika as $raw){
									?>
										<li class="tr-post">
											<div class="entry-header">
												<div class="entry-thumbnail">
													<a href="<?php echo $raw['seo_link']; ?>"><img class="img-fluid" data-src="<?php echo $raw['image']; ?>" src="images/loading.gif" alt="<?php echo $raw['title']; ?>"></a>
												</div>
											</div>
											<div class="post-content">
												<div class="catagory">
													<span><?php echo $raw['agency_title']; ?></span>
												</div>
												<h2 class="entry-title">
													<a href="<?php echo $raw['seo_link']; ?>"><?php echo $raw['title']; ?></a>
												</h2>
											</div><!-- /.post-content -->			
										</li>
									<?php
										}
									?>
								</ul>
							</div><!-- /.tr-section -->