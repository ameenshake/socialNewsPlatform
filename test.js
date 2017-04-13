let data = $("#poop").serialize();


$.ajax({
	url: "index.php?controller=posts&action=postPage&postID=3",
	
	success: function(data) {
		console.log(data);
	}


});
