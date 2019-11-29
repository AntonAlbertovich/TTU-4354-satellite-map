<?php
  require_once('header.php');
  
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
                  echo '<p class="card-text">' . 'Country ' . make_clickable($row['Country_Org_of_UN_Registry']) .  ' -- ' . make_clickable($row['Country_of_Operator_Owner']) . '!' . make_clickable($row['Operator_Owner']) . ' ' . make_clickable($row['Users']) .  ' ' . make_clickable($row['Purpose']) . ' ' . make_clickable($row['Date_of_Launch']) . ' ' . make_clickable($row['Expected_Lifetime_yrs']) .  ' ' . make_clickable($row['Contractor']) . ' ' . make_clickable($row['Country_of_Contractor']) .  ' ' . make_clickable($row['Launch_Site']) . ' ' .  '</p></div></div>';
      
	  }
    echo ' </tbody>
    </table>';
	echo '<script>document.body.style.backgroundImage = " url(https://o.aolcdn.com/images/dims?quality=85&image_uri=https%3A%2F%2Fo.aolcdn.com%2Fimages%2Fdims%3Fresize%3D2000%252C2000%252Cshrink%26image_uri%3Dhttps%253A%252F%252Fs.yimg.com%252Fos%252Fcreatr-uploaded-images%252F2019-09%252F0b3cbdc0-ce26-11e9-a5df-7b4ab946142e%26client%3Da1acac3e1b3290917d92%26signature%3D00fedde1916a2d74cd048ce9149a2a73b9b41212&client=amp-blogside-v2&signature=618a2121066af0a0ae7cb3cb87034ae6940dc475)";
			document.body.style.backgroundRepeat = "repeat";
			document.body.style.backgroundSize = "auto";
	</script>';
	
    }
  
