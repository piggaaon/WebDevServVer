<?php
/* Get Raw Version Data, Store Local */
  /* Get Raw Available Apache Version */
    //http://www.apachelounge.com/download/VC11/
    $url=$WebDevServVerarr['DATA_URL']['APACHEVC11_URL'];
    $html=geturl($url);
    $filename="./raw/httpd_win_vc11.txt";
    writefile($html,$filename);
    //sleep(2);
    //http://www.apachelounge.com/download/VC14/
    $url=$WebDevServVerarr['DATA_URL']['APACHEVC14_URL'];
    $html=geturl($url);
    $filename="./raw/httpd_win_vc14.txt";
    writefile($html,$filename);
    //sleep(2);
    //http://www.apachelounge.com/download/VC15/
    $url=$WebDevServVerarr['DATA_URL']['APACHEVC15_URL'];
    $html=geturl($url);
    $filename="./raw/httpd_win_vc15.txt";
    writefile($html,$filename);
    //sleep(2);
    //http://www.apachelounge.com/download/
    $url=$WebDevServVerarr['DATA_URL']['APACHEVS16_URL'];
    $html=geturl($url);
    $filename="./raw/httpd_win_vs16.txt";
    writefile($html,$filename);
  /* Get VC Version used to Compiled Apache */
    ob_start();
    phpinfo(INFO_GENERAL);
    $html = ob_get_contents();
    ob_get_clean();
    $filename="./raw/phpinfo.txt";
    writefile($html,$filename);

  /* Get Latest  Available MySQl Version */
    //http://dev.mysql.com/downloads/mysql/5.6.html
    $url=$WebDevServVerarr['DATA_URL']['MYSQL56_URL'];
    $html=geturl($url);
    $filename="./raw/db_mysql_56.txt";
    writefile($html,$filename);
    //sleep(1);
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

  /* Get Latest  Available MariaDB Version */
    //https://downloads.mariadb.org/
    $url=$WebDevServVerarr['DATA_URL']['MARIADB_URL'];
    $html=geturl($url);
    $filename="./raw/db_mysql_mariadb.txt";
    writefile($html,$filename);

  /* Get Latest  Available PHP Version */
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
