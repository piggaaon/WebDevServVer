<?php
/* Function to Save Contents to File*/
function writefile($html,$filename){
  //$html=$html;
  //$filename=$filename;
  $myfile = fopen($filename, "w") or die("Unable to open file: $filename<br />");
  fwrite($myfile, $html);
  fclose($myfile);
}
?>
