<?php
/* Include Code for WebDevServVer Information */
include ("./WebDevServVer/WebDevServVer_index.php");
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
  $pgtitle="USBWS Information (SSL)";
} else {
	/* If NOT HTTPS/SSL */
  $pgfavicon="usbws-favicon.ico";
  $pglogo="usbws-logo.png";
  $pgtitle="USBWS Information";
}
?>
<!DOCTYPE html>
<head>
  <title><?php echo "$pgtitle"; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta http-equiv="Content-Language" content="en-US" />
  <meta name="Description" content="USBWS Information, displaying Server Version, other links and search boxes for web developers to use." />
  <meta name="Abstract" content="USBWS Information" />
  <meta name="Keywords" content="USBWS Information, Server Version, search boxes, web developers" />
  <meta name="Distribution" content="Global" />
  <meta name="Rating" content="General" />
  <meta name="Owner" content="Piggaaon" />
  <meta name="Author" content="Piggaaon" />
  <meta name="Copyright" content="Piggaaon <?php $cyear=date("Y"); if ($cyear==2013) {echo "2016";} else {echo "2013-",date("Y");} ?>" />
  <link rel="shortcut icon" href="./WebDevServVer/<?php echo "$pgfavicon"; ?>" />
  <meta name="Robots" content="index, follow, noimageindex, noimageclick, noodp" />
  <link href="./index.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <table class="tabledatahtp">
    <tr>
      <td>Server</td>
      <td>Web</td>
      <td>PHP</td>
      <td>Database</td>
      <td>DBAdmin</td>
      <td rowspan=6 valign=top>DB Settings<div class="divider1"> </div>Username: <?php echo $mysql_user; ?><br />Password: <?php echo $mysql_pass; ?><br />Port: <?php echo $mysql_port; ?></td>
      <td rowspan=6 valign=top>Last Check:<br /><?php echo $datechecklast; ?><div class="divider1"> </div><a href="./WebDevServVer/WebDevServVer_update_web.php">Web Update</a><br /><a href="./WebDevServVer/WebDevServVer_update_git.php">GIT Update</a></td>
    </tr>
    <tr>
      <td>Installed</td>
      <td><?php echo $installed_apache; ?></td>
      <td><?php echo $installed_php; ?></td>
      <td><?php echo $installed_mysql; ?></td>
      <td><?php echo $installed_phpmyadmin; ?></td>
    </tr>
    <tr>
      <td>Latest</td>
      <td><?php echo $latest_apache; ?></td>
      <td><?php echo $latest_php; ?></td>
      <td><?php echo $latest_mysql; ?></td>
      <td><?php echo $latest_phpmyadmin; ?></td>
    </tr>
    <tr>
      <td>Links</td>
      <td><a href="http://www.apachelounge.com/download/" target="_blank">Windows</a>|<a href="https://httpd.apache.org/" target="_blank">Linux</a></td>
      <td><a href="http://windows.php.net/" target="_blank">Windows</a>|<a href="https://www.php.net/" target="_blank">Linux</a></td>
      <td><a href="https://downloads.mariadb.org/" target="_blank">MariaDB</a>|<a href="http://dev.mysql.com/downloads/mysql/" target="_blank">MySQL</a></td>
      <td><a href="http://www.phpmyadmin.net/" target="_blank">phpMyAdmin</a></td>
    </tr>
    <tr>
      <td colspan=5 >
        | <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/" target="_blank">HTTP Root</a> | 
        <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/" target="_blank">HTTPS Root</a> | 
        <a href="./WebDevServVer/phpinfo.php" target="_blank">PHPInfo</a> | 
        <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/DBAdmin/" target="_blank">DBAdmin</a> | 
        <a href="./WebDevServVer/viewport_size.html" target="_blank">ViewPort Size</a> |
      </td>
    </tr>
  </table>
  <table class="tabblemain1">
    <tr>
      <td colspan=4>
        <div class="title"><img src="./WebDevServVer/<?php echo "$pglogo"; ?>" height="40" width="40" /><?php echo "$pgtitle"; ?></div>
      </td>
    </tr>
  </table>
  <table class="tabblemain1">
    <tr><td colspan=4><div class="divider1"> </div></td></tr>
    <tr>
      <td style="vertical-align:top;">
        <h3>Search</h3>
        <div class="divider1"> </div>
        <table class="tablesearch">
          <tr>
            <td>
              <!-- Start of DuckDuckGo Search Box Code -->
              <form method="get" action="https://duckduckgo.com/">
              &nbsp;<a href="https://duckduckgo.com">DuckDuckGo</a>
              <input size="24" name="q">
              <input type="submit" value="Search">
              </form>
              <!-- End of DuckDuckGo Search Box Code -->
            </td>
          </tr>
          <tr>
            <td>
              <!-- Start of Google Search Box Code -->
              <form class="c1" method="get" action="http://www.google.com/search" >
                &nbsp;<a href="https://www.google.com">Google</a>
                <input name="q" size="24" maxlength="255" value="" type="text" />
                <input name="sa" value="Search" type="submit" />
                <input name="safe" value="vss" type="hidden" />
                <input name="vss" value="1" type="hidden" />
              </form>
              <!-- End of Google Search Box Code -->
            </td>
          </tr>
          <tr>
            <td>
              <!-- Start of Bing Search Box Code -->
              <form class="c1" method="get" action="http://www.bing.com/search" >
                &nbsp;<a href="https://www.bing.com">Bing</a>
                <input type="text" name="q" size="24" />
                <input value="Search" type="submit" />
              </form>
              <!-- End of Bing Search Box Code -->
            </td>
          </tr>
          <tr>
          <tr><td><div class="divider1"> </div></td></tr>
          <tr>
            <td>
              <!-- Start of IMDB Title Search Box Code -->
              <form class="c1" method="get" action="http://www.imdb.com/find" >
                &nbsp;<a href="http://www.imdb.com/search">IMDB Title</a>
                <input name="q" size="23" />
                <input type="hidden" name="s" value="tt">
                <input value="Search" name="GO" type="submit" />
              </form>
              <!-- End of IMDB Title Search Box Code -->
             </td>
          </tr>
          <tr>
            <td>
              <!-- Start of TMDB Title Search Box Code -->
              <form action="http://www.themoviedb.org/search" method="get" accept-charset="utf-8">
                &nbsp;<a href="http://www.themoviedb.org/">TheMovieDB</a>
                <input id="search" name="query" type="text" tabindex="1" size="23">
                <input type="submit" value="Search">
              </form>
              <!-- End of TMDB Title Search Box Code -->
            </td>
          </tr>
          <tr>
            <td>
              <!-- Start of TVDB Title Search Box Code -->
              <form action="http://thetvdb.com/" method="get" name="searchbox" id="searchbox" >
                &nbsp;<a href="http://www.themoviedb.org/">TheTVDB</a>
                <input type="text" name="string" id="search" size="23">
                <input type="hidden" name="searchseriesid" id="searchseriesid" />
                <input type="hidden" name="tab" value="listseries">
                <input type="hidden" name="function" value="Search">
                <input type="submit" value="Search">
              </form>
              <!-- End of TVDB Title Search Box Code -->
            </td>
          </tr>
          <tr>
            <td>
              <!-- Start of Rotten Tomatoes Title Search Box Code -->
              <form action="http://www.rottentomatoes.com/search/" method="get">
                &nbsp;<a href="http://www.rottentomatoes.com/">Rttn Tomato</a>
                <input name="search" type="text" name="srch-term" id="search-term" size="23"> 
                <input type="submit" value="Search">
              </form>
              <!-- End of Rotten Tomatoes Title Search Box Code -->
            </td>
          </tr>
        </table>
      </td>
      <td class="vr">&nbsp;</td>
      <td>&nbsp;</td>
      <td style="vertical-align:top;">
        <h3>Links</h3><div class="divider1"> </div>
        <table class="tablelinks">
          <tr>
            <td style="vertical-align:top;">
              Projects:<br />
              <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/PrivFlix/">PrivFlix</a><br />
              <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/PrivFlix_Excess/">PrivFlix_Excess</a><br />
              <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/PrivFlix_DokuWiki/" target="_blank">PrivFlix_DokuWiki</a><br />
              <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/VVCCMngr/index.php?sec=vvccmngr&pg1=main" target="_blank">VVCCMngr (SSL)</a><br />
              <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/Piggaaon/">Piggaaon (Homepage)</a><br />
              <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/WebDevServVer_Dev/">WebDevServVer_Dev</a><br />
              <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/NewSites/">NewSites</a><br />
            </td>
            <td class="vr">&nbsp;</td>
            <td>&nbsp;</td>
            <td style="vertical-align:top;">
              Projects:<br />
              <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/Test/">Project1</a><br />
              <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/Test/">Project1</a><br />
              <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/Test/">Project1</a><br />
              <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/Test/">Project1</a><br />
            </td>
          </tr>
          <tr>
            <td style="vertical-align:top;" colspan=4>
              Local Scrtips:<br />
              <a href="./TestScripts/">Test Scripts Folder</a><br />
              <div class="divider1"> </div>
              <h3>Server Links</h3>
              <div class="divider1"> </div>
              USBWS Software:<br />
              <a href="https://github.com/piggaaon/USBWS/" target="_blank">USBWS</a>, <a href="https://github.com/piggaaon/WebDevServVer/" target="_blank">WebDevServVer</a><br />
              <div class="divider1"> </div>
              External Links:<br />
              <a href="http://output.jsbin.com/efuhud/1">window.orientation test</a><br />
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan=4>
        <div class="divider1"> </div>
        <h4>&#169; WebDevServVer <?php $cyear=date("Y"); if ($cyear==2016) {echo "2016";} else {echo "2016-",date("Y");} ?></h4>
      </td>
    </tr>
  </table>
</body>
</html>