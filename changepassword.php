<?php

  require_once('header.php');
  if (!isset($_SESSION['user'])) {

    echo '<div class="alert alert-danger" role="alert">You aren\'t logged in.</div>';
    die('</div></div></div></html>');

  } else {

    if (isset($_POST['change_password']))
    {
      $old_password = $_POST['old_password'];
      $new_password = $_POST['password'];

      $result = queryMySQL("SELECT username, CONCAT_WS('', firstname, ' ', lastname) as uname, is_admin FROM users
        WHERE username='$user' AND password='$old_password' AND is_active=1");

      if ($result->num_rows == 0) {
        echo '<div class="alert alert-danger" role="alert">Incorrect old password.</div>';
      } else {

        queryMysql("UPDATE users SET password='$new_password' WHERE username='$user'");
        echo '<div class="alert alert-success" role="alert">Password has been changed.</div>';

      }
    }

    echo $password_form;
  }
