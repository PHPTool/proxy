<?php
$content = file_get_contents('php://input');
$header_joins = getallheaders();

function curl($url, $headers, $raw_data)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $_SERVER['REQUEST_METHOD']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $raw_data);
    curl_setopt($ch, CURLOPT_URL, $url);
    @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$DOMAIN = 'http://plus.test/';
$result = curl($DOMAIN . $_SERVER['REQUEST_URI'], $header_joins, $content);

echo $result;
