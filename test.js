$(document).ready(function() {

	$.ajax({
		url: "test.php",
		data: $("#color").serialize(),
		async: true,
		type:
	}).done(function(data) {
		console.log(data);
	});









});
