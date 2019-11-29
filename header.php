<?php
  session_start();
  require_once('functions.php');
  echo <<<_HEADER
  <html lang='en'>
    <head>
      <meta charset='utf-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
      <meta name='description' content=''>
      <meta name='author' content=''>
      <title>TTU-4354-satellite-map</title>
      <link href='css/bootstrap.min.css' rel='stylesheet'>
      <link href='css/custom.css' rel='stylesheet'>
    </head>
    <body>
	<script>document.body.style.backgroundImage = " url(https://o.aolcdn.com/images/dims?quality=85&image_uri=https%3A%2F%2Fo.aolcdn.com%2Fimages%2Fdims%3Fresize%3D2000%252C2000%252Cshrink%26image_uri%3Dhttps%253A%252F%252Fs.yimg.com%252Fos%252Fcreatr-uploaded-images%252F2019-09%252F0b3cbdc0-ce26-11e9-a5df-7b4ab946142e%26client%3Da1acac3e1b3290917d92%26signature%3D00fedde1916a2d74cd048ce9149a2a73b9b41212&client=amp-blogside-v2&signature=618a2121066af0a0ae7cb3cb87034ae6940dc475)";
			document.body.style.backgroundRepeat = "no-repeat";
			document.body.style.backgroundSize = "cover";
	</script>
	
      <nav class='navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top'>
        <div class='container'>
          <a class='navbar-brand' href='index.php'> TTU-4354-satellite-map </a>
_HEADER;
echo <<<_HEADER_MORE
          </div>
        </div>
      </nav>
      <br />
      <div class='container'>
        <div class="row">
            <div class="col-lg-3 mb-4" id="sidebar">
_HEADER_MORE;
      if (checkIfLoggedIn()) {
        $user = $_SESSION['user'];
        
          echo $user_sidebar;
      
      }
echo '</div>';
echo '<div class="col-lg-9 mb-4" id="main_content">';
