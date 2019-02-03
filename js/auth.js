$(document).ready(function() {
	$('#error').hide();
	$("#enter_btn").click(function(){
		$('#error').hide();
		var login = $("#username").val();
		if(login == ""){
			console.log("null username");
			document.getElementById("error").innerHTML="Поле с логином не заполнено";
			$('#error').show();
			$("#username").focus();
			return false;
		}

		var pass = $("#password").val();
		if(pass == ""){
			console.log("null password");
			document.getElementById("error").innerHTML="Поле с паролем не заполнено";
			$('#error').show();
			$("#password").focus();
			return false;
		}
		
	});

	$("#reg").click(function(){
		/*$("#container").html("moduls/reg.php");*/
		$.get("moduls/reg.php", function(data){
			$("#container").html(data);
		});
	});
});