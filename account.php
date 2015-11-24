<?php include 'header.php'; ?>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
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
					
			
			
			<div id="counter" align="left" ></div>
			<div id="counter1" align="left" ></div>
			<br>
			<div id="counter2" align="left" ></div>
            </div>
		</div>
		
		
		<div class="row">
			<div class="col-md-2">
				<button type="button" class="btn btn-default">Εισαγωγή φωτογραφιών</button><br>
				<br/>
				<button type="button" class="btn btn-default">Διαχείριση φωρογραφιών</button>	
			</div>	
		</div>	
			
        </div>
    </header>
	
	
 <?php include 'footer.php'; ?>


	