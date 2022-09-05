<?php
/* Set where to get latest Version Information  
* 0 = For WebDevServVer development use only, this option will use raw data folder as source
* 1 = Get WebDevServVer.xml from GitHub
* 2 = Get Version information from Apache Lounge,PHP.net,MySQL and create WebDevServVer.xml (default)
*/
  $getverinfo=2;
/* Time before Version Information is Updated 
* Default is 30 days or XXXXXXXX seconds
* 
*/
  $nextdatecheckvar="+30 Days";
/* MySQl Login Information */
  $mysql_host="127.0.0.1";
  $mysql_port=ini_get('mysqli.default_port');
  $mysql_user="root";
  $mysql_pass="usbw";
?>
