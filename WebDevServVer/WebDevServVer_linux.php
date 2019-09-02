<?php
/* Operating System (OS) - Microsoft Windows */



$installed_os="";
/* https://www.php.net/manual/en/function.php-uname.php */
$installed_os=php_uname('s');
/*
https://en.wikipedia.org/wiki/List_of_Microsoft_Windows_versions

https://en.wikipedia.org/wiki/Windows_10_version_history
Example: Windows 10.0 (1809) AMD64
Windows 10 1803 x64:
'a': Windows NT hostname 10.0 build 17763 (Windows 10) AMD64 <--- Contains all modes in the sequence "s n r v m".
's': Windows NT <--- Operating system name
'n': hostname <--- Host name
'r': 10.0 <---  Release name
'v': build 17763 (Windows 10) <--- Version information
'm': AMD64 <--- Machine type. eg. i386/x86/x86_64/AMD64

Example: Windows 7 SP1 (6.1.7601) AMD64
Windows 7 SP1 x64:
'a': Windows NT hostname 6.1 build 7601 (Windows 7 Ultimate Edition Service Pack 1) AMD64 <--- Contains all modes in the sequence "s n r v m".
's': Windows NT <--- Operating system name
'n': hostname <--- Host name
'r': 6.1 <---  Release name
'v': build 7601 (Windows 7 Ultimate Edition Service Pack 1) <--- Version information
'm': AMD64 <--- Machine type. eg. i386/x86/x86_64/AMD64
*/

/* END - Operating System (OS) */

/* Apache httpd - http://www.apachelounge.com/download/ */
  /* Get Installed Apache Version */
    function instapacheverfunc() {
      $apacherssl=0;
      $apachever=$_SERVER['SERVER_SOFTWARE'];
      //echo $apachever;
      $apacchex=explode(" ", $apachever);
      //echo"<pre>";print_r ($apacchex);echo"</pre>";
      /* Get Apache Version */
      $apacheverx=explode("/", $apacchex[0]);
      $apacheverserv=$apacheverx[0];
      $apachevernum=$apacheverx[1];
      /* Determine x86 or x64 Apache */
      if (PHP_INT_SIZE===4){
        $apacheverbld="x86";
      }else{
        $apacheverbld="x64";
      }
      /* Get OpenSSL Version if Setup */
      if (strpos($apachever, 'OpenSSL') !== false) {
        $apacheverx=explode("/", $apachever);
        //echo"<pre>";print_r ($apacheverx);echo"</pre>";
        $apachersslver=$apacheverx[2];
        $apachersslvertxt="<br />OpenSSL $apachersslver";
        $apacherssl=1;
      }
      /* Complete Compiled Apache Version*/
      if ($apacherssl=0) {
        $apachervertxt=$apacheverserv." ".$apachevernum." ".$apacheverbld;
      }else{
        $apachervertxt=$apacheverserv." ".$apachevernum." ".$apacheverbld." ".$apachersslvertxt;
      }
      return $apachervertxt;
    }
    $installed_apache=instapacheverfunc();
  /* Get Latest Apache Version */
    function lateapacheverfunc() {
      global $xmlindex,$installed_php;
      $installed_php=phpversion();
      //echo $installed_php;
      if (strpos($installed_php,"5.6") !== false) {
        $lateapacheverarr[0]=$xmlindex->HTTPD->APACHE->VC11_LATEST; //Apache httpd VC11 Latest Version Number
        $lateapacheverarr[1]=$xmlindex->DATA_URL->APACHE_URL_NIX; //Apache httpd VC11 URL
      } elseif (strpos($installed_php,'7.0') !== false || strpos($installed_php,'7.1') !== false){
        $lateapacheverarr[0]=$xmlindex->HTTPD->APACHE->VC14_LATEST; //Apache httpd VC14 Latest Version Number
        $lateapacheverarr[1]=$xmlindex->DATA_URL->APACHE_URL_NIX; //Apache httpd VC14 URL
      } elseif (strpos($installed_php,"7.2") !== false || strpos($installed_php,'7.3') !== false){
        $lateapacheverarr[0]=$xmlindex->HTTPD->APACHE->VC15_LATEST; //Apache httpd VC15 Latest Version Number
        $lateapacheverarr[1]=$xmlindex->DATA_URL->APACHE_URL_NIX; //Apache httpd VC15 URL
      } elseif (strpos($installed_php,"7.4") !== false){
        $lateapacheverarr[0]=$xmlindex->HTTPD->APACHE->VC15_LATEST; //Apache httpd VC15 Latest Version Number
        $lateapacheverarr[1]=$xmlindex->DATA_URL->APACHE_URL_NIX; //Apache httpd VC15 URL
      }else{
        $lateapacheverarr[0]="?.?.?";
        $lateapacheverarr[1]=$xmlindex->APACHE_URL; //PHP Download URL
      }
      return $lateapacheverarr;
    }
    $lateapacheverarr=lateapacheverfunc();
    //$lateapacheverarr="NA";
  /* Compare Latest to Installed Apache Version */
    if (strpos($installed_apache,"$lateapacheverarr[0]") !== false) {
      $latest_apache=$lateapacheverarr[0];
    }else{
      $latest_apache="<a class=\"USBWSVerNew\" href=\"".$lateapacheverarr[1]."\" target=\"_blank\">".$lateapacheverarr[0]."</a>";
    }
/* END - Apache httpd */

/* PHP - http://windows.php.net/ */
  /* Get Installed PHP Version */
    function instphpverfunc() {
      $phprver=phpversion();
      return $phprver;
    }
    $installed_php=instphpverfunc();
  /* Get Latest PHP Version */
    function latephpverfunc() {
      global $xmlindex,$installed_php;
      if (substr($installed_php, 0, 3)==5.6) {
        $latephpverarr[0]=$xmlindex->SCRTLANG->PHP->V56_LATEST; //PHP 5.6.x Latest Version Number
        $latephpverarr[1]=$xmlindex->DATA_URL->PHP_URL_DOWNLOAD_NIX; //PHP Download URL
      }elseif (substr($installed_php, 0, 3)==7.0){
        $latephpverarr[0]=$xmlindex->SCRTLANG->PHP->V70_LATEST; //PHP 7.0.x Latest Version Number
        $latephpverarr[1]=$xmlindex->DATA_URL->PHP_URL_DOWNLOAD_NIX; //PHP Download URL
      }elseif (substr($installed_php, 0, 3)==7.1){
        $latephpverarr[0]=$xmlindex->SCRTLANG->PHP->V71_LATEST; //PHP 7.1.x Latest Version Number
        $latephpverarr[1]=$xmlindex->DATA_URL->PHP_URL_DOWNLOAD_NIX; //PHP Download URL
      }elseif (substr($installed_php, 0, 3)==7.2){
        $latephpverarr[0]=$xmlindex->SCRTLANG->PHP->V72_LATEST; //PHP 7.2.x Latest Version Number
        $latephpverarr[1]=$xmlindex->DATA_URL->PHP_URL_DOWNLOAD_NIX; //PHP Download URL
      }elseif (substr($installed_php, 0, 3)==7.3){
        $latephpverarr[0]=$xmlindex->SCRTLANG->PHP->V73_LATEST; //PHP 7.3.x Latest Version Number
        $latephpverarr[1]=$xmlindex->DATA_URL->PHP_URL_DOWNLOAD_NIX; //PHP Download URL
      }elseif (substr($installed_php, 0, 3)==7.4){
        $latephpverarr[0]=$xmlindex->SCRTLANG->PHP->V73_LATEST; //PHP 7.4.x Latest Version Number
        $latephpverarr[1]=$xmlindex->DATA_URL->PHP_URL_DOWNLOAD_NIX; //PHP Download URL
      }else{
        $latephpverarr[0]="?.?.?";
        $latephpverarr[1]=$xmlindex->PHP_URL_DOWNLOAD_NIX; //PHP Download URL
      }
      return $latephpverarr;
    }
    $latephpver=latephpverfunc();
    //$latephpver="NA";
  /* Compare Latest to Installed PHP Version */
    if (strpos($installed_php,"$latephpver[0]") !== false) {
      $latest_php=$latephpver[0];
    }else{
      $latest_php="<a class=\"USBWSVerNew\" href=\"".$latephpver[1]."\" target=\"_blank\">".$latephpver[0]."</a>";
    }
/* END - PHP */

/* MySQl - http://dev.mysql.com/downloads/mysql/ or https://downloads.mariadb.org/ */
  /* Get Installed MySQl Version */
    function instmysqlverfunc() {
      global $mysql_host,$mysql_user,$mysql_pass;
      $conn=@mysqli_connect($mysql_host,$mysql_user,$mysql_pass);
      if (mysqli_connect_errno()) { 
        //printf("Connect failed: %s\n", mysqli_connect_error()); exit(); } 
        $mysqlver="NA";
      }else{
        $mysqlver=mysqli_get_server_info($conn);
        mysqli_close($conn);
      }
      return $mysqlver;
    }
    $installed_mysql_d=instmysqlverfunc();
    /* Installed MySQl Version either MySQL or MariaDB*/
    if (strpos($installed_mysql_d,"MariaDB") !== false) {
      $installed_mysql_mx=explode("-", $installed_mysql_d);
      $installed_mysql="MariaDB ".$installed_mysql_mx[1];
      $installed_mysql_dev=1;
    }else{
      $installed_mysql="MySQL ".$installed_mysql_d;
      $installed_mysql_dev=0;
    }
  /* Get Latest MySQl or MariaDB Version */
    if ($installed_mysql_dev==0 ) {
      /* Get Latest MySQl Version */
      function latemysqlverfunc() {
        global $xmlindex,$installed_mysql;
        if (substr($installed_mysql, 0, 3)==5.6) {
          $latemysqlverarr[0]=$xmlindex->DB->MYSQL->V56_LATEST; //MySQL 5.6.x Latest Version Number
          $latemysqlverarr[1]=$xmlindex->DATA_URL->MYSQL56_URL; //MySQL 5.6.x Download URL
        }elseif (substr($installed_mysql, 0, 3)==5.7) {
          $latemysqlverarr[0]=$xmlindex->DB->MYSQL->V57_LATEST; //MySQL 5.7.x  Latest Version Number
          $latemysqlverarr[1]=$xmlindex->DATA_URL->MYSQL57_URL; //MySQL 5.7.x Download URL
        }elseif (substr($installed_mysql, 0, 3)==8.0) {
          $latemysqlverarr[0]=$xmlindex->DB->MYSQL->V80_LATEST; //MySQL 8.0.x  Latest Version Number
          $latemysqlverarr[1]=$xmlindex->DATA_URL->MYSQL80_URL; //MySQL 8.0.x Download URL
        }else{
          $latemysqlverarr[0]="?.?.?";
          $latemysqlverarr[1]="https://dev.mysql.com/downloads/mysql/"; //MySQL Download URL
        }
        return $latemysqlverarr;
      }
      $latemysqlver=latemysqlverfunc();
    }else{
      /* Get Latest MariaDB Version */
      function latemysqlverfunc() {
        global $xmlindex,$installed_mysql;
        $latemysqlverarr[0]=$xmlindex->DB->MARIADB->LATEST; //MariaDB 10.x.x Latest Version Number
        $latemysqlverarr[1]=$xmlindex->DATA_URL->MARIADB_URL ."mariadb/".$xmlindex->DB->MARIADB->LATEST; //MariaDB 10.x.x Download URL
        return $latemysqlverarr;
      }
      $latemysqlver=latemysqlverfunc();
    }
    
  /* Compare Latest to Installed MySQl Version */
    if (strpos($installed_mysql,"$latemysqlver[0]") !== false) {
      $latest_mysql=$latemysqlver[0];
    }else{
      $latest_mysql="<a class=\"USBWSVerNew\" href=\"".$latemysqlver[1]."\" target=\"_blank\">".$latemysqlver[0]."</a>";
    }
/* END - MySQl */

/* phpMyAdmin - http://www.phpmyadmin.net/ */
  /* Check if phpMyAdmin Installed */
    $docfile=$_SERVER['DOCUMENT_ROOT']."/phpMyAdmin/config.inc.php";
    if(file_exists($docfile)){
      /* Get Installed phpMyAdmin Version */
        function instphpmyadminverfunc() {
          $phpmyadminreldat=glob($_SERVER['DOCUMENT_ROOT']."/phpMyAdmin/RELEASE-DATE-*",GLOB_NOSORT);
          $phpmyadminver=substr($phpmyadminreldat[0], strlen($_SERVER['DOCUMENT_ROOT'].'/phpMyAdmin/RELEASE-DATE-'));
          return $phpmyadminver;
        }
        $installed_phpmyadmin=instphpmyadminverfunc();
    }else{
      $installed_phpmyadmin="NA";
    }
  /* Get Latest phpMyAdmin Version */
    $latephpmyadminverarr[0]=$xmlindex->WebDevServVer_PHPMYADMIN_LATEST; //phpMyAdmin Latest Version Number
    $latephpmyadminverarr[1]="https://www.phpmyadmin.net/downloads/"; //phpMyAdmin Download URL
  /* Compare Latest to Installed MySQl Version */
    if (strpos($installed_phpmyadmin,"$latephpmyadminverarr[0]") !== false) {
      $latest_phpmyadmin=$latephpmyadminverarr[0];
    }elseif ($installed_phpmyadmin="NA"){
        $latest_phpmyadmin="NA";
    }else{  
      $latest_phpmyadmin="<a class=\"USBWSVerNew\" href=\"".$latephpmyadminverarr[1]."\" target=\"_blank\">".$latephpmyadminverarr[0]."</a>";
    }
/* END - phpMyAdmin */

/* Get and Convert Last Version(s) Date Check */
  function datechecklastfunc() {
    global $xmlindex;
    $datelateconv=gmdate("Y-m-d", intval($xmlindex->DATE_LAST)); //Unix Timestamp, last time check for new version
    return $datelateconv;
  }
  $datechecklast=datechecklastfunc(); //Last Date Latest Version(s) where checked
/* END - Get and Convert Last Version(s) Date Check */
?>