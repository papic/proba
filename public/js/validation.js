$( document ).ready(function() {
	$( "form" ).submit(function( event ) {
		var message = "";
		var emailFormat = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})$/;
		if (!emailFormat.test($("#email").val())) {
			message=message+validationValues.email+"\n";
		}
		var nameFormat = /^([a-zA-Z]{2,})$/;
		if (!nameFormat.test($("#first_name").val())) {
			message=message+validationValues.firstName+"\n";
		}
		if (!nameFormat.test($("#last_name").val())) {
			message=message+validationValues.lastName+"\n";
		}
		var passFormat = /^((\S){6,})$/;
		if (!passFormat.test($("#password").val())) {
			message=message+validationValues.password+"\n";
		}
		if ($("#password").val()!==$("#password_confirmation").val()) {
			message=message+validationValues.confirmation+"\n";
		}
		if (message!=='') {
			alert(message);
			event.preventDefault();
		}
	});
});