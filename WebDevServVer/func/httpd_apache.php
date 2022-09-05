<?php
/* Get Latest Available Apache Version */
  $apachebld=array("VC11","VC14","VC15","VS16");
  foreach ($apachebld as $itembld){
    $filename="./raw/httpd_win_".strtolower($itembld).".txt";
    $html=file_get_contents($filename);
    $pregmatchhtml=preg_match_all("/bold\">Apache (.*?) Win64/ms", $html, $match);
    $itembldar=$itembld."_LATEST";
    $WebDevServVerarr['HTTPD']['APACHE'][$itembldar]=$match[1][0];
  }
  /* Get Raw Available OpenSSL Version bundled with Apache  */
  $apachebld=array("VC11","VC14","VC15","VS16");
  foreach ($apachebld as $itembld){
    $filename="./raw/httpd_win_".strtolower($itembld)."_dets.txt";
    $html=file_get_contents($filename);
    $pregmatchhtml=preg_match_all('/openssl (.*?)\n/', $html, $match);
    $itemverarr=explode(",",$match[1][0]);
    if(count($itemverarr)<2){
      $itembldb=trim($itemverarr[0]);
    }else{
      $pos=strpos($itemverarr[1],"1.")-1;
      $itembldb=substr(trim($itemverarr[1]), $pos);
    }
    $itembldar=$itembld."_LATEST";
    $WebDevServVerarr['HTTPD']['OPENSSL'][$itembldar]=$itembldb;
  }
?>