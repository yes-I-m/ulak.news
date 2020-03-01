<?php

    header('Content-Type: application/json');
    include("./config.php");

	$ulak_api_class = new UlakNews();


    $main_response = array(
        "status"=> false,
        "desc" => "",
        "result" => []
    );

    if(isset($_GET['process'])){

        if($_GET['process']==="addComment"){
            if(isset($_POST['name']) && isset($_POST['text']) && isset($_POST['agency']) && isset($_POST['id'])){
                if(strlen($_POST['name']) >= 3 && strlen($_POST['text']) >= 5){
                    $name = strip_tags($_POST['name']);
                    $text = strip_tags($_POST['text']);
                    $agency = strip_tags($_POST['agency']);
                    $id = strip_tags($_POST['id']);
                    
                    $comment_add = 	$ulak_api_class->add_comment($agency, $id, $name, $text);
                    if($comment_add){
                        $main_response['status'] = true;
                        $main_response['desc'] = "Yorum eklendi.";
                    }else{
                        $main_response['desc'] = "Yorum Eklenemedi.";
                    }
                }else{
                    $main_response['desc'] = "Adınız veya yorumunuz kısa.";
                }
            }else{
                $main_response['desc'] = "Parametre eksik";
            }

            
        }

        if($_GET['process']==="getComments"){

            $comment_get = 	$ulak_api_class->get_comments($_GET['agency'], $_GET['id']);
            if($comment_get['status']){
                $main_response['status'] = true;
                $main_response['result'] = $comment_get['result'];
            }else{
                $main_response['desc'] = "Yorumlar alınamadı...";
            }
        }

    }else{
        $main_response['desc'] = "İşlem yok.";
    }

    echo json_encode($main_response);
?>