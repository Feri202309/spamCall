<?php

/* 
* Copyright © Rud Az 
* Dilarang keras ganti Copyright pembuat
* Hargai bila ingin dihargai
*/

echo "
\n
**************************************
*                                    *
* Facebook : fb.com/AW4NS            *
* Instagram : instagram.com/wan_f_s  *
*                                    *
**************************************
\n\n";

function spamCall($api, $nomer, $jumlah, $delay) {
  $url = "https://cellaxse.herokuapp.com/?key=". $api ."&target=". $nomer;
  $loop = 0;
  while ($loop < $jumlah) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($response, true);
    if ($res['status'] !== true) {
      echo "Key Salah! \n";
    } else {
      echo "Spam ke " . $loop + 1 . " berhasil dikirim! \n";
    }
    sleep($delay);
    $loop++;
  }
}

function limit($key) {}

echo "Masukan Nomor : ";
$nomor = trim(fgets(STDIN));
echo "\nMasukan Jumlah : ";
$jumlah = trim(fgets(STDIN));
echo "\nMasukan jeda : ";
$delay = trim(fgets(STDIN));
if (!$delay) {
  $delay = "30";
}
echo "\nMasukan Key : ";
$key = trim(fgets(STDIN));

spamCall($key, $nomor, $jumlah, $delay);