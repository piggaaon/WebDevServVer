<?php
/* Get Latest  Available PHP Version */
  //https://www.phpliveregex.com/
  //http://windows.php.net/download/
  $filename="./raw/scrtlang_php.txt";
  $html=file_get_contents($filename);
  // https://windows.php.net/downloads/releases/sha256sum.txt --> php-5.6.36-Win32-VC11
  $pregmatchhtml=preg_match_all("/php-5.6.(.*?)-nts-Win32-VC11/ms", $html, $match);
  $WebDevServVerarr['SCRTLANG']['PHP']['V56_LATEST']="5.6.".$match[1][1];

  // https://windows.php.net/downloads/releases/sha256sum.txt --> php-7.0.30-Win32-VC14
  $pregmatchhtml=preg_match_all("/php-7.0.(.*?)-nts-Win32-VC14/ms", $html, $match);
  $WebDevServVerarr['SCRTLANG']['PHP']['V70_LATEST']="7.0.".$match[1][1];

  // https://windows.php.net/downloads/releases/sha256sum.txt --> php-7.1.19-Win32-VC14
  $pregmatchhtml=preg_match_all("/php-7.1.(.*?)-nts-Win32-VC14/ms", $html, $match);
  $WebDevServVerarr['SCRTLANG']['PHP']['V71_LATEST']="7.1.".$match[1][1];

  // https://windows.php.net/downloads/releases/sha256sum.txt --> php-7.2.7-Win32-VC15
  $pregmatchhtml=preg_match_all("/php-7.2.(.*?)-nts-Win32-VC15/ms", $html, $match);
  $WebDevServVerarr['SCRTLANG']['PHP']['V72_LATEST']="7.2.".$match[1][1];
  
  // https://windows.php.net/downloads/releases/sha256sum.txt --> php-7.3.0-Win32-VC15
  $pregmatchhtml=preg_match_all("/php-7.3.(.*?)-nts-Win32-VC15/ms", $html, $match);
  $WebDevServVerarr['SCRTLANG']['PHP']['V73_LATEST']="7.3.".$match[1][1];
  //echo "&nbsp;Retrieved Latest PHP Version: 5.6.x=$php56ver, 7.0.x=$php70ver, 7.1.x=$php71ver, 7.2.x=$php72ver, 7.3.x=$php72ver<br />";
  
  // https://windows.php.net/downloads/releases/sha256sum.txt --> php-7.4.0-Win32-VC15
  $pregmatchhtml=preg_match_all("/php-7.4.(.*?)-nts-Win32-vc15/ms", $html, $match);
  $WebDevServVerarr['SCRTLANG']['PHP']['V74_LATEST']="7.4.".$match[1][1];
  //echo "&nbsp;Retrieved Latest PHP Version: 5.6.x=$php56ver, 7.0.x=$php70ver, 7.1.x=$php71ver, 7.2.x=$php72ver, 7.3.x=$php73ver, 7.4.x=$php74ver<br />";
  
  // https://windows.php.net/downloads/releases/sha256sum.txt --> php-8.0.1-nts-Win32-vs16
  $pregmatchhtml=preg_match_all("/php-8.0.(.*?)-nts-Win32-vs16/ms", $html, $match);
  $WebDevServVerarr['SCRTLANG']['PHP']['V80_LATEST']="8.0.".$match[1][1];
  //echo "&nbsp;Retrieved Latest PHP Version: 5.6.x=$php56ver, 7.0.x=$php70ver, 7.1.x=$php71ver, 7.2.x=$php72ver, 7.3.x=$php73ver, 7.4.x=$php74ver<br />";
  
  // https://windows.php.net/downloads/releases/sha256sum.txt --> php-8.1.2-nts-Win32-vs16
  $pregmatchhtml=preg_match_all("/php-8.1.(.*?)-nts-Win32-vs16/ms", $html, $match);
  $WebDevServVerarr['SCRTLANG']['PHP']['V81_LATEST']="8.1.".$match[1][1];
  //echo "&nbsp;Retrieved Latest PHP Version: 5.6.x=$php56ver, 7.0.x=$php70ver, 7.1.x=$php71ver, 7.2.x=$php72ver, 7.3.x=$php73ver, 7.4.x=$php74ver<br />";
?>
