<?php
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
      /* Get VC Version used to Compiled Apache */
        //$filename="./WebDevServVer/raw/phpinfo.txt";
        //$infophp=file_get_contents($filename);
        ob_start();
        phpinfo();
        $infophp = ob_get_contents();
        ob_get_clean();
        //$pregmatchhtml=preg_match_all("/MSVC(.*?) \(Visual/ms", $infophp, $apacheCompiledmatch);
        $pregmatchhtml=preg_match_all("/,TS,(.*?) \<\/td>/ms", $infophp, $apacheCompiledmatch);
        $apacheCompiled=$apacheCompiledmatch[1][0];
      /* Determine x86 or x64 Apache */
      if (PHP_INT_SIZE===4){
        $apacheverbld="x86";
      }else{
        $apacheverbld="x64";
      }
       /* Get OpenSSL Version if Setup */
      if (strpos($apachever, 'OpenSSL') !== false) {
        $apacheverx=explode("/", $apacchex[2]);
        $apachersslver=$apacheverx[1];
        $apachersslvertxt="<br />OpenSSL $apachersslver";
        $apacherssl=1;
      }
      /* Complete Compiled Apache Version*/
      if ($apacherssl=0) {
        $apachervertxt=$apacheverserv." ".$apachevernum." ".$apacheverbld." ".$apacheCompiled;
      }else{
        $apachervertxt=$apacheverserv." ".$apachevernum." ".$apacheverbld." ".$apacheCompiled.$apachersslvertxt;
      }
      return $apachervertxt;
    }
    $installed_apache=instapacheverfunc();
  /* Get Latest Apache Version */
    function lateapacheverfunc() {
      global $xmlindex,$installed_apache;
      if (strpos($installed_apache,"VC11") !== false) {
        $lateapacheverarr[0]=$xmlindex->HTTPD->APACHE->VC11_LATEST; //Apache httpd VC11 Latest Version Number
        $lateapacheverarr[1]=$xmlindex->DATA_URL->APACHEVC11_URL; //Apache httpd VC11 URL
      }elseif (strpos($installed_apache,"VC14") !== false) {
        $lateapacheverarr[0]=$xmlindex->HTTPD->APACHE->VC14_LATEST; //Apache httpd VC14 Latest Version Number
        $lateapacheverarr[1]=$xmlindex->DATA_URL->APACHEVC14_URL; //Apache httpd VC14 URL
      }elseif (strpos($installed_apache,"VC15") !== false){
        $lateapacheverarr[0]=$xmlindex->HTTPD->APACHE->VC15_LATEST; //Apache httpd VC15 Latest Version Number
        $lateapacheverarr[1]=$xmlindex->DATA_URL->APACHEVC15_URL; //Apache httpd VC15 URL
      }elseif (strpos($installed_apache,"VS16") !== false){
        $lateapacheverarr[0]=$xmlindex->HTTPD->APACHE->VS16_LATEST; //Apache httpd VS16 Latest Version Number
        $lateapacheverarr[1]=$xmlindex->DATA_URL->APACHEVS16_URL; //Apache httpd VS16 URL
      }else{
        $lateapacheverarr[0]="?.?.?";
        $lateapacheverarr[1]=$xmlindex->APACHE_URL; //PHP Download URL
      }
      return $lateapacheverarr;
    }
    $lateapacheverarr=lateapacheverfunc();
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
        $latephpverarr[1]=$xmlindex->DATA_URL->PHP_URL_DOWNLOAD_WIN; //PHP Download URL
      }elseif (substr($installed_php, 0, 3)==7.0){
        $latephpverarr[0]=$xmlindex->SCRTLANG->PHP->V70_LATEST; //PHP 7.0.x Latest Version Number
        $latephpverarr[1]=$xmlindex->DATA_URL->PHP_URL_DOWNLOAD_WIN; //PHP Download URL
      }elseif (substr($installed_php, 0, 3)==7.1){
        $latephpverarr[0]=$xmlindex->SCRTLANG->PHP->V71_LATEST; //PHP 7.1.x Latest Version Number
        $latephpverarr[1]=$xmlindex->DATA_URL->PHP_URL_DOWNLOAD_WIN; //PHP Download URL
      }elseif (substr($installed_php, 0, 3)==7.2){
        $latephpverarr[0]=$xmlindex->SCRTLANG->PHP->V72_LATEST; //PHP 7.2.x Latest Version Number
        $latephpverarr[1]=$xmlindex->DATA_URL->PHP_URL_DOWNLOAD_WIN; //PHP Download URL
      }elseif (substr($installed_php, 0, 3)==7.3){
        $latephpverarr[0]=$xmlindex->SCRTLANG->PHP->V73_LATEST; //PHP 7.3.x Latest Version Number
        $latephpverarr[1]=$xmlindex->DATA_URL->PHP_URL_DOWNLOAD_WIN; //PHP Download URL
      }elseif (substr($installed_php, 0, 3)==7.4){
        $latephpverarr[0]=$xmlindex->SCRTLANG->PHP->V74_LATEST; //PHP 7.4.x Latest Version Number
        $latephpverarr[1]=$xmlindex->DATA_URL->PHP_URL_DOWNLOAD_WIN; //PHP Download URL
      }elseif (substr($installed_php, 0, 3)==8.0){
        $latephpverarr[0]=$xmlindex->SCRTLANG->PHP->V80_LATEST; //PHP 8.0.x Latest Version Number
        $latephpverarr[1]=$xmlindex->DATA_URL->PHP_URL_DOWNLOAD_WIN; //PHP Download URL
      }else{
        $latephpverarr[0]="?.?.?";
        $latephpverarr[1]=$xmlindex->PHP_URL_DOWNLOAD_WIN; //PHP Download URL
      }
      return $latephpverarr;
    }
    $latephpver=latephpverfunc();
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
    if (!empty($_SERVER['HTTPS'])) {
      $rooturl='https://'.$_SERVER['HTTP_HOST'].'/';
      $docfile=$rooturl."DBAdmin/package.json";
      $context=[ 'http' => [ 'method' => 'GET' ], 'ssl' => [ 'verify_peer' => false, 'allow_self_signed'=> true ] ];
      $context=stream_context_create($context);
      $contents=file_get_contents("$docfile", false, $context);
      if (strlen($contents)){
        /* Get Installed phpMyAdmin Version */
          function instphpmyadminverfunc($json) {
            $jsondechtml=json_decode($json, true);
            $phpmyadminver=$jsondechtml['version'];
            return $phpmyadminver;
          }
        $installed_phpmyadmin_ver=instphpmyadminverfunc($contents);
        $installed_phpmyadmin="phpMyAdmin ".instphpmyadminverfunc($contents);
      }
    }else{
      $installed_phpmyadmin="NA";
    }
    clearstatcache();
  /* Get Latest phpMyAdmin Version */
    $latephpmyadminverarr[0]=$xmlindex->DB_ADMIN->PMA->LATEST; //phpMyAdmin Latest Version Number
    $latephpmyadminverarr[1]="https://www.phpmyadmin.net/downloads/"; //phpMyAdmin Download URL
  /* Compare Latest to Installed MySQl Version */
    if ($installed_phpmyadmin=="NA"){
      $latest_phpmyadmin="NA";
    }else{
      if (strpos($installed_phpmyadmin_ver,"$latephpmyadminverarr[0]") !== false) {
      $latest_phpmyadmin=$latephpmyadminverarr[0];
      }else{
        $latest_phpmyadmin="<a class=\"USBWSVerNew\" href=\"".$latephpmyadminverarr[1]."\" target=\"_blank\">".$latephpmyadminverarr[0]."</a>";
      }
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
