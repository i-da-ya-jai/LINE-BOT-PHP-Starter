<?php
$access_token = 'zy+itVvtiD51ivko2CTeYQaEUni7IODa+68p2zE6NV+TDXGrbAkekjAvhckFCxAhPeHFrpWRZpiXVub2ni2nGOyckY2FcqH3woD5msPRY4RYhWxH2WbASa6qeqKuC8zeRh6/vCeJS5GqGVTE1AxmLgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
