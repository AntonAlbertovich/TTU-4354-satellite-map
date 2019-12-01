<?php
  require_once('header.php');
  if (!isset($_SESSION['user'])) {
    echo '<div class="alert alert-danger" role="alert">You aren\'t logged in.</div>';
    die('</div></div></div></html>');
  } else {
    echo('<a href="apogee_hi.php"><img src="images/hi.png" style="width:700px;"></a>');
	echo('<a href="apogee_mid.php"><img src="images/mid.png" style="width:700px;"></a>');
	echo('<a href="apogee_low.php"><img src="images/low.png" style="width:700px;"></a>');
  }
