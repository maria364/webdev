<?php 
include('connect.inc');

$firstname = mysql_real_escape_string( $_POST['firstname'] );
$lastname = mysql_real_escape_string( $_POST['lastname'] );
$email = mysql_real_escape_string( $_POST['e-mail'] );
$username = mysql_real_escape_string( $_POST['username'] );
$password = md5( mysql_real_escape_string( $_POST['password']));


if( empty($username) || empty($password) )
	  {
	  	echo "���������� username ��� password";
		exit();
	  }

/*������ �� ������������ ��� username*/

$first = "SELECT username FROM diplomatiki.users WHERE username LIKE '$username'";
$res = mysqli_query($conn, $first)or die("<br/><br/>".mysql_error());
	/*��� ��� ������� ���� �� ��� ����� ��� ������� ��� ������� �� �������� username. ��� ������� ���� ��� ���������� �� Insertion ��� ����*/
$row = mysqli_fetch_row($res);

if ( $row> 0 )
	echo "Username has already been taken"; /*����� ��� ��������*/
else {  

	$sql = "INSERT INTO users VALUES ('$firstname', '$lastname', '$email', '$password', '', '$username' )";
	/* ('firstname, lastname, e-mail, usename, password) */
	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Insertion failed " .mysql_error();
	}
}
/* mysqli_close($conn);
 */
?>
