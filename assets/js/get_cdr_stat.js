function funcBefore () {
	$("#information").text ("Loading...");

}


function funcSuccess (data) {
	$("#information").html (data);
	
	
}



$(document).ready (function () {
    $(".ajax-month-key").click(function(){
        var month_id = $(this).attr("id");
        // alert(month_id)
        $.ajax ({
            url: "get_cdr_stat.php",
            method: "POST",
            dataType: "html",
            data: { month_id: month_id },
            beforeSend: funcBefore,
            success: funcSuccess
            });
    });
});





// Clear Form

$(document).ready(function(){
	$('button.clear').on('click',function() {
		$("#information").html('');
		
	});


});