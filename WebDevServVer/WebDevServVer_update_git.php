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
  $pgtitle="WebDevServVer GIT Updater (SSL)";
} else {
	/* If NOT HTTPS/SSL */
  $pgfavicon="usbws-favicon.ico";
  $pglogo="usbws-logo.png";
  $pgtitle="WebDevServVer GIT Updater";
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
  <link rel="shortcut icon" href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAABILAAASCwAAAAAAAAAAAAA2NjYAFRUVA3V1dTeXl5eOp6enzbCwsO61tbXxmZmZejM1NQlXWVkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA////AIyMjGG1tbXmwcHB/8bGxv/IyMj/0tLS/83MzfWVhYGUil9RYophU2eDWVE/dEE+DINWUgAiAAAAAAAAAAAAAAGkpKSjxcXF/7m5uf+9vb3/xsfH/8rGxf++rqn/qYx4/qNwR/6cakX/kmdL9IlqX6x8U08miGRZAEEQGwAAAAACp6enpsLCwv+8vLz/wcHB/8TDw/+3nZD/ybCc/9HIwP+6jWP/tHxL/6x/Wf+imJH/impeuXlHRBR8T0sAAAAAAqenp6fHx8f/yMjI/8fHx/+8s7D/xqOJ//Do4P/39fP/1LSX/8WUaP/Ennz/xcPB/5p/bvyHW01hmHJdAAAAAAKnp6envr6+/6SkpP+qqqr/uqql/9e4nv/06d7/7trH/+LBof/hx6//59rP/+Hh4f+vnY//kGZTmf///wAAAAACqKiopsTExP/BwcH/ycnJ/8W6uP/hzb3/7tS6//fgyf/03sn/+fHp///////u6+j/wbas/5p9caAAAAABAAAAAqurq6XMzMz/x8fH/8PDw/+9trb/6eLf//Ln3P/87N3//e3c//Xn2v/u5d3/5tzS/9HNy/+ijo123eXiAAAAAAGqqqqjycnJ/8TExP/Dw8P/vbq6/9TLy//08Oz/8unf//vr3P/y4dH/7OTd//Du7P/KwcHZjm5uJ5h7fAAAAAABqKioocnJyf/ExMT/w8PD/8HBwf/Jw8P/08XB/+jc0//y6eL/59bG/+DMuv/PwLvbqI6NTP///wBXJiYAAAAAAKenp57Jycn/xMTE/8PDw//BwcH/1NTU/9bT0//PxcP/1MnI/86/uf+wm5LHimReKgAAAABLGhgAAAAAAP///wCmpqabycnJ/8XFxf/ExMT/xMTE/9XV1f/f39//3d3d/9rZ2f/a2dn/sLCxqAAAAAIHBwcAAAAAAAAAAAD///8Ao6OjlcjIyP/Hx8f/ycnJ/8zMzP/T09P/29vb/97e3v/d3d3/3d3d/7KysqcAAAACCAgIAAAAAAAAAAAA////AJCQkHO8vLz0yMjI/8rKyv/Jycn/x8fH/8rKyv/T09P/3Nzc/93d3f+ysrKlAAAAAQcHBwAAAAAAAAAAAGNjYwBFRUUKfX19QJycnJCxsbHWv7+/+cbGxv/IyMj/yMjI/8vLy//Pz8//qampnAAAAAAEBAQAAAAAAAAAAAAAAAAAAAAAABkZGQAAAAACXV1dH4mJiWWjo6O9sbGx9K6uruWkpKS+lZWVi3d3dzf///8AAgICAAAAAAAAAAAAgH8AAIAHAAAAAwAAAAEAAAABAAAAAQAAAAAAAAABAAAAAQAAAAMAAAADAACABwAAgAcAAIAHAACABwAA4A8AAA=="/>
  <meta name="Robots" content="index, follow, noimageindex, noimageclick, noodp" />
  <link href="./WebDevServVer.css" rel="stylesheet" type="text/css" />
</head>
<body  onload="timer=setTimeout('move()',5000)">
 <table class="tabblemain1">
    <tr>
      <td colspan=1>
        <div class="title"><img src="./<?php echo "$pglogo"; ?>" height="40" width="40" /><?php echo "$pgtitle"; ?></div>
      </td>
    </tr>
    <tr><td><div class="divider1"> </div></td></tr>
    <tr>
      <td style="vertical-align:top;">
<?php
/* Get Latest Available Apache Version */
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
?>
        <table class="tabledata3" >
          <tr>
            <td>
              Updated
            </td>
          </tr>
        </table>
        <div class="divider2"> </div>
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