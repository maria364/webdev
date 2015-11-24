<?php include 'header.php'; ?>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
	<div id="account-info" >
		
		<?php
		
		$email_edit=0;
		
		$username = $_SESSION['rightname'];
		$sql = "SELECT firstname, lastname, email, password FROM diplomatiki.users WHERE(username='$username')";
		$res = mysqli_query($conn,$sql);
		$row = mysqli_num_rows($res);
		
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
						echo "<td><button onclick='edit_email()' class='edit-email'>edit</button></td>";
						echo "</tr>";
						echo "<tr align='left'>";
						/*echo "<td><div id='counter1' ></div></td>";*/
						echo "<td align='left'><h4> Κωδικός πρόσβασης:    </h4></td>";
						echo "<td></td>";
						echo "<td align='left'><button onclick='edit_pass()' class='edit-pass' >edit</button></td>";
						echo "</tr></tbody>";
						echo "<tr>";
						/*echo "<td><div id='counter2' ></div></td>";*/
						echo "</tr></tbody>";

					 }
				}	
				echo "</table>";
		mysqli_close($conn);
		?>
	</div>	
	
	<div id="counter" style="margin-left:480px;float:left;margin-top:-250px"></div>
	<!--<div id="receive" style="margin-left:480px;float:left;margin-top:-220px"></div>-->
	<div id="counter1" style="margin-left:480px;float:left;margin-top:-150px"></div>
	<div id="counter2" style="margin-left:480px;float:left;margin-top:-50px"></div>
	
	
                </div>
            </div>
        </div>
    </header>
	
	<?php include 'footer.php'; ?>
	