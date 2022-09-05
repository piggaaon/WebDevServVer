<?php
function shapeSpace_check_https(){
	if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443){
		return true; 
	}
	return false;
}
if (shapeSpace_check_https()){
  /* If HTTPS/SSL */
  $pgfavicon="usbws-favicon-ssl.ico";
  $pglogo="usbws-logo-ssl.png";
  $pgtitle="WebDevServVer Web Updater (SSL)";
} else {
	/* If NOT HTTPS/SSL */
  $pgfavicon="usbws-favicon.ico";
  $pglogo="usbws-logo.png";
  $pgtitle="WebDevServVer Web Updater";
}

/* Include WebDevServVer Setting */
include ("../WebDevServVer/WebDevServVer_settings.php");

/* Websited used for regular expression examples and demoing code:
    http://www.phpliveregex.com/
    https://txt2re.com/
*/

/* Check settings for which source to update with from Raw (No check for updated version), GIT or Web */
if ($getverinfo==0){
  /* Raw (No check for updated version)n */
  $xmlindexfile="../WebDevServVer/WebDevServVer_data.xml";
  $xmlindex=simplexml_load_file($xmlindexfile);
  $objXmlDocument=simplexml_load_file($xmlindexfile);
  $objJsonDocument=json_encode($objXmlDocument);
  $WebDevServVerarr=json_decode($objJsonDocument,TRUE);
  $datasrc="Local Raw Data";
}elseif ($getverinfo==1){
  /* Donwload WebDevServVer.xml from GitHub */
  // https://raw.githubusercontent.com/piggaaon/WebDevServVer/master/WebDevServVer/WebDevServVer.xml
  set_time_limit(0);
  $fp=fopen ('./WebDevServVer.xml', 'w+');
  $ch=curl_init('https://raw.githubusercontent.com/piggaaon/WebDevServVer/master/WebDevServVer/WebDevServVer.xml');
  curl_setopt($ch, CURLOPT_TIMEOUT, 50);
  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_exec($ch);
  curl_close($ch);
  fclose($fp);
  $xmlindexfile="../WebDevServVer/WebDevServVer.xml";
  $objXmlDocument=simplexml_load_file($xmlindexfile);
  $objJsonDocument=json_encode($objXmlDocument);
  $WebDevServVerarr=json_decode($objJsonDocument,TRUE);
  $datasrc="GitHub";
}elseif ($getverinfo==2){
  /* Donwload version info from applications websites, data stored in WebDevServVer_data.xml */
  /* Function to get Webpage/File with Version Information */
  include_once ("./func/func_geturl.php");

  /* Function to Raw Data to file */
  include_once ("./func/func_writefile.php");

  /* Get Raw Version Data, Store Local */
  include_once ("./func/data-raw-urls.php");
  include_once ("./func/data-raw.php");

  /* Get Latest  Available Apache Version */
  include_once ("./func/httpd_apache.php");

  /* Get Latest  Available PHP Version */
  include_once ("./func/scrtlang_php.php");

  /* Get Latest  Available MySQl and MariaDB Version */
  include_once ("./func/db_mysqli.php");

  /* Get Latest Available PHPMyAdmin Version */
  include_once ("./func/db_admin_pma.php");

  /* Get Latest Version Functions Save Information to Variables */
  $WebDevServVerarr['DATE_LAST']=time();
  //echo "<pre>"; print_r($WebDevServVerarr); echo "</pre>";
  /* Create XMl DOM and Save to WebDevServVer.xml */
  include_once ("./func/data-xml.php");
  $datasrc="Application's Website";
}
?>
<!DOCTYPE html>
<head>
  <title><?php echo "$pgtitle"; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta http-equiv="Content-Language" content="en-US" />
  <meta name="Description" content="Web Server Version Updater" />
  <meta name="Abstract" content="Web Server Version Updater" />
  <meta name="Keywords" content="Server Version, web developers" />
  <meta name="Distribution" content="Global" />
  <meta name="Rating" content="General" />
  <meta name="Owner" content="Piggaaon" />
  <meta name="Author" content="Piggaaon" />
  <meta name="Copyright" content="Piggaaon" />
  <link rel="shortcut icon" href="./<?php echo "$pgfavicon"; ?>" />
  <meta name="Robots" content="index, follow, noimageindex, noimageclick, noodp" />
  <link href="./WebDevServVer.css" rel="stylesheet" type="text/css" />
  <meta http-equiv="refresh" content="500000;url=../" />
</head>
<body  onload="timer=setTimeout('move()',5000)">
 <table class="tabblemain1">
    <tr>
      <td colspan=2>
        <div class="title"><img src="./<?php echo "$pglogo"; ?>" height="40" width="40" /><?php echo "$pgtitle"; ?></div>
      </td>
    </tr>
    <tr><td><div class="divider1"> </div></td></tr>
    <tr>
      <td style="vertical-align:top;">
        <table class="tabledata3" >
          <tr>
            <td style="text-align:center" colspan=2>Source: <?php echo $datasrc; ?></td>
          </tr>
          <tr>
            <td style="text-align:left">Apache</td>
            <td style="white-space:nowrap;"><?php 
              foreach ($WebDevServVerarr['HTTPD']['APACHE'] as $key => $itemver){
                $itemverb=substr($key,0,4);
                $itembldar=$itemverb."_LATEST";
                $itemverossl=$WebDevServVerarr['HTTPD']['OPENSSL'][$itembldar];
                echo $itemverb.":".$itemver." (OpenSSL ".$itemverossl.")<br />";
              }
            ?></td>
          </tr>
          <tr>
            <td style="text-align:left;">PHP</td>
            <td><?php 
              foreach ($WebDevServVerarr['SCRTLANG']['PHP'] as $itemver){
                echo $itemver."<br />";
              }
            ?></td>
          </tr>
          <tr>
            <td style="text-align:left;">MySQL</td>
            <td><?php 
              foreach ($WebDevServVerarr['DB']['MYSQL'] as $itemver){
                echo $itemver."<br />";
              }
            ?></td>
          </tr>
          <tr>
            <td style="text-align:left;">MariaDB</td>
            <td><?php 
              foreach ($WebDevServVerarr['DB']['MARIADB'] as $itemver){
                echo $itemver."<br />";
              }
            ?></td>
          </tr>
          <tr>
            <td style="text-align:left;">phpMyAdmin</td>
            <td><?php echo $WebDevServVerarr['DB_ADMIN']['PMA']['LATEST']; ?></td>
          </tr>
        </table>
        <div style="text-align:center;"><br />Redirect to WebDevServVer Example Main Page in <span id="countdown">6</span> seconds.<br />
        <!-- JavaScript part -->
        <script type="text/javascript">
          var seconds = 6;
          function countdown(){
            seconds = seconds - 1;
            if (seconds < 0){
              // Chnage your redirection link here
              window.location = "../";
            } else {
              // Update remaining seconds
              document.getElementById("countdown").innerHTML = seconds;
              // Count down using javascript
              window.setTimeout("countdown()", 1000);
            }
          }
          countdown();
        </script>
        <a href="../">Click Here to go back to WebDevServVer Example Main Page</a>
        </div>
      </td>
    </tr>
    <?php include("./WebDevServVer_footer.php"); ?>
  </table>
</body>
</html>
