                            <div style="margin-left: auto; margin-right: auto" class="tr-widget tr-widget">
								<div class="widget-title">
									<span style="text-align: center; font-size: 18px;">En çok okunanlar</span>
								</div>
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation"><a class="active" href="#today" data-toggle="tab"><i class="fa fa-calendar"></i>Bugünün</a></li>
									<li role="presentation"><a href="#week" data-toggle="tab"><i class="fa fa-calendar"></i>Haftanın</a></li>
									<li role="presentation"><a href="#month" data-toggle="tab"><i class="fa fa-calendar"></i>Aylık</a></li>
								</ul>
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active fade in show" id="today">
										<ul class="medium-post-list">
											<?php 
												foreach($mostRead_today as $raw){
											?>
											<li class="tr-post">
                                                <div class="entry-header">
                                                    <div class="entry-thumbnail">
                                                        <a href="<?php echo $raw['seo_link']; ?>"><img class="img-fluid" src="<?php echo $raw['image']; ?>" alt="<?php echo $raw['title']; ?>"></a>
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
									</div>
									<div role="tabpanel" class="tab-pane fade in" id="week">
										<ul class="medium-post-list">
											<?php 
												foreach($mostRead_week as $raw){
											?>
											<li class="tr-post">
                                                <div class="entry-header">
                                                    <div class="entry-thumbnail">
                                                        <a href="<?php echo $raw['seo_link']; ?>"><img class="img-fluid" src="<?php echo $raw['image']; ?>" alt="<?php echo $raw['title']; ?>"></a>
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
                                    </div>
                                    <div role="tabpanel" class="tab-pane active fade in show" id="month">
										<ul class="medium-post-list">
                                            <?php 
												foreach($mostRead_month as $raw){
											?>
											<li class="tr-post">
                                                <div class="entry-header">
                                                    <div class="entry-thumbnail">
                                                        <a href="<?php echo $raw['seo_link']; ?>"><img class="img-fluid" src="<?php echo $raw['image']; ?>" alt="<?php echo $raw['title']; ?>"></a>
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
									</div>
								</div>
							</div><!-- meta-tab -->