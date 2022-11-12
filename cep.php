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

function getStr($string,$start,$end){
$str = explode($start,$string);
$str = explode($end,$str[1]);
return $str[0];}

{
$separador = "|";
$e = explode("\r\n", $lista);
$c = count($e);
for ($i=0; $i < $c; $i++) { 
$explode = explode($separador, $e[$i]);
Testar(trim($explode[0]),trim($explode[1]));}}

function Testar($email,$senha){
if (file_exists(getcwd()."/cookies.txt")) {
unlink(getcwd()."/cookies.txt");}

$time = time();


//===================================================================================================================================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://viacep.com.br/ws/'.$email.'/json/');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'Host: viacep.com.br',
'Accept-Encoding: gzip, deflate, br',
'Acept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$data1 = curl_exec($ch);
//===================================================================================================================================================//

//================================================//  
$cep = getStr($data1, '"cep": "', '"');
$estado = getStr($data1, '"uf": "', '"');
$cidade = getStr($data1, '"localidade": "', '"');
$ende = getStr($data1, '"logradouro": "', '"');
$bairro = getStr($data1, '"bairro": "', '"');
$ddd = getStr($data1, '"ddd": "', '"');
//================================================//  


if (strpos($data1, '"cep"')!== false) {
exit('<span class="badge badge-success">Consulta realizada com sucesso!</span> ➜ Cep: '.$cep.' / Cidade: '.$cidade.' ('.$estado.') / Endereço: '.$ende.' - Bairro: '.$bairro.' (DDD: '.$ddd.')</font></b><br>');}

}
?>