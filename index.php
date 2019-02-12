<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Is it Raining in Albany?</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<meta property="og:title" content="Is it Raining in Albany?" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://isitraininginalbany.com/" />
	<meta property="og:image" content="" />
	<meta property="og:site_name" content="Is it Raining in Albany?" />
	<meta property="fb:admins" content="16114850" />

</head>
<body>



<div id="container">
<div id="well">
		<?php
				define('UPDATE_DELTA', 172);
				define('RAIN_LOCATION', 'icon.php');
				if (filemtime(RAIN_LOCATION) + UPDATE_DELTA < time()) {
				    $json_string = file_get_contents("https://api.darksky.net/forecast/<put your api key here>/42.6567,-73.7589?exclude=minutely,hourly,daily,alerts,flags");
				    $parsed_json = json_decode($json_string, JSON_FORCE_OBJECT);
				    $weather = $parsed_json['currently']['icon'];
				    $fp = fopen(RAIN_LOCATION, "w");
				    fwrite($fp, $weather);
				    fclose($fp);
				} else {
				    $fp = fopen(RAIN_LOCATION, "r");
				    $weather = fread($fp, filesize(RAIN_LOCATION));
				    fclose($fp);
				}
				if ($weather === "snow") {
				    echo '<a href="http://isitsnowinginalbany.com/">no</a>';
				} else if ($weather === "rain") {
				    echo 'yes';
				} else {
				    echo 'no';
				}
	?>
	
</div>



<div id="detail"><!-- <?php 
echo 'it\'s '.$condition.' and '.$temperature.''; ?> --></div>


<div class="image"><img src="rain.jpg"/></div>
</div>
<div class="push"></div>
 
 
 
<div class="social">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
<p>
  <a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Fisitraininginalbany.com%2F&ref_src=twsrc%5Etfw&text=Albany%20weather%20update%3A&tw_p=tweetbutton&url=http%3A%2F%2Fisitraininginalbany.com%2F"><i class="icon-social-twitter icons"></i></a>
  <a href="https://www.facebook.com/pg/isitraininginalbany/"><i class="icon-social-facebook icons"></i></a>
</p>


<div id="credit"><a href="http://darksky.net/">powered by dark sky</a></div>

</body> 
</html>
</div>
