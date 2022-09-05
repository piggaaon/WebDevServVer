<?php
/* Get Latest  Available PHP Version */
  //https://www.phpliveregex.com/
  //http://windows.php.net/download/
  $filename="./raw/scrtlang_php.txt";
  $html=file_get_contents($filename);
  //Ex: ca4b723e21293c04d782463095133212d574604de11c053aa00abdeb3f49b679 *php-8.1.10-src.zip
  //preg_match_all('/php-(.*?)-src/', $input_lines, $output_array);
  $pregmatchhtml=preg_match_all('/php-(.*?)-src/',$html,$matchmdb);
  array_multisort($matchmdb[0], SORT_ASC, $matchmdb[1], SORT_ASC);
  //$filename="./raw/db_mariadb_test.txt";
  //file_put_contents($filename, print_r($matchmdb, true));
  foreach ($matchmdb[1] as $itemver) {
    $itemveredt=trim($itemver);
    $itemverarr=explode(".",$itemveredt);
    $verlst="V".$itemverarr[0].$itemverarr[1]."_LATEST";
    $WebDevServVerarr['SCRTLANG']['PHP'][$verlst]=$itemveredt;
  }
?>