<?php
function shapeSpace_check_https() {
	if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
		return true; 
	}
	return false;
}
if (shapeSpace_check_https()) {
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

/* Websited used for regular expression examples and demoing code:
    http://www.phpliveregex.com/
    https://txt2re.com/
*/
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

/* Get Latest  Available MySQl Version */
  include_once ("./func/db_mysqli.php");

/* Get Latest Available PHPMyAdmin Version */
  include_once ("./func/db_admin_pma.php");

/* Get Latest Version Functions Save Information to Variables */
  $WebDevServVerarr['DATE_LAST']=time();

/* Create XMl DOM and Save to WebDevServVer.xml */
  include_once ("./func/data-xml.php");
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
            <td style="text-align:left; width:58%;">Apache</td>
            <td><?php echo "VC11: ".$WebDevServVerarr['HTTPD']['APACHE']['VC11_LATEST']."<br />
            VC14: ".$WebDevServVerarr['HTTPD']['APACHE']['VC14_LATEST']."<br />
            VC15: ".$WebDevServVerarr['HTTPD']['APACHE']['VC15_LATEST']."<br />
            VS16: ".$WebDevServVerarr['HTTPD']['APACHE']['VS16_LATEST']; ?></td>
          </tr>
          <tr>
            <td style="text-align:left;">PHP</td>
            <td><?php echo $WebDevServVerarr['SCRTLANG']['PHP']['V56_LATEST']."
            <br />".$WebDevServVerarr['SCRTLANG']['PHP']['V70_LATEST']."
            <br />".$WebDevServVerarr['SCRTLANG']['PHP']['V71_LATEST']."
            <br />".$WebDevServVerarr['SCRTLANG']['PHP']['V72_LATEST']."
            <br />".$WebDevServVerarr['SCRTLANG']['PHP']['V73_LATEST']."
            <br />".$WebDevServVerarr['SCRTLANG']['PHP']['V74_LATEST']; ?></td>
          </tr>
          <tr>
            <td style="text-align:left;">MySQL</td>
            <td><?php echo  "5.6.x: ".$WebDevServVerarr['DB']['MYSQL']['V56_LATEST']."<br />
            5.7.x: ".$WebDevServVerarr['DB']['MYSQL']['V57_LATEST']."<br />
            8.0.x: ".$WebDevServVerarr['DB']['MYSQL']['V80_LATEST']; ?></td>
          </tr>
          <tr>
            <td style="text-align:left;">MariaDB</td>
            <td><?php echo $WebDevServVerarr['DB']['MARIADB']['LATEST']; ?></td>
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
          function countdown() {
            seconds = seconds - 1;
            if (seconds < 0) {
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
