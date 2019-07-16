<?php
	$new_status=false;
    $noindex=false;
    $cat_status=false;
    $agency_status=false;
    $search_status=false;
include("env.php");

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

$is_local=false;
$host=Sanitizer::url($_SERVER['HTTP_HOST']);
if($host===$_ENV['local1'] || $host===$_ENV['local2']){
    $is_local=true;
}

function random_color(){
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
   return '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
}

function curl_funcs($url){
        $error=null;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-Site: '.$_ENV["curl-auth-web"],
            'X-Site-Token: '.$_ENV["curl-auth-token"]
        ));
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 15000);
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

function get_categories($limit=10){
    $curl=curl_funcs("https://api.ulak.news/?process=cats&limit=$limit");
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result'];
        }
    }
    return false;
}

function get_news($agency, $limit=60, $start=0){
    $curl=curl_funcs("https://api.ulak.news/?agency=$agency&limit=$limit&start=$start");
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result'];
        }
    }
    return array("status"=>false, "result"=>[]);
}

function get_new($agency, $id){
    $curl=curl_funcs("https://api.ulak.news/?agency=$agency&id=$id");
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result'];
        }
    }
    return false;
}

function get_agency_list(){
    $curl=curl_funcs("https://api.ulak.news/?agency=list");
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result'];
        }
    }
    return false;
}

function getSearchResult($arg){
    $curl=curl_funcs("https://api.ulak.news/?process=search&filter=$arg");
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result'];
        }
    }
    return false;
}

function getMostReaded($filter="all", $limit=10){
    $filter=Sanitizer::alfabetico($filter);
    $curl=curl_funcs("https://api.ulak.news/?process=mostRead&filter=$filter&limit=$limit");
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result'];
        }
    }
    return false;
}

function get_cat_news($arg, $limit=50){
    $arg=Sanitizer::alfabetico($arg, true, true);
    $curl=curl_funcs("https://api.ulak.news/?process=catNews&filter=$arg&limit=$limit");
    if($curl['status']){
        if($curl['result']['status']){
            return $curl['result'];
        }
    }
    return false;
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