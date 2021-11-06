<?php
function isMobile() {
    return preg_match('/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|upbrowser|uplink|webos|wos)/i', $_SERVER['HTTP_USER_AGENT']);
}
function ayat($str)
{
    return preg_replace("/\w*?$ٱللَّهِ\w*/i", "<red>$0</red>", $str);
}
function hanyaangka($string)
{
    return preg_replace('/[^0-9]/', '', $string);
}
function surat($id)
{
    $url = 'http://arini.website/alquran/assets/data/' . $id . '.json';
    $ch = curl_init();
    $headers = array(
        'Accept: application/json',
        'Content-Type: application/json'
    );
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, '3');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    /* penting karena pake https */
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    $content = trim(curl_exec($ch));
    curl_close($ch);
    return $content;
}
function get_the_current_url() {
    $protocol = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $base_url = $protocol . "://" . $_SERVER['HTTP_HOST'];
    $complete_url =   $base_url . $_SERVER["REQUEST_URI"];
    return $complete_url;
}