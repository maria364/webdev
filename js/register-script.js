/*Είναι το js που χρησιμοποιείται για την εγγραφή. */

$("#register").click( function () {
/*εισάγω έλεγχο για το αν οι τιμές είναι κενές ή όχι*/
	if( $(".input-FirstName").val() == "" || $(".input-LastName").val() == "" )
	$("#ack").html("Όλα τα παραπάνω πεδία είναι υποχρεωτικά");
	else
	/*παίρνω δεδομένω από το register form και τα μεταφέρω στο register.php (Που έχει οριστεί το action της φόρμας, ώστε να εκτελεστεί το Mysql ερώτημα)*/
		$.post( $(".register-form").attr("action"),
			$(".register-form :input").serializeArray(),
			function(info) {
		
			$("#ack").empty();
			$("#ack").html (info);
			
			clear();
			
		});
	
	$(".register-form").submit( function () {
		return false;
	});
	
	close();
});

/*custom συνάρτηση η οποία απαλοίφει τις τιμές των κελιών της φόρμας. Καλείται όταν οι τιμές έχουν καταχωρηθεί στη βάση δεδομένων.*/
function clear() {
 
	$(".register-form :input").each( function() {
	      $(this).val("");
	});
 
}
function close() {
	$(".modal-register").fadeOut(800);
}