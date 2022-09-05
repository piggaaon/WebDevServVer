<?php
/* Include WebDevServVer Setting */
include ("./WebDevServVer/WebDevServVer_settings.php");

/* Get data from WebDevServVer.xml file */
  if ($getverinfo==0){
    /* For WebDevServVer development use only, this option will use raw data folder as source */
    $xmlindexfile="./WebDevServVer/WebDevServVer_data.xml";
  }elseif($getverinfo==1){
    /* Update Version Information from GitHub */
    $xmlindexfile="./WebDevServVer/WebDevServVer.xml";
  }elseif($getverinfo==2){
    /* Update Version Information from Web */
    $xmlindexfile="./WebDevServVer/WebDevServVer_data.xml";
  }
  $objXmlDocument=simplexml_load_file($xmlindexfile);
  $objJsonDocument=json_encode($objXmlDocument);
  $WebDevServVerarr=json_decode($objJsonDocument,TRUE);
  //echo "<pre>";print_r($WebDevServVerarr);echo "</pre>";

/* Check last date WebDevServVer.xml was updated */
  $datediff=time() - $WebDevServVerarr['DATE_LAST']; //Get Difference between Last Time Versions checked and Current Time (Unix Timestamp)
  //echo "Difference in seconds: ".$datediff."<br />";
  if($datediff > 2592000) {
    header("Location: ./WebDevServVer/WebDevServVer_update.php");
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
