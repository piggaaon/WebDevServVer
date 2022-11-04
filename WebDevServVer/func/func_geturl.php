<?php
/* Function to get Webpage/File with Version Information */
function geturl($url){
  $ch=curl_init();
  curl_setopt($ch, CURLOPT_URL,$url);
  curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); //https://stackoverflow.com/questions/56865217/php-curl-error-http-2-stream-0-was-not-closed-cleanly-protocol-error-err-1
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  $ip=rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $ip", "HTTP_X_FORWARDED_FOR: $ip"));
  /* https://www.whatismybrowser.com/guides/the-latest-user-agent/firefox */
  curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:106.0) Gecko/20100101 Firefox/106.0 ');
  $html=curl_exec($ch);
  if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
  }
  curl_close($ch);
  return $html;
}
?>
