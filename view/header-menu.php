<ul class="header-navigation" data-show-menu-on-mobile>
            <li>
                <!-- <div class="header-submenu">
                    <ul>
                        <li><a href="index.php">Home demo 1</a></li>
                        <li><a href="index2.php">Home demo 2</a></li>
                        <li><a href="index3.php">Home demo 3</a></li>
                        <li><a href="index4.php">Home demo 4</a></li>
                        <li><a href="index5.php">Home demo 5</a></li>
                        <li><a href="index6.php">Home demo 6</a></li>
                    </ul>
                </div> -->
            </li>
            <?php
                foreach($agencies as $agency){
            ?>
                <li>
                    <a title="<?php echo $agency['title']; ?>" href="/<?php echo $agency['seo_link']; ?>" class="material-button submenu-toggle"><?php echo $agency['title']; ?></a>
                
                </li>
            <?php
                }
                unset($agency)
            ?>
            <li>
                <a href="#" class="material-button submenu-toggle">Tüm Kategoriler <i class="material-icons">&#xE313;</i></a>
                <div class="header-submenu">
                    <ul>
                        <?php
                            foreach($all_cats as $key=>$cat){
                        ?>
                            <li><a title="<?php echo $cat['cat']; ?>" href="/<?php echo $cat['seo_link']; ?>"><?php echo $cat['cat']; ?></a></li>
                        <?php
                            if($key===6){
                                break;
                            }
                            }
                            unset($cat);
                        ?>
                        <li><a href="/kategori.html">Tüm kategoriler</a></li>
                    </ul>
                </div>
            </li>
        </ul>