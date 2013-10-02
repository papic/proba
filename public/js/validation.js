$( document ).ready(function() {
	$( "form" ).submit(function( event ) {
		var emailFormat = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})$/;
		if (!emailFormat.test($("#email").val())) {
			alert( validationValues.email);
			event.preventDefault();
			return;
		}
		var nameFormat = /^([a-zA-Z]{2,})$/;
		if (!nameFormat.test($("#firstName").val())) {
			alert( validationValues.firstName );
			event.preventDefault();
			return;
		}
		if (!nameFormat.test($("#lastName").val())) {
			alert( validationValues.lastName );
			event.preventDefault();
			return;
		}
		var passFormat = /^((\S){6,})$/;
		if (!passFormat.test($("#password").val())) {
			alert( validationValues.password );
			event.preventDefault();
			return;
		}
		if ($("#password").val()!==$("#confirmPassword").val()) {
			alert( validationValues.confirmation );
			event.preventDefault();
		}
	});
});