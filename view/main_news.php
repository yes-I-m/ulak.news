<?php
    foreach($all_news as $raw){
?>
                                    <div class="col-md-3 <?php echo $raw['agency']; ?>">
										<div class="tr-post">
											<div class="entry-header">
												<div class="entry-thumbnail">
													<a href="/<?php echo $raw['seo_link']; ?>"><img class="img-fluid" src="<?php echo $raw['image']; ?>" alt="Image"></a>
												</div>
											</div>
											<div class="post-content">
												<div class="author">
													<a href="kaynak_<?php echo $raw['agency']; ?>.html"><img style="background-color: white;" class="img-fluid img-circle" lazyload="on" data-src="https://api.ulak.news/images/web/<?php echo $raw['agency']; ?>.png" alt="Image"></a>
												</div>
												<div class="entry-meta">
													<ul>
														<li><span style="color: black; font-weight: bold;">Kaynak;</span> <a style="color: black" href="#"><?php echo $raw['agency_title']; ?></a></li>
														<li><a style="color: red;" href="#"><?php echo $raw['date']; ?></a></li>
													</ul>
												</div><!-- /.entry-meta -->
												<h2 class="entry-title">
													<a href="/<?php echo $raw['seo_link']; ?>"><?php echo $raw['title']; ?></a>
												</h2>
												<p style="color: black"><?php echo mb_substr($raw['spot'], 0, 170); ?>...</p>
												<div class="read-more">
													<div class="continue-reading pull-left">
														<a style="color: black; font-weight: bold" href="/<?php echo $raw['seo_link']; ?>">Devamını oku. <i class="fa fa-angle-right"></i></a>
													</div>
													<div class="feed pull-right">
														<ul>
                                                            <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://ulak.news/<?php echo $raw['seo_link']; ?>&t=<?php echo $raw['title']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
													        <li><a target="_blank" href="https://twitter.com/share?url=https://ulak.news/<?php echo $raw['seo_link']; ?>&via=ulak_news&text=<?php echo $raw['title']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
														</ul>	
													</div>
												</div>
											</div><!-- /.post-content -->
										</div><!-- /.tr-post -->
									</div>
<?php
    }
?>