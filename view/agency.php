            <section class="main-highlight">
			
            </section>
            <section class="main-content">
                <div class="main-content-wrapper">
                    <div class="content-body">
                        <div class="author-wrapper">
                            <div class="author-image">
                                <img alt="<?php echo $agency_data['title']; ?>" src="<?php echo $agency_data['image']; ?>" width="100" height="100">
                            </div>
                            <h2 class="author-name"><?php echo $agency_data['title']; ?></h2>
                            <p><?php echo $agency_data['about']; ?></p>
                            <div class="author-meta">
                                <span>Website : </span><a target="_blank" href="<?php echo $agency_data['website']; ?>"><?php echo $agency_data['website']; ?></a>
                                <!-- &nbsp;&nbsp;&nbsp;<span>Posts : 57</span> -->
                            </div>
                        </div>
                        <div class="content-timeline">
                            <!--Timeline header area start -->
                            <div class="post-list-header">
                                <span class="post-list-title"><?php echo $agency_data['title'] ?>'den <i>Ulak</i> ile haberler</span>
                            </div>
                            <!--Timeline header area end -->
    
    
                            <!--Timeline items start -->
                            <div class="timeline-items">
                                <span class="timeline-items-desc"></span>
                                <?php include("./view/timeline_other.php"); ?>
                            </div>
                            <!--Timeline items end -->
    
                            <!--Data load more button start  -->
                            <!-- <div class="load-more">
                                <button class="load-more-button material-button" type="button">
                                    <i class="material-icons">&#xE5D5;</i>
                                    <span>Load More</span>
                                </button>
                            </div> -->
                            <!--Data load more button start  -->
                        </div>
    
                    </div>
                    <div class="content-sidebar">
                        <div class="sidebar_inner">
                            <?php include("./view/most-read.php"); ?>
                            <div class="seperator"></div>
                            <!-- 
                            <a href="#" class="widget-ad-box">
                                <img src="img/adbox300x250.png" width="300" height="250">
                            </a> -->
                        </div>
                    </div>
                </div>
            </section>