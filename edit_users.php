<?php include 'header.php'; 
session_start();
?>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
				<?php
				$_SESSION['user_edit']=mysql_real_escape_string($_POST['user_edit']);
				echo $_SESSION['user_edit'];
				$user_edit= mysql_real_escape_string($_POST['user_edit']);
				
				//echo "i timi pou pairnw einai ".$user_edit;
				$email_edit=0;
				
				$username = $_SESSION['rightname'];
				$sql = "SELECT firstname, lastname, email, password, identity FROM diplomatiki.users WHERE(username='$user_edit')";
				$res = mysqli_query($conn,$sql);
				$row = mysqli_num_rows($res);
				echo "";
				echo "<div class='table-responsive'>  ";
				echo "<table class='table' style='width:60%'>";
				if ( $row> 0 ) {
					 $rowc = mysqli_fetch_assoc($res); //fetch a result row as an associative array
					 if ($row = $rowc) {
						echo "<tbody><tr align='left'>";
						echo "<td align='left'><h4>Ονοματεπώνυμο:    </h4></td>";
						echo "<td align='left'><h4>". $row["firstname"]. " " .$row["lastname"]."</h4></td>";
						echo "<td></td>"; 			
						echo "</tr>";
						echo "<tr align='left'>";
						/*echo "<td><div id='counter' ></div></td>";*/
						echo "<td align='left'><h4> e-mail:    </h4></td>";
						echo "<td align='left'><h4>". $row["email"]."</h4></td>";
						echo "<td><button value='".$user_edit."' onclick='edit_email(this.value)' class='edit-email'>edit</button></td>";
						echo "</tr>";
						echo "<tr align='left'>";
						/*echo "<td><div id='counter1' ></div></td>";*/
						echo "<td align='left'><h4> Κωδικός πρόσβασης:    </h4></td>";
						echo "<td></td>";
						echo "<td align='left'><button value='".$user_edit."' onclick='edit_pass(this.value)' class='edit-pass' >edit</button></td>";
						echo "</tr></tbody>";
						echo "<tr>";
						/*echo "<td><div id='counter2' ></div></td>";*/
						echo "</tr></tbody>";
						$identity = $row["identity"];
						/*echo "".$identity;*/
					 }
				}	
				echo "</table>";
				mysqli_close($conn);
				?>
					
			
			
			<div id="counter" align="left" ></div>
			<div id="counter1" align="left" ></div>
			<br>
			<div id="counter2" align="left" ></div>
            </div>
		</div>
		
		
		
		<div class="row">
			<div class="col-md-2">
				<div class="btn-group-vertical">
  					<!--<button class="btn btn-default" name="<?php echo $user_edit ?>" onclick="insertphoto('<?php echo $user_edit ?>')" >Εισαγωγή φωτογραφιών</button>-->
					<a href="insert-user-photo.php" type="button" class="btn btn-default" name="<?php echo $user_edit ?>" >Εισαγωγή φωτογραφιών</a>
					<a href="handle-photo.php" type="button" class="btn btn-default" >Διαχείριση φωτογραφιών</a>
					<button type="button" class="btn btn-default" value="<?php echo $user_edit ?>" onclick="ConfirmDelete(this.value)">Διαγραφή χρήστη</button>
				</div>
					<br/>
				<div class="btn-group" style="float:left">
					<br/>
					<br/>
					<button type="button" class="btn btn-default" id="change_to_admin" value="<?php echo $identity ?>" onclick="change_identity(this.value,'<?php echo $user_edit ?>')">admin</button>
  					<button type="button" class="btn btn-default" id="change_to_user"  value="<?php echo $identity ?>" onclick="change_identity(this.value,'<?php echo $user_edit ?>')">user</button>
					<br/>
					<br/>
					<br/>
					<label>Ειδοποίηση e-mail</label>
					<input type="checkbox" id="sendemail" name="sendemail" style="margin-left:5px" onclick="SendEmail('<?php echo $user_edit ?>')" <?php echo "checked" ?> >
					<button class='sendemail' value="<?php echo $user_edit ?>" name="sendemail" onclick="SendEmail(this.value)">Ενημερωτικό e-mail</button>
				</div>
			</div>	
		</div>	
			
        </div>
    </header>
	
	
 <?php include 'footer.php'; ?>

