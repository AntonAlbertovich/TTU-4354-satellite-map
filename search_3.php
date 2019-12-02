<?php
  require_once('header.php');
  if (!isset($_SESSION['user'])) {
    echo '<div class="alert alert-danger" role="alert">You aren\'t logged in.</div>';
    die('</div></div></div></html>');
  } else {
    echo $search_form3;

    if (isset($_GET['country_1'])) {
      $q = $_GET['country_1'];
      $result = queryMySQL("SELECT * FROM main_table WHERE LOWER(Country_of_Operator_Owner) LIKE '%$q%'");
      $num = $result->num_rows;
      if ($num == 0)
      {
        echo '<div class="alert alert-danger" role="alert">No search results found to be matching ' . $q . '</div>';
      }else{

	    if (isset($_GET['user_1'])) {
	      $xq = $_GET['user_1'];
	      $result = queryMySQL("SELECT * FROM main_table WHERE LOWER(Country_of_Operator_Owner) LIKE '%$q%'AND LOWER(Users) LIKE '%$xq%'");
	      $num = $result->num_rows;


	      if ($num == 0)
	      {
		echo '<div class="alert alert-danger" role="alert">No search results found to be matching ' . $q . '</div>';
	      }else{
		for ($j = 0 ; $j < $num ; ++$j)
		{
			$row = $result->fetch_array(MYSQLI_ASSOC);
	      echo '<div class="bg-info text-white">All Satellites belonging to ' . $q . '</div>';
		echo '<div class="card text-white bg-success">';
		  echo '<div class="card-header "><p>'  .   make_clickable($row['user_id']). '</p></div>';
		echo '<div class="card-body">';
		  echo '<p class="card-text">' . 'Country of Origin: ' . make_clickable($row['Country_Org_of_UN_Registry']) .  ' Country of Operator: ' . make_clickable($row['Country_of_Operator_Owner']) . ' Operator: ' . make_clickable($row['Operator_Owner']) . ' User: ' . make_clickable($row['Users']) .  ' Purpose: ' . make_clickable($row['Purpose']) . ' Launch Date: ' . make_clickable($row['Date_of_Launch']) . ' Life Expectancy: ' . make_clickable($row['Expected_Lifetime_yrs']) .  ' years Contractor: ' . make_clickable($row['Contractor']) . ' Country of Contractor: ' . make_clickable($row['Country_of_Contractor']) .  ' Launch Site: ' . make_clickable($row['Launch_Site']) . ' ' .  '</p></div></div>';
		}
		echo '  </tbody>
		</table>';
	      }
	    }

      }
    }
  }
