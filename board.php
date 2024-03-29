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
          queryMysql("DELETE FROM main_table WHERE id='$message_id'");
        }
        else {
          queryMysql("DELETE FROM main_table WHERE user_id='$user' AND id='$message_id'");
        }
        echo '<div class="alert alert-danger" role="alert">Message has been deleted.</div>';
      }
    }
    $query  = "SELECT * FROM main_table ORDER BY time DESC";
    $result = queryMysql($query);
    $num    = $result->num_rows;
    if (!$num) {
      echo '<div class="alert alert-danger" role="alert">No main_table yet.</div>';
    } else {
      for ($j = 0 ; $j < $num ; ++$j)
      {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo '<div class="card mb-4">';
          echo '<div class="card-header "><p>'  .   make_clickable($row['user_id']). '</p></div>';
	echo '<div class="card-body">';
                 echo '<p class="card-text">' . 'Country of Origin: ' . make_clickable($row['Country_Org_of_UN_Registry']) .  ' Country of Operator: ' . make_clickable($row['Country_of_Operator_Owner']) . ' Operator: ' . make_clickable($row['Operator_Owner']) . ' User: ' . make_clickable($row['Users']) .  ' Purpose: ' . make_clickable($row['Purpose']) . ' Launch Date: ' . make_clickable($row['Date_of_Launch']) . ' Life Expectancy: ' . make_clickable($row['Expected_Lifetime_yrs']) .  ' years Contractor: ' . make_clickable($row['Contractor']) . ' Country of Contractor: ' . make_clickable($row['Country_of_Contractor']) .  ' Launch Site: ' . make_clickable($row['Launch_Site']) . ' ' .  '</p></div></div>';
      }
    echo '  </tbody>
    </table>';
    }
  
	echo '<script>document.body.style.backgroundImage = " url(https://backgrounddownload.com/wp-content/uploads/2018/09/star-gif-tumblr-background-2.gif)";
			document.body.style.backgroundRepeat = "repeat";
			document.body.style.backgroundSize = "auto";
	</script>';
	
    }
  
