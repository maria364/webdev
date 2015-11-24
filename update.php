<?php 
session_start();

include('connect.inc');
$username = mysql_real_escape_string( $_POST['username'] );

	$sql = "SELECT * FROM diplomatiki.users WHERE(username='$username')";
	$res = mysqli_query($conn,$sql); 
	$row = mysqli_fetch_row($res);

if ( $row> 0 )
{
$check=$_POST['check'];
echo $check;

	//allagi onomatos kai epwnimou
	if ($check == 1)
	{
		$firstname = mysql_real_escape_string( $_POST['firstname'] );
		$lastname = mysql_real_escape_string( $_POST['lastname'] );
			if(empty($firstname))
			{
				if (empty($lastname))
				{
					echo "There has been no change on your name";
				} else {
					//do the update if the user has changed his/her firstname, lastname
					$sql = "UPDATE diplomatiki.users SET lastname='$lastname' WHERE username='$username'";
					$res = mysqli_query($conn,$sql); 
					echo "Lastname changed";
					echo $lastname;
				}
			} else 
				{	
					if (empty($lastname))
					{
						echo "Firstname changed";
						echo $firstname;
						//do the update if the user has changed his/her firstname, lastname
						$sql = "UPDATE diplomatiki.users SET firstname='$firstname' WHERE username='$username'";
						$res = mysqli_query($conn,$sql); 
					} else {
						echo "Lastname changed";
						echo $lastname;
						echo "Firstname changed";
						echo $firstname;
						//do the update if the user has changed his/her firstname, lastname
						$sql = "UPDATE diplomatiki.users SET lastname='$lastname', firstname='$firstname' WHERE username='$username'";
						$res = mysqli_query($conn,$sql); 
					}
				
				}
	//allagi dieuthinsis email			
	} else if ($check == 2) {
		
		$email = mysql_real_escape_string( $_POST['email'] );
			if( empty($email))
				{
					echo "Your email has not been editted";
					
				}else {
					echo "Email editted";
					echo $email;	
					//do the update if the user has changed his/her firstname, lastname
					$sql = "UPDATE diplomatiki.users SET email='$email' WHERE username='$username'";
					$res = mysqli_query($conn,$sql); 
					
				}
				
	//allagi kwdikou prosvasis		
	} else if ($check ==3) {
		$password = mysql_real_escape_string( $_POST['password']);
			if( empty($password))
				{
					echo "Your password has not been editted";
				}else {
				$password = md5($password);
					//do the update if the user has changed his/her firstname, lastname
					$sql = "UPDATE diplomatiki.users SET password='$password' WHERE username='$username'";
					$res = mysqli_query($conn,$sql); 
					echo "Password editted";
					echo $password;
				}
	} else if ($check == 4) {
		$identity = mysql_real_escape_string( $_POST['identity']);
			if($identity == 0){
				//εάν ο χρήστης είναι user, άλλαξε την τιμή του πεδίου identity σε 1 και καν' τον administrator
				$sql = "UPDATE diplomatiki.users SET identity='1' WHERE username='$username'";
					$res = mysqli_query($conn,$sql); 
					echo "Τα δικαιώματα του χρήστη έχουν αλλάξει ";
					//echo $identity; //η identity που εμφανίζεται είναι τα παλιά δικαιώματα του χρήστη. αυτά που έχει στη βάση

			} else {
				echo "Ο παρόν χρήστης έχει ήδη δικαιώματα administrator.";
			}
	
	} else if ($check == 5) {
		$identity = mysql_real_escape_string( $_POST['identity']);
			$sql = "SELECT * FROM diplomatiki.users WHERE(identity=1)";
			$res = mysqli_query($conn,$sql); 
			$row = mysqli_num_rows($res); //επιστρέφει τον αριθμό των γραμμών της βάσης που έχουν βρει το αποτέλεσμα από το παραπάνω sql ερώτημα
			echo $row;
			if($row>1){
				 //$rowc = mysqli_fetch_assoc($res);
				
				
				if($identity == 1){
			//εάν ο χρήστης είναι user, άλλαξε την τιμή του πεδίου identity σε 0 και καν' τον user
					$sql = "UPDATE diplomatiki.users SET identity='0' WHERE username='$username'";
					$res = mysqli_query($conn,$sql); 
					echo "Τα δικαιώματα του χρήστη έχουν αλλάξει";
								//echo $identity; //η identity που εμφανίζεται είναι τα παλιά δικαιώματα του χρήστη. αυτά που έχει στη βάση
				} else {
					echo "Ο παρόν χρήστης έχει ήδη δικαιώματα user.";
				}
			

			} else {
				echo "Δεν μπορείτε να γίνεται user, καθώς πρέπει να υπάρχει ένας administrator στο σύστημα";
			}
		
	} else if ($check == 6) {
		
		$username = mysql_real_escape_string($_POST['username']);
		echo $username;
		//$sql = "UPDATE diplomatiki.users SET sendemail='1' WHERE username='$username'";
				//	$res = mysqli_query($conn,$sql)or die("<br/><br/>".mysql_error()); 
				//	echo "Ο χρήστης θα λαμβάνει ενημερωτικά email.";
	}
}
?>