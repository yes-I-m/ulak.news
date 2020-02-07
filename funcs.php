<?php
date_default_timezone_set('Europe/Istanbul');

	$new_status=false;
    $noindex=false;
    $cat_status=false;
    $agency_status=false;
    $search_status=false;
    $is_local=false;
    $host=Sanitizer::url($_SERVER['HTTP_HOST']);
    $version="2.7.4";
    $search = false;
include("env.php");

if($host===$_ENV['local1'] || $host===$_ENV['local2']){
    $is_local=true;
}

function getUserIP(){
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


class Sanitizer {
    /**
    * @param str => $email = email a ser sanitizado
    */
    public static function email($email){
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    /**
    * @param str => $valor = valor a ser sanitizado
    * @param bol => $allow_accents = permitir acentos
    * @param bol => $allow_spaces = permitir espaços
    */
    public static function alfabetico($valor, bool $allow_accents = true, bool $allow_spaces = false){
        $valor = str_replace(array('"', "'", '`', '´', '¨'), '', trim($valor));
        if(!$allow_accents && !$allow_spaces){
            return preg_replace('#[^A-Za-z]#', '', $valor);
        }
        if($allow_accents && !$allow_spaces){
            return preg_replace('#[^A-Za-zà-źÀ-Ź]#', '', $valor);
        }
        if(!$allow_accents && $allow_spaces){
            return preg_replace('#[^A-Za-z ]#', '', $valor);
        }
        if($allow_accents && $allow_spaces){
            return preg_replace('#[^A-Za-zà-źÀ-Ź ]#', '', $valor);
        }                
    }

    /**
    * @param str => $valor = valor a ser sanitizado
    */
    public static function toCat($valor){
        return preg_replace('#[^A-Za-zà-źÀ-Ź ]#', ' ', $valor);
    }

    /**
    * @param str => $valor = valor a ser sanitizado
    */
    public static function alfanumerico($valor, bool $allow_accents = true, bool $allow_spaces = false){
        $valor = str_replace(array('"', "'", '`', '´', '¨'), '', trim($valor));
        if(!$allow_accents && !$allow_spaces){
            return preg_replace('#[^A-Za-z0-9]#', '', $valor);
        }
        if($allow_accents && !$allow_spaces){
            return preg_replace('#[^A-Za-zà-źÀ-Ź0-9]#', '', $valor);
        }
        if(!$allow_accents && $allow_spaces){
            return preg_replace('#[^A-Za-z0-9 ]#', '', $valor);
        }
        if($allow_accents && $allow_spaces){
            return preg_replace('#[^A-Za-zà-źÀ-Ź0-9 ]#', '', $valor);
        }
    }

    /**
    * @param str => $valor = valor a ser sanitizado
    */
    public static function numerico($valor){
        return (int)preg_replace('/\D/', '', $valor);
    }

    /**
    * @param str => $valor = valor a ser sanitizado
    */
    public static function integer($valor){
        return (int)$valor;
    }

    /**
    * @param str => $valor = valor a ser sanitizado
    */
    public static function float($valor){
        return (float)$valor;
    }

    /**
    * @param str => $valor = valor a ser sanitizado
    */
    public static function money($valor){
        $valor = preg_replace('/\D/', '', $valor);
        if(strlen($valor) < 3){
            $valor = substr($valor, 0, strlen($valor)).'.00';
            return (float)$valor; 
        }
        if(strlen($valor) > 2){
            $valor = substr($valor, 0, (strlen($valor)-2)).'.'.substr($valor, (strlen($valor)-2));
            return (float)$valor; 
        }
    }

    /**
    * @param str => $valor = valor a ser sanitizado
    */
    public static function url($valor){
        $valor = strip_tags(str_replace(array('"', "'", '`', '´', '¨'), '', trim($valor)));
        return filter_var($valor, FILTER_SANITIZE_URL);
    }
}

function random_color(){
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
   return '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
}

function curl_funcs($url, $timeout=4000){
        $error=null;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:'.$_ENV["curl-auth-token"]
        ));
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, $timeout);
        // curl_setopt($ch,CURLOPT_HEADER, false); 
        $data=curl_exec($ch);
        $output=json_decode($data, true);
        $info = curl_getinfo($ch);
        if($info===false){
            $error=curl_error($ch);
        }
        curl_close($ch);
        if($info['http_code']!==200){
            return array("status"=>false, "result"=>$error);
        }
        return array("status"=>true, "result"=>$output);
}

function get_categories($limit=6){
    $curl=curl_funcs("https://nodejs-api.ulak.news/categories?limit=$limit");
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result'];
        }
    }
    return [];
}

function get_news($agency, $limit=60, $start=0){
    $curl=curl_funcs("https://nodejs-api.ulak.news/news/$agency?limit=$limit");
    if($agency==="all"){
        $curl=curl_funcs("https://nodejs-api.ulak.news/news?limit=$limit");
    }
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result'];
        }
    }
    return array("status"=>false, "result"=>[]);
}

function get_new($agency, $id){
    $curl=curl_funcs("https://nodejs-api.ulak.news/news/$agency/$id");
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result'];
        }
    }
    return [];
}

function get_agency_list(){
    $curl=curl_funcs("https://nodejs-api.ulak.news/agencies");
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result'];
        }
    }
    return [];
}

function getSearchResult($arg){
    $arg = urlencode($arg);
    $curl=curl_funcs("https://nodejs-api.ulak.news/search?q=$arg");
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result'];
        }
    }
    return [];
}

function getMostReaded($filter="all", $limit=5, $agency="all"){
    $filter=Sanitizer::alfabetico($filter);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://nodejs-api.ulak.news/most_read?limit=$limit");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization:'.$_ENV["curl-auth-token"],
        "content-type: application/json"
    ));
    if($filter==="month"){
        $gte = mktime(0, 0, 0, date("n"), 1);
        $lte = mktime(23, 59, 59, date("n"), date("t"));
    }elseif($filter==="week"){
        $strtotime = date("o-\WW");
        $gte = strtotime($strtotime);
        $lte = strtotime("+6 days 23:59:59", $gte);
    }else{
        $gte = strtotime("today", time());
        $lte   = strtotime("tomorrow", $gte) - 1;
    }

    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n\t\"gte\": $gte,\n\t\"lte\": $lte,\n\t\"agency\": \"$agency\"\n}");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = json_decode(curl_exec($ch), true);
    curl_close ($ch);
    if($server_output['status']){
            return $server_output['result'];
    }
    return [];
}

function get_cat_news($arg, $limit=50){
    $arg=Sanitizer::alfabetico($arg, true, true);
    $arg=base64_encode($arg);
    $curl=curl_funcs("https://nodejs-api.ulak.news/category/$arg?limit=$limit");
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result'];
        }
    }
    return [];
}

function getStats(){
    $curl=curl_funcs("https://api.ulak.news/?process=stats");
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result'];
        }
    }
    return [];
}

function lastSearch($limit=5){
    $curl=curl_funcs("https://nodejs-api.ulak.news/last_searches?limit=$limit");
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result']['result'];
        }
    }
    return [];
}

function addComment($agency, $id, $name, $message){
    $id=(int)$id;
    $ip=getUserIP();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://api.ulak.news/?process=saveComment");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Site: '.$_ENV["curl-auth-web"],
        'X-Site-Token: '.$_ENV["curl-auth-token"]
    ));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
                "toAgency=$agency&toId=$id&text=$message&name=$name&ip=$ip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = json_decode(curl_exec($ch), true);
    curl_close ($ch);
    if($server_output['status']){
        return true;
    }
    return false;
}

function getComments($agency, $id){
    $data=curl_funcs("http://127.0.0.1:5001/comments/$agency/$id/get");
    if($data['status']){
        if(count($data['result']['result'])>=1){
            return $data['result']['result'];
        }else{
            return [];
        }
    }
    return [];
}

function getCurrency(){
    $curl=curl_funcs("https://api.orhanaydogdu.com.tr/exchange/liveCurrency.php");
    if($curl['status']){
        return $curl['result'];
    }
    return [];
}

function seolinkCat($s){
    $s=Sanitizer::alfabetico($s, true, true);
    $s=base64_encode($s);
    // $s  = html_entity_decode($s);
    // $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',', "'", "!",'’','#',"'",'&039;','"','“','.','…','?');
    // $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','','','','','','','','','','','','');
    // $s = str_replace($tr,$eng,$s);
    // $s = strtolower($s);
    // $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
    // $s = preg_replace('/\s+/', '-', $s);
    // $s = preg_replace('|-+|', '-', $s);
    // $s = preg_replace('/#/', '', $s);
    // $s = str_replace('.', '', $s);
    // $s = trim($s, '-');
    // $s = substr($s, 0, 32);
    return "kategori.html?kategori=".$s;
}
?>