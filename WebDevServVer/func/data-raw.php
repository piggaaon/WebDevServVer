<?php
/* Get Raw Version Data, Store Local */
  /* Get Raw Available Apache Version */
    $apachebld=array("VC11","VC14","VC15","VS16");
    foreach ($apachebld as $itembld){
      if($itembld=="VS16"){
        $url=$WebDevServVerarr['DATA_URL']['APACHE_URL'];
      }else{
        $url=$WebDevServVerarr['DATA_URL']['APACHE_URL']."/".$itembld."/";
      }
      $html=geturl($url);
      $filename="./raw/httpd_win_".strtolower($itembld).".txt";
      writefile($html,$filename);
    }
    /* Get Raw Available OpenSSL Version bundled with Apache  */
      //<a href="/viewtopic.php?p=41289"><b>Info & Changelog</b></a></center>
      //preg_match_all('/<a href="(.*?)"><b>Info/', $input_lines, $output_array);
      foreach ($apachebld as $itembld){
      $filename="./raw/httpd_win_".strtolower($itembld).".txt";
      $html=file_get_contents($filename);
      $pregmatchhtml=preg_match_all('/<a href="(.*?)"><b>Info/', $html, $match);
      $url="https://www.apachelounge.com".$match[1][0];
      $html=geturl($url);
      $filename="./raw/httpd_win_".strtolower($itembld)."_dets.txt";
      writefile($html,$filename);
    }

  /* Get phpinfo */
    ob_start();
    phpinfo(INFO_GENERAL);
    $html = ob_get_contents();
    ob_get_clean();
    $filename="./raw/phpinfo.txt";
    writefile($html,$filename);

  /* Get Latest Available MySQl Version */
    //http://dev.mysql.com/downloads/mysql/5.7.html
    $url=$WebDevServVerarr['DATA_URL']['MYSQL57_URL'];
    $html=geturl($url);
    $filename="./raw/db_mysql_57.txt";
    writefile($html,$filename);
    //sleep(1);
    //http://dev.mysql.com/downloads/mysql/8.0.html
    $url=$WebDevServVerarr['DATA_URL']['MYSQL80_URL'];
    $html=geturl($url);
    $filename="./raw/db_mysql_80.txt";
    writefile($html,$filename);

  /* Get Latest Available MariaDB Version */
    //https://mariadb.com/downloads/
    $url=$WebDevServVerarr['DATA_URL']['MARIADB_URL'];
    $html=geturl($url);
    $filename="./raw/db_mariadb.txt";
    writefile($html,$filename);

  /* Get Latest Available PHP Version */
    //https://windows.php.net/downloads/releases/sha256sum.txt
    $url=$WebDevServVerarr['DATA_URL']['PHP_URL_VERSION'];
    $html=geturl($url);
    $filename="./raw/scrtlang_php.txt";
    writefile($html,$filename);

  /* Get Latest Available PHPMyAdmin Version */
    $url=$WebDevServVerarr['DATA_URL']['PMA_URL'];
    $html=geturl($url);
    //$html=json_decode($json, true);
    $filename="./raw/db_admin_pma.txt";
    writefile($html,$filename);
?>
