<?php
/* Get Latest  Available MySQl Version */
  //http://dev.mysql.com/downloads/mysql/5.6.html --> <h1>MySQL Community Server 5.6.29 </h1>
  $filename="./raw/db_mysql_56.txt";
  $html=file_get_contents($filename);
  $pregmatchhtml=preg_match_all("/<h1>MySQL Community Server (.*?) <\/h1>/ms", $html, $match);
  $mysql56latever=$match[1][0];
  $mysql56dwx86="https://dev.mysql.com/get/Downloads/MySQL-5.6/mysql-$mysql56latever-win32.zip";
  $mysql56dwx64="https://dev.mysql.com/get/Downloads/MySQL-5.6/mysql-$mysql56latever-winx64.zip";
  //echo "&nbsp;Rertieved Latest MySQL Version: $mysql56dwx86 (x86) and $mysql56dwx64 (x64)<br />";
  //sleep(1);
  //http://dev.mysql.com/downloads/windows/installer/5.7.html --> <h1>MySQL Installer 5.7.11 </h1>
  $filename="./raw/db_mysql_57.txt";
  $html=file_get_contents($filename);
  $pregmatchhtml=preg_match_all("/<h1>MySQL Community Server (.*?) <\/h1>/ms", $html, $match);
  $mysql57latever=$match[1][0];
  $mysql57dwx86="https://dev.mysql.com/get/Downloads/MySQL-5.7/mysql-$mysql57latever-win32.zip";
  $mysql57dwx64="https://dev.mysql.com/get/Downloads/MySQL-5.7/mysql-$mysql57latever-winx64.zip";
  //echo "&nbsp;Rertieved Latest MySQL Version: $mysql57dwx86 (x86) and $mysql57dwx64 (x64)<br />";
  //sleep(1);
  //http://dev.mysql.com/downloads/windows/installer/8.0.html --> <h1>MySQL Installer 8.0.11 </h1>
  $filename="./raw/db_mysql_80.txt";
  $html=file_get_contents($filename);
  $pregmatchhtml=preg_match_all("/<h1>MySQL Community Server (.*?) <\/h1>/ms", $html, $match);
  $mysql80latever=$match[1][0];
  $mysql80dwx86="https://dev.mysql.com/get/Downloads/MySQL-8.0/mysql-$mysql80latever-win32.zip";
  $mysql80dwx64="https://dev.mysql.com/get/Downloads/MySQL-8.0/mysql-$mysql80latever-winx64.zip";
  //echo "&nbsp;Rertieved Latest MySQL Version: $mysql80dwx86 (x86) and $mysql80dwx64 (x64)<br />";

/* Get Latest  Available MariaDB Version */
  //https://downloads.mariadb.org/ --> Download 10.3.8 Stable Now
  $filename="./raw/db_mysql_mariadb.txt";
  $html=file_get_contents($filename);
  $pregmatchhtml=preg_match_all("/Download (.*?) Stable Now/ms", $html, $match);
  $mariadblatever=$match[1][0];
  $mariadbdwx86="https://downloads.mariadb.org/interstitial/mariadb-$mariadblatever/win32-packages/mariadb-$mariadblatever-win32.zip/from/http%3A//nyc2.mirrors.digitalocean.com/mariadb/";
  $mariadbdwx64="https://downloads.mariadb.org/interstitial/mariadb-$mariadblatever/winx64-packages/mariadb-$mariadblatever-winx64.zip/from/http%3A//nyc2.mirrors.digitalocean.com/mariadb/";
  //echo "&nbsp;Rertieved Latest MySQL Version: $mariadbdwx86 (x86) and $mariadbdwx64 (x64)<br />";
?>
