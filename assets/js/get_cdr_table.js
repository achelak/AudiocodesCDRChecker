function funcBefore () {
	$("#information").text ("Loading...");

}


function funcSuccess (data) {
	$("#information").html (data);


}

$(document).ready (function () {
	$("#load").bind("click", function () {
		var phone_num = $('input.phone_num').val();
		$.ajax ({
			url: "get_cdr_table.php",
			method: "POST",
			dataType: "html",
			data: { phone_num: phone_num },
			beforeSend: funcBefore,
			success: funcSuccess
	       });

		});
	});


// Удаление из дива!!!!

$(document).ready(function(){
	$('button.clear').on('click',function() {
			$("#information").html('');

	});


});

