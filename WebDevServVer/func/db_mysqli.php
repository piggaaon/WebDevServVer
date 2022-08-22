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
  
  $filename="./raw/db_mariadb.txt";
  $html=file_get_contents($filename);
  //https://www.phpliveregex.com/
  //https://mariadb.com/downloads/ --> MariaDB/mariadb-10.6.8/yum/centos/
  //$pregmatchhtml=preg_match_all("/Download (.*?) Stable Now!/m", $html, $match);
  //$pregmatchhtml=preg_match_all("/MariaDB\/mariadb-(.*?)\/yum\/centos/", $html, $match);
  //$WebDevServVerarr['DB']['MARIADB']['LATEST']=$match[1][0];
  
  // https://mariadb.com/downloads/ --> <option value="3" release="1372" series="163">10.6.8-GA</option>
  //preg_match_all('/">10.(.*?)-/', $input_lines, $output_array);
  $pregmatchhtml=preg_match_all('/">10.(.*?)-/', $html, $matchmdb);
  array_multisort($matchmdb[0], SORT_ASC, $matchmdb[1], SORT_ASC);
  //$filename="./raw/db_mariadb_test.txt";
  //file_put_contents($filename, print_r($matchmdb, true));
  foreach ($matchmdb[0] as $itemver) {
    $itemveredt=substr($itemver,2);
    $itemveredt=substr($itemveredt, 0, -1);
    $itemverarr=explode(".",$itemveredt);
    $verlst="V".$itemverarr[0].$itemverarr[1]."_LATEST";
    $WebDevServVerarr['DB']['MARIADB'][$verlst]=$itemveredt;
  } 
  
  
  

?>
