<?php

function angkarand($panjang)
{
    $karakter= '1234567890';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
}

$nama = explode(" ", nama());
$nama1 = $nama[0];
$nama2 = $nama[1];
$namalengkap = "$nama1$nama2";
$domain = "@smilevxer.com";
$rand = angkarand(5);
$email = "$namalengkap$rand$domain";

//CREATE EMAIL
$c = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://generator.email/check_adres_validation3.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'usr='.$email,
  CURLOPT_HTTPHEADER => array(
    'cookie: surl='.$domain.'/'.$namalengkap
  ),
));
$response = curl_exec($curl);
curl_close($curl);

//CEK EMAIL
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://generator.email/inbox8/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'cookie: surl='.$domain.'/'.$namalengkap
  ),
));
$response = curl_exec($curl);
curl_close($curl);
preg_match_all('!<p style="color: #fa7800; font-weight: bold; text-align: center; font-size: 40px">(.*?)</p>!', $response, $matches);
var_dump($matches);