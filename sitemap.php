<?php

header ("Content-Type:text/xml");
if(isset($_GET['page'])){

    ///// CACHE //////////
    require_once "sCache.php";
    $options = array(
        'time'   => 60*60*24, // 60 saniye
        'dir'    => 'cache/', // sCache2 klasörü oluşturup buraya yazılsın.
        'load'   => false,  // sayfamızın sonunda load değerimiz görünsün.
        'extension' => ".xml", // standart değer .html olarak ayarlanmıştır cache dosyalarınızın uzantısını temsil etmektedir.
        );
    
    $sCache = new sCache($options); // ayarları sınıfımıza gönderip sınıfı çalıştıralım.
///// CACHE BITIS /////

    $page = preg_replace('/\D/', '', $_GET['page']);
    $data = file_get_contents("https://nodejs-api.ulak.news/sitemap_$page.xml");
    echo $data;
}
?>