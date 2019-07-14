<style>
/**
fix for news image
**/
.item-image {
    height: 410px;
    /* border-radius: 3px; */
    /* background-size: cover; */
    background-repeat: no-repeat;
    background-position: center;
}
</style>
<div id="home-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
                        <?php
                            foreach($son_dakika as $key=>$raw){
                                echo '<li data-target="#home-carousel" data-slide-to="'.$key.'" class="active">
                                        <span class="catagory">';
                                        foreach($raw['categories'] as $cat_raw){
                                            echo $cat_raw.', ';
                                        }
                                echo '</span>
                                        <span class="indicators-title">'.$raw['title'].'</span>
                                    </li>';
                            }
                        ?>
						</ol>
                    
						<div class="carousel-inner" role="listbox">
                            <?php
                                foreach($son_dakika as $key=>$raw){
                            ?>
							<div class="item carousel-item <?php if($key===0){echo 'active';} ?>">
								<div class="item-content">
									<div class="item-image-content" data-animation="animated slideInLeft">
										<div class="item-image">
                                            <a href="/<?php echo $raw['seo_link']; ?>">
                                                <img style="width: 100%;" src="<?php echo $raw['image']; ?>" />
                                            </a>
                                        </div>
									</div>
									<div class="post-content" data-animation="animated fadeInDown">
                                        <span class="catagory" data-animation="animated fadeInDown">
                                                <?php 
                                                    foreach($raw['categories'] as $cat_raw){
                                                        echo '<a href="'.seolinkCat($cat_raw).'">'.$cat_raw.'</a>, ';
                                                    }
                                                ?>
                                        </span>
										<h2 class="entry-title animated fadeInDwn" data-animation="animated fadeInDwn">
											<a href="/<?php echo $raw['seo_link']; ?>"><?php echo $raw['title']; ?></a>
										</h2>
										<div class="entry-meta animated fadeInDwn" data-animation="animated fadeInDwn">
											<ul>
												<li><span style="color: black; font-weight: bold;">Kaynak;</span> <a style="color: black" href="#"><?php echo $raw['agency_title']; ?></a></li>
												<li><a href="#"> <?php echo $raw['date']; ?></a></li>
											</ul>
										</div>
										<p style="color: black" data-animation="animated fadeInUp" class=""><?php echo mb_substr($raw['spot'], 0, 120); ?></p>
										<div class="read-more animated fadeInUp" data-animation="animated fadeInUp">
											<div class="continue-reading pull-left">
												<a style="color: black;" href="/<?php echo $raw['seo_link']; ?>">Devamını oku <i class="fa fa-angle-right"></i></a>
											</div>
											<div class="feed pull-right">
												<ul>
													<li>Paylaş</li>
													<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://ulak.news/<?php echo $raw['seo_link']; ?>&t=<?php echo $raw['title']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
													<li><a target="_blank" href="https://twitter.com/share?url=https://ulak.news/<?php echo $raw['seo_link']; ?>&via=ulak_news&text=<?php echo $raw['title']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
												</ul>	
											</div>
										</div>
									</div><!-- /.post-content -->
								</div><!-- /.item-content -->
							</div><!-- /.item -->
                            <?php
                                }
                            ?>
</div><!-- /.carousel-inner -->
</div><!-- /#home-carousel -->	