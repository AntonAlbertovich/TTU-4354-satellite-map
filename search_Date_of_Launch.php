<?php

  require_once('header.php');

  if (!isset($_SESSION['user'])) {

    echo '<div class="alert alert-danger" role="alert">You aren\'t logged in.</div>';
    die('</div></div></div></html>');

  } else {

    echo $search_form;

    if (isset($_GET['q'])) {

      $q = $_GET['q'];

      $result = queryMySQL("SELECT * FROM main_table WHERE LOWER(Date_of_Launch) LIKE '%$q%'");
      $num = $result->num_rows;

      echo '<h2><i>Search Date of Launch ' . $q . '</i></h2>';

      if ($num == 0)
      {
        echo '<div class="alert alert-danger" role="alert">No search results found to be matching ' . $q . '</div>';
      }
      else
      {

        for ($j = 0 ; $j < $num ; ++$j)
        {
          $row = $result->fetch_array(MYSQLI_ASSOC);
	echo '<div class="card mb-4">';
          echo '<div class="card-header "><p>'  .   make_clickable($row['user_id']). '</p></div>';
          echo '<div class="card-body">';
          echo '<p class="card-text">' . 'Country ' . make_clickable($row['Country_Org_of_UN_Registry']) .  ' -- ' . make_clickable($row['Country_of_Operator_Owner']) . '!' . make_clickable($row['Operator_Owner']) . ' ' . make_clickable($row['Users']) .  ' ' . make_clickable($row['Purpose']) . ' ' . make_clickable($row['Date_of_Launch']) . ' ' . make_clickable($row['Expected_Lifetime_yrs']) .  ' ' . make_clickable($row['Contractor']) . ' ' . make_clickable($row['Country_of_Contractor']) .  ' ' . make_clickable($row['Launch_Site']) . ' ' .  '</p></div></div>';

        }

        echo '  </tbody>
        </table>';

      }

    }

  }
