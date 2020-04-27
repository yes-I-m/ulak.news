            <section class="main-highlight">
			
            </section>
            <section class="main-content">
                <div class="main-content-wrapper">
                    <div class="content-body">
                        <div class="content-timeline">
    
                            <!--Timeline items start -->
                            <div class="post-list-header">
                                <span class="post-list-title">Ajanslar</span>
                            </div>
                            <!--Timeline header area end -->


                            <div class="post-lists">
                                <?php
                                    foreach($agencies as $agency){
                                ?>
                                <div class="columns column-2">
                                    <div class="post-list-item">
                                        <div class="post-top">
                                            <img class="post-image" src="<?php echo $agency['image']; ?>">
                                            <h3 class="post-title">
                                                <a href="/<?php echo $agency['seo_link']; ?>"><span><?php echo $agency['title']; ?></span></a>
                                            </h3>
                                        </div>
                                        <div class="post-bottom">
                                            <div class="post-meta">
                                                <a href="/<?php echo $agency['seo_link']; ?>" class="read-more">Haberlerini Oku <i class="material-icons">&#xE315;</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
    
                    </div>
                    <div class="content-sidebar">
                        <div class="sidebar_inner">
                            <?php include("./view/most-read.php"); ?>
                            <div class="seperator"></div>
                        </div>
                    </div>
                </div>
            </section>