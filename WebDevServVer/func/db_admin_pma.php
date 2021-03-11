<?php
/* Get Latest Available PHPMyAdmin Version */
  //old URL http://www.phpmyadmin.net/downloads/ --> <h2>phpMyAdmin 4.5.4.1</h2>
  //http://www.phpmyadmin.net/home_page/version.json
  //.\phpmyadmin\libraries\VersionInformation.php
	//Line 25:     public function getLatestVersion()
  /* Scrape Version from webpage, old version
  $url="$phpmyadminvurl";
  $html=geturl($url);
  $pregmatchhtml=preg_match_all("/<h2>phpMyAdmin (.*?)<\/h2>/ms", $html, $match);
  $latephpmyadminver=$match[1][0]; */
  $filename="./raw/db_admin_pma.txt";
  $json=file_get_contents($filename);
  $jsondechtml=json_decode($json, true);
  $WebDevServVerarr['DB_ADMIN']['PMA']['LATEST']=$jsondechtml['version'];
?>
