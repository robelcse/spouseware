<?php
$handle = curl_init();

$url = "https://api.currencyfreaks.com/latest?apikey=e83540855f804cf19cb74f97483888fb";

// Set the url
curl_setopt($handle, CURLOPT_URL, $url);
// Set the result output to be a string.
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($handle);
curl_close($handle);
$arr= json_decode($output, true);
// print_r($arr['rates']['USD']);
// print_r($arr['rates']['CNY']);
// echo "<pre>";
$usdTOyuan= $arr['rates']['USD']*$arr['rates']['CNY'];
// echo $usdTOyuan*300;
// echo "</pre>";

