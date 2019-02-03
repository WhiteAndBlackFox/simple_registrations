$(document).ready(function() {
	$('#error').hide();
	$("#enter_btn").click(function(){
		$('#error').hide();
		var login = $("#username").val();
		if(login == ""){
			console.log("null username");
			document.getElementById("error").innerHTML="Поле с именем не заполнено";
			$('#error').show();
			$("#username").focus();
			return false;
		}

		var pass = $("#userlastname").val();
		if(pass == ""){
			console.log("null userlastname");
			document.getElementById("error").innerHTML="Поле с фамилией не заполнено";
			$('#error').show();
			$("#userlastname").focus();
			return false;
		}
		
		var pass = $("#telephone").val();
		if(pass == ""){
			console.log("null telephone");
			document.getElementById("error").innerHTML="Не указан телефон";
			$('#error').show();
			$("#telephone").focus();
			return false;
		}
		
	});

	$("#telephone").keypress(function(){
		event = event || window.event;
		console.log(event.charCode);
		if (event.charCode && event.charCode != 0 && event.charCode == 43 && 
			event.charCode != 46 && (event.charCode < 48 || event.charCode > 57) )
    		return false;
	});
});