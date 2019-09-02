<?php
/* Get Latest Available MySQl Version */
  //http://dev.mysql.com/downloads/mysql/5.6.html --> <h1>MySQL Community Server 5.6.29 </h1>
  $filename="./raw/db_mysql_56.txt";
  $html=file_get_contents($filename);
  $pregmatchhtml=preg_match_all("/<h1>MySQL Community Server (.*?) <\/h1>/ms", $html, $match);
  $WebDevServVerarr['DB']['MYSQL']['V56_LATEST']=$match[1][0];
  //sleep(1);
  //http://dev.mysql.com/downloads/windows/installer/5.7.html --> <h1>MySQL Installer 5.7.11 </h1>
  $filename="./raw/db_mysql_57.txt";
  $html=file_get_contents($filename);
  $pregmatchhtml=preg_match_all("/<h1>MySQL Community Server (.*?) <\/h1>/ms", $html, $match);
  $WebDevServVerarr['DB']['MYSQL']['V57_LATEST']=$match[1][0];
  //sleep(1);
  //http://dev.mysql.com/downloads/windows/installer/8.0.html --> <h1>MySQL Installer 8.0.11 </h1>
  $filename="./raw/db_mysql_80.txt";
  $html=file_get_contents($filename);
  $pregmatchhtml=preg_match_all("/<h1>MySQL Community Server (.*?) <\/h1>/ms", $html, $match);
  $WebDevServVerarr['DB']['MYSQL']['V80_LATEST']=$match[1][0];

/* Get Latest Available MariaDB Version */
  //https://downloads.mariadb.org/ --> Download 10.3.8 Stable Now
  $filename="./raw/db_mysql_mariadb.txt";
  $html=file_get_contents($filename);
  $pregmatchhtml=preg_match_all("/Download (.*?) Stable Now/ms", $html, $match);
  $WebDevServVerarr['DB']['MARIADB']['LATEST']=$match[1][0];

?>
