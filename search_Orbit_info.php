<?php
  require_once('header.php');
  if (!isset($_SESSION['user'])) {
    echo '<div class="alert alert-danger" role="alert">You aren\'t logged in.</div>';
    die('</div></div></div></html>');
  } else {
    echo $search_form;
	echo '<h2><i><font color="white">Search Orbit Info by Satellite Name </font></i></h2>';
    if (isset($_GET['q'])) {
	    $q = $_GET['q'];
	          $result = queryMySQL("SELECT m.user_id, o.Apogee_km, o.Perigee_km, o.Type_of_Orbit, o.Eccentricity, o.Inclination_degrees, o.Class_of_Orbit FROM main_table m, ID_table i, orbit_table o WHERE m.NORAD_Number = i.NORAD_Number AND i.Orbit_ID = o.Orbit_ID AND LOWER(user_id) LIKE '%$q%'");

      $num = $result->num_rows;
      
      if ($num == 0)
      {
        echo '<div class="alert alert-danger" role="alert">No search results found to be matching ' . $q . '</div>';
      }else{
        for ($j = 0 ; $j < $num ; ++$j)
        {
          $row = $result->fetch_array(MYSQLI_ASSOC);
        echo '<div class="card text-white bg-success">';
        echo '<div class="card-body">';
          echo '<p class="card-text">' . 'Apogee: ' . make_clickable($row['Apogee_km']) .  'km Perigee: ' . make_clickable($row['Perigee_km']) . 'km  Type of Orbit: ' . make_clickable($row['Type_of_Orbit']) . ' Eccentricity:  ' . make_clickable($row['Eccentricity'])  . ' Inclination Degree: ' .make_clickable($row['Inclination_degrees']) .' '.   '</p></div></div>';
        }
        echo '  </tbody>
        </table>';
      }
    }
  }
?>
