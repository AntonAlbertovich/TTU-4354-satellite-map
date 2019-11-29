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
