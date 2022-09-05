<?php
/* Apache httpd - http://www.apachelounge.com/download/ */
  /* Get Installed Apache Version */
    function instapacheverfunc(){
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
      if (strpos($apachever, 'OpenSSL') !== false){
        $apacheverx=explode("/", $apacchex[2]);
        $apachersslver=$apacheverx[1];
        $apachersslvertxt=" (OpenSSL $apachersslver)";
        $apacherssl=1;
      }
      /* Complete Compiled Apache Version*/
      if ($apacherssl=0){
        $apachervertxt=$apacheverserv." ".$apachevernum." ".$apacheverbld." ".$apacheCompiled;
      }else{
        $apachervertxt=$apacheverserv." ".$apachevernum." ".$apacheverbld." ".$apacheCompiled.$apachersslvertxt;
      }
      return $apachervertxt;
    }
    $installed_apache=instapacheverfunc();
    //$installed_apache="Apache 2.4.54 x64 VC17 (OpenSSL 1.1.1p)";
  /* Get Latest Apache Version */
    function lateapacheverfunc(){
      global $WebDevServVerarr,$installed_apache;
      foreach($WebDevServVerarr['HTTPD']['APACHE'] as $key => $itembld){
        $itembld=substr($key,0,4);
        if (strpos($installed_apache,$itembld) !== false){
          $installed_apache_bld=trim($itembld);
        }
      }
      if(!empty($installed_apache_bld)){
        $lateapacheurl=$WebDevServVerarr['DATA_URL']["APACHE".$installed_apache_bld."_URL"];
        $lateapachever=$WebDevServVerarr['HTTPD']['APACHE'][$installed_apache_bld."_LATEST"];
        $lateopensslver=$WebDevServVerarr['HTTPD']['OPENSSL'][$installed_apache_bld."_LATEST"];
      }else{
        $lateapacheurl=$WebDevServVerarr['DATA_URL']['APACHE_URL'];
        $lateapachever="?.?.?";
        $lateopensslver="?.?.?";
        $installed_apache_bld=" ";
      }
      $lateapacheverarr[0]="Apache ".$lateapachever." x?? ".$installed_apache_bld." (OpenSSL ".$lateopensslver.")"; //Apache httpd and OpenSSL Latest Version Number
      $lateapacheverarr[1]=$lateapacheurl;
      $lateapacheverarr[2]=$lateapachever;
      $lateapacheverarr[3]=$lateopensslver;

      return $lateapacheverarr;
    }
    $lateapacheverarr=lateapacheverfunc();
  /* Compare Latest to Installed Apache Version */
    if (strpos($installed_apache,trim($lateapacheverarr[2])) !== false and strpos($installed_apache,trim($lateapacheverarr[3])) !== false){
      $latest_apache=$lateapacheverarr[0];
    }else{
      $latest_apache="<a class=\"USBWSVerNew\" href=\"".$lateapacheverarr[1]."\" target=\"_blank\">".$lateapacheverarr[0]."</a>";
    }
/* END - Apache httpd */

/* PHP - http://windows.php.net/ */
  /* Get Installed PHP Version */
    function instphpverfunc(){
      $phprver=phpversion();
      
      return $phprver;
    }
    $installed_php=instphpverfunc();
  /* Get Latest PHP Version */
    function latephpverfunc(){
      global $WebDevServVerarr,$installed_php;
      //$installed_php="8.1.20";
      foreach($WebDevServVerarr['SCRTLANG']['PHP'] as $itembld){
        $itemlst=substr($itembld,0,3);
        $itemins=substr($installed_php, 0, 3);
        if ($itemins==$itemlst){
          $installed_php_bld=trim($itemlst);
        }
      }
      if(!empty($installed_php_bld)){
        $latphpvercomp=str_replace(".","",$installed_php_bld);
        $latephpverarr[0]=$WebDevServVerarr['SCRTLANG']['PHP']["V".$latphpvercomp."_LATEST"];
        $latephpverarr[1]=$WebDevServVerarr['DATA_URL']['PHP_URL_DOWNLOAD_WIN'];
      }else{
        $latephpverarr[0]="?.?.?";
        $latephpverarr[1]=$WebDevServVerarr['DATA_URL']['PHP_URL_DOWNLOAD_WIN'];
      }

      return $latephpverarr;
    }
    $latephpver=latephpverfunc();
  /* Compare Latest to Installed PHP Version */
    if (strpos($installed_php,$latephpver[0]) !== false){
      $latest_php=$latephpver[0];
    }else{
      $latest_php="<a class=\"USBWSVerNew\" href=\"".$latephpver[1]."\" target=\"_blank\">".$latephpver[0]."</a>";
    }
/* END - PHP */

/* MySQl - http://dev.mysql.com/downloads/mysql/ or https://downloads.mariadb.org/ */
  /* Get Installed MySQl Version */
    function instmysqlverfunc(){
      global $mysql_host,$mysql_user,$mysql_pass;
      $conn=@mysqli_connect($mysql_host,$mysql_user,$mysql_pass);
      if (mysqli_connect_errno()){ 
        //printf("Connect failed: %s\n", mysqli_connect_error()); exit(); } 
        $mysqlver="NA";
      }else{
        $mysqlver=mysqli_get_server_info($conn);
        //echo $mysqlver;
        mysqli_close($conn);
      }
      return $mysqlver;
    }
    $installed_db_d=instmysqlverfunc();
    /* Installed MySQl Version either MySQL or MariaDB*/
    if (strpos($installed_db_d,"MariaDB") !== false){
      $installed_db_mx=explode("-", $installed_db_d);
      $installed_db="MariaDB ".$installed_db_mx[0];
      $installed_db_dev=1;
    }else{
      $installed_db="MySQL ".$installed_db_d;
      $installed_db_dev=0;
    }
  /* Get Latest MySQl or MariaDB Version */
    if ($installed_db_dev==0 ){
      /* Get Latest MySQl Version */
      function latemysqlverfunc(){
        global $WebDevServVerarr,$installed_db;
        if (substr($installed_db, 0, 3)==5.7){
          $latemysqlverarr[0]=$WebDevServVerarr['DB']['MYSQL']['V57_LATEST']; //MySQL 5.7.x  Latest Version Number
          $latemysqlverarr[1]=$WebDevServVerarr['DATA_URL']['MYSQL57_URL']; //MySQL 5.7.x Download URL
        }elseif (substr($installed_db, 0, 3)==8.0){
          $latemysqlverarr[0]=$WebDevServVerarr['DB']['MYSQL']['V80_LATEST']; //MySQL 8.0.x  Latest Version Number
          $latemysqlverarr[1]=$WebDevServVerarr['DATA_URL']['MYSQL80_URL']; //MySQL 8.0.x Download URL
        }else{
          $latemysqlverarr[0]="?.?.?";
          $latemysqlverarr[1]="https://dev.mysql.com/downloads/mysql/"; //MySQL Download URL
        }
        return $latemysqlverarr;
      }
      $latemysqlver=latemysqlverfunc();
    }else{
      /* Get Latest MariaDB Version */
      function latemdbverfunc(){
        global $WebDevServVerarr,$installed_db;
        //Web - https://mariadb.org/download/?t=mariadb&p=mariadb&r=10.6.9&os=windows&cpu=x86_64&pkg=zip
        //File - https://archive.mariadb.org/mariadb-10.6.9/winx64-packages/
        //$latemdbverarr[1]="https://archive.mariadb.org/mariadb-".$WebDevServVerarr['DB']['MARIADB']['V109_LATEST']."/winx64-packages/";
        
      foreach($WebDevServVerarr['DB']['MARIADB'] as $itembld){
        $itemlst=trim($itembld);
        $installed_dbx=explode(" ",$installed_db);
        $itemins=trim($installed_dbx[1]);
        //echo $itemlst."|".$itemins."<br />";
        if ($itemins==$itemlst){
          $installed_db_bld=trim($itemins);
          //echo $itemlst."|".$itemins."|".$installed_db_bld;
        }
      }
      if(!empty($installed_db_bld)){
        $latemdbverx=explode(".",$installed_db_bld);
        $latmariadbvercomp=$latemdbverx[0].$latemdbverx[1];
        $latemdbverarr[0]="MariaDB ".$WebDevServVerarr['DB']['MARIADB']["V".$latmariadbvercomp."_LATEST"];
        $latemdbverarr[1]="https://archive.mariadb.org/mariadb-".$WebDevServVerarr['DB']['MARIADB']['V109_LATEST']."/winx64-packages/";
      }else{
        $latemdbverarr[0]="?.?.?";
        $latemdbverarr[1]=$WebDevServVerarr['DATA_URL']['MARIADB_URL'];
      }
        
        
        
        return $latemdbverarr;
      }
      $latemysqlver=latemdbverfunc();
    }
    
  /* Compare Latest to Installed MySQl Version */
    if (strpos($installed_db,"$latemysqlver[0]") !== false){
      $latest_db=$latemysqlver[0];
    }else{
      $latest_db="<a class=\"USBWSVerNew\" href=\"".$latemysqlver[1]."\" target=\"_blank\">".$latemysqlver[0]."</a>";
    }
/* END - MySQl */

/* phpMyAdmin - http://www.phpmyadmin.net/ */
  /* Check if phpMyAdmin Installed */
    if (!empty($_SERVER['HTTPS'])){
      $rooturl='https://'.$_SERVER['HTTP_HOST'].'/';
      $docfile=$rooturl."DBAdmin/package.json";
      $context=[ 'http' => [ 'method' => 'GET' ], 'ssl' => [ 'verify_peer' => false, 'allow_self_signed'=> true ] ];
      $context=stream_context_create($context);
      $contents=file_get_contents("$docfile", false, $context);
      if (strlen($contents)){
        /* Get Installed phpMyAdmin Version */
          function instphpmyadminverfunc($json){
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
    $latephpmyadminverarr[0]=$WebDevServVerarr['DB_ADMIN']['PMA']['LATEST']; //phpMyAdmin Latest Version Number
    $latephpmyadminverarr[1]="https://www.phpmyadmin.net/downloads/"; //phpMyAdmin Download URL
  /* Compare Latest to Installed phpMyAdmin Version */
    if ($installed_phpmyadmin=="NA"){
      $latest_phpmyadmin="NA";
    }else{
      if (strpos($installed_phpmyadmin_ver,"$latephpmyadminverarr[0]") !== false){
      $latest_phpmyadmin="phpMyAdmin ".$latephpmyadminverarr[0];
      }else{
        $latest_phpmyadmin="<a class=\"USBWSVerNew\" href=\"".$latephpmyadminverarr[1]."\" target=\"_blank\">".$latephpmyadminverarr[0]."</a>";
      }
    }
/* END - phpMyAdmin */

/* Get and Convert Last Version(s) Date Check */
  function datechecklastfunc(){
    global $WebDevServVerarr;
    $datelateconv=gmdate("Y-m-d", intval($WebDevServVerarr['DATE_LAST'])); //Unix Timestamp, last time check for new version
    return $datelateconv;
  }
  $datechecklast=datechecklastfunc(); //Last Date Latest Version(s) where checked
/* END - Get and Convert Last Version(s) Date Check */
?>
