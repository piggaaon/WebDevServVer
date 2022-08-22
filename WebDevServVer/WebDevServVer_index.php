<?php
/* Include WebDevServVer Setting */
include ("./WebDevServVer/WebDevServVer_settings.php");

/* Get data from WebDevServVer.xml file */
$xmlindexfile="./WebDevServVer/WebDevServVer_data.xml";
$xmlindex=simplexml_load_file($xmlindexfile);

/* Check last date WebDevServVer.xml was updated */
$datediff=time() - $xmlindex->DATE_LAST; //Get Difference between Last Time Versions checked and Current Time (Unix Timestamp)
//echo "Difference in seconds: ".$datediff."<br />";
if($datediff > 2592000) {
  global $getverinfo;
  if ($getverinfo=0){
    /* Update Version Information from GitHub */
    header("Location: ./WebDevServVer/WebDevServVer_update_git.php");
  } else {
    /* Update Version Information from Web */
    header("Location: ./WebDevServVer/WebDevServVer_update_web.php");
  }
}

/* Determine if running on Windows or Linux  */
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
  /* Get Current Server Version Information for Windows Environment */
  include ("./WebDevServVer/WebDevServVer_windows.php");
} else {
  /* Get Current Server Version Information for Linux Environment */
  include ("./WebDevServVer/WebDevServVer_linux.php");
}
?>
