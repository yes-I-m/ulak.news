<?php

header ("Content-Type:text/xml");
if(isset($_GET['cat'])){

///// CACHE BITIS /////
    $page = $_GET['cat'];
    switch ($page) {
        case 'gundem':
            $cat = "Gündem";
            break;        
        case 'ekonomi':
            $cat = "Ekonomi";
            break;
        case 'siyaset':
            $cat = "Siyaset";
            break;        
        case 'turkiye':
            $cat = "Türkiye";
            break;
        case 'dunya':
            $cat = "Dünya";
            break;
        default:
            $cat = null;
            break;
    }
    if($cat==null){
        echo "";
        exit();
    }
    $data = file_get_contents($_ENV['local3']."/sitemapnews_". urlencode($cat).".xml");
    echo $data;
}
?>