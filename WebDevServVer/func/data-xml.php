<?php
/* Create XMl DOM and Save to WebDevServVer.xml */
//Converts Array to DOM XML
  require_once("./func/class_array2xml.php");
  $tmdbxml = Array2XML::createXML('WebDevServVer_INFO', $WebDevServVerarr);
  $tmdbxml->formatOutput = true;
  $tmdbxml_string = $tmdbxml->saveXML();
//Save XML to file
  $ftmdb="./WebDevServVer_data.xml";
  $tmdbfil = fopen("$ftmdb", "w");
  fwrite($tmdbfil, $tmdbxml_string);
  fclose($tmdbfil);
?>
