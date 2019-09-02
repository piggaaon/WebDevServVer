<?php
/* Set where to get latest Version Information  
* 0 = Get WebDevServVer.xml from GitHub
* 1 = Get Version information from Apache Lounge,PHP.net,MySQL and create WebDevServVer.xml (default)
*/
  $getverinfo=1;
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
