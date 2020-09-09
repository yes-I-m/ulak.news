            <section class="main-content">
                <div class="main-content-wrapper">
                    <div class="content-body">
                        <div class="content-timeline">
                            <!--Timeline header area start -->
                            <div class="post-list-header">
                                <h1><span class="post-list-title"><u><?php echo $cat_data['title']; ?></u></span> ile ilgili haberler</h1>
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