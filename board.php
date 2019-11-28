<?php

  require_once('header.php');

  if (!isset($_SESSION['user'])) {

    echo '<div class="alert alert-danger" role="alert">You aren\'t logged in.</div>';
    die('</div></div></div></html>');

  } else {

    if (isset($_GET['action'])) {
      if ($_GET['action'] == "delete") {

        $message_id = $_GET['id'];
        if (checkIfAdmin()) {
          queryMysql("DELETE FROM messages WHERE id='$message_id'");
        }
        else {
          queryMysql("DELETE FROM messages WHERE user_id='$user' AND id='$message_id'");
        }
        echo '<div class="alert alert-danger" role="alert">Message has been deleted.</div>';

      }
    }

    $query  = "SELECT * FROM messages ORDER BY time DESC";

    $result = queryMysql($query);
    $num    = $result->num_rows;

    if (!$num) {

      echo '<div class="alert alert-danger" role="alert">No messages yet.</div>';

    } else {

      for ($j = 0 ; $j < $num ; ++$j)
      {
        $row = $result->fetch_array(MYSQLI_ASSOC);

        echo '<div class="card mb-4">';
          echo '<div class="card-header "><p>'  .   make_clickable($row['user_id']). '</p></div>';
        echo '<div class="card-body">';
                  echo '<p class="card-text">' . ' ' . make_clickable($row['message1']) .  ' ' . make_clickable($row['message2']) . ' ' . make_clickable($row['message3']) . ' ' . make_clickable($row['message4']) .  ' ' . make_clickable($row['message5']) . ' ' . make_clickable($row['message6']) . ' ' . make_clickable($row['message7']) .  ' ' . make_clickable($row['message8']) . ' ' . make_clickable($row['message9']) .  ' ' . make_clickable($row['message10']) . ' ' .  '</p></div></div>';
      }

    echo '  </tbody>
    </table>';

    }

  }
