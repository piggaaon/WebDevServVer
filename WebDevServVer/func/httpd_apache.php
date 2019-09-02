<?php
/* Get Latest  Available Apache Version */
  //https://www.apachelounge.com/download/VC11/ --> bold">Apache 2.4.18 Win64
  $filename="./raw/httpd_win_vc11.txt";
  $html=file_get_contents($filename);
  $pregmatchhtml=preg_match_all("/bold\">Apache (.*?) Win64/ms", $html, $match);
  $WebDevServVerarr['HTTPD']['APACHE']['VC11_LATEST']=$match[1][0];

  //sleep(2);
  //https://www.apachelounge.com/download/VC14/ --> bold">Apache 2.4.18 Win64
  $filename="./raw/httpd_win_vc14.txt";
  $html=file_get_contents($filename);
  $pregmatchhtml=preg_match_all("/bold\">Apache (.*?) Win64/ms", $html, $match);
  $WebDevServVerarr['HTTPD']['APACHE']['VC14_LATEST']=$match[1][0];

  //sleep(2);
  //https://www.apachelounge.com/download/ --> bold">Apache 2.4.18 Win64
  $filename="./raw/httpd_win_vc15.txt";
  $html=file_get_contents($filename);
  $pregmatchhtml=preg_match_all("/bold\">Apache (.*?) Win64/ms", $html, $match);
  $WebDevServVerarr['HTTPD']['APACHE']['VC15_LATEST']=$match[1][0];
  
  //sleep(2);
  //https://www.apachelounge.com/download/ --> bold">Apache 2.4.18 Win64
  $filename="./raw/httpd_win_vs16.txt";
  $html=file_get_contents($filename);
  $pregmatchhtml=preg_match_all("/bold\">Apache (.*?) Win64/ms", $html, $match);
  $WebDevServVerarr['HTTPD']['APACHE']['VS16_LATEST']=$match[1][0];
?>
