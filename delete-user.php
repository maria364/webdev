<?php 
include('connect.inc');

$choose = $_POST['choose'];
//echo $username;


if ($choose == 1) {

		$username = mysql_real_escape_string($_POST['username']);
		$first = "DELETE FROM users WHERE username='$username'";
		$res = mysqli_query($conn, $first)or die("<br/><br/>".mysql_error());
			
		echo "Ο χρήστης διαγράφηκε επιτυχώς."; 

} else if ($choose == 2) {
		
		echo "Η φωτογραφία διαγράφηκε επιτυχώς."; 

		
		
		
}
/* mysqli_close($conn);
 */
?>