<?php 
require "Mail.php";
require "Mail/mime.php";
include('connect.inc');

/*meta to post mpainei to "name" pou exoume kataxwrisei sto kathe output*/
$email = mysql_real_escape_string( $_POST['forget-email'] );

$sql = "SELECT * FROM diplomatiki.users WHERE(email=$email)";
$res = mysqli_query($conn,$sql); 
$row = mysqli_fetch_row($res);
    $to      = "mariatsourm@yahoo.gr";
    $from    = "mtsourma@gmail.com"; // the email address
    $subject = "Password Reset";
   
    $host    = "smtp.gmail.com";
    $port    =  "587";
	$mail->SMTPSecure = "ssl";
    $user    = "mtsourma@gmail.com";
    $pass    = "Ed3FI0UO";
    $headers = array("From"=> $from, "To"=>$to, "Subject"=>$subject);
    $smtp    = @Mail::factory("smtp", array("host"=>$host, "port"=>$port, "auth"=> true, "username"=>$user, "password"=>$pass));
    $msg = "Ζητήσατε αλλαγή password. Εάν συμφωνείται με τους όρους,\n πατήστε στον παρακάτω σύνδεσμο, ώστε να αλλάξετε τον κωδικό σας.\n";
	

if ( $row> 0 ) {
	echo "An e-mail has been send to you successfully"; /*ΒΑΛΤΟ ΣΤΑ ΕΛΛΗΝΙΚΑ*/
	//eisagoume ti sunartisi apostolis mail, efoson exei epikurwthei oti to mail uparxei sti forma mas
		
		// the message

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,150);
		

		// send email
		//mail($email,"Password Reset",$msg,$headers);
		$mail    = @$smtp->send($to, $headers, $msg);

			if (PEAR::isError($mail)){
				echo "error: {$mail->getMessage()}";
			} else {
				echo "Message sent";
			}
		
}else {  
	echo "Your e-mail is not on the database. Please register.";
}



?>