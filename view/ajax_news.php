<?php
include("../funcs.php");
if(isset($_GET['agency'])){
    $agency=$_GET['agency'];
    $all_news=get_news($agency);
    if($all_news['status']){
        $all_news=$all_news['result'];
    }else{
        echo "Şimdilik Haber yok :)";
        $all_news=[];
    }
    include("main_news.php");
}else{
    echo "Şimdilik Haber yok :)";
}

?>