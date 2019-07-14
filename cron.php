<?php
    set_time_limit(180);
    header('Content-Type: application/json; charset=utf-8');
    include("env.php");
    $opts = [
        "http" => [
            "method" => "GET",
            "header" =>
                'X-Site: '.$_ENV["curl-auth-web"]."\r\n".
                'X-Site-Token: '.$_ENV["curl-auth-token"]."\r\n"
        ]
    ];
    $context = stream_context_create($opts);

    function api_conn($url){
        global $context;
        return json_decode(file_get_contents($url, false, $context), true);
    }

    function get_news($agency, $limit=1000, $start=0){
        if($agency==="list"){
            $agency="all";
        }
        $curl=api_conn("https://api.ulak.news/?agency=$agency&limit=$limit&start=$start");
        if($curl['status']){
                return $curl['result'];
        }
        return false;
    }

    function get_new($agency, $id){
        $curl=api_conn("https://api.ulak.news/?agency=$agency&id=$id");
        if($curl['status']){
                return $curl;
        }
        return false;
    }
    $true=0;
    $false=0;
    $added=0;
    foreach(get_news("all") as $new){
       $go=get_new($new['agency'], $new['id']);
       if($go['status']){
            if($go['result']['read_times']===1){
                $added++;
            }
            $true++;
       }else{
            $false++;
       }
    };
    $result=array(
        "added"=>$added,
        "true"=>$true,
        "false"=>$false
    );
    echo json_encode($result);
?>