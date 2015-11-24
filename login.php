<?php 
session_start();

include('connect.inc');

$username = mysql_real_escape_string( $_POST['loginusername'] );
$password = md5 (mysql_real_escape_string( $_POST['loginpassword']));
$connection = 0;

$sql = "SELECT * FROM diplomatiki.users WHERE(username='$username' AND password='$password')";
$res = mysqli_query($conn,$sql); 
$row = mysqli_fetch_row($res);

if ( $row> 0 ) {
	/* echo "Your name exists on database"."<br/>"; */  /*H grammh auti DEN xreiazetai giati mpainei sto if meta kai pairnei tis times apo kei gia na tis steilei sto data tou login-script.js*/
	$connection = 1;
	
	/*εδώ βάζουμε το username για το session. το username που έχει εισάγει ο χρήστης.*/	
}else {  
	echo "fail";
}

/*εδώ βάζουμε το username για το session. το username που έχει εισάγει ο χρήστης.*/	
if(mysqli_num_rows($res)==1 && $connection == 1) {
		$_SESSION['rightname'] = $username;
		
		echo "$username";
	}/* else if($connection == 1){
		echo "fail";
	} */



/* mysqli_close($conn);
 */
?>
