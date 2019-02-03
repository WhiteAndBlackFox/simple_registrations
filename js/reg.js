$(document).ready(function() {
	$('#error').hide();
	$("#new_users").click(function(){
		$('#error').hide();
		var username = $("#username").val();
		if(username == ""){
			console.log("null username");
			document.getElementById("error").innerHTML="Поле с именем не заполнено";
			$('#error').show();
			$("#username").focus();
			return false;
		}

		var userlastname = $("#userlastname").val();
		if(userlastname == ""){
			console.log("null userlastname");
			document.getElementById("error").innerHTML="Поле с фамилией не заполнено";
			$('#error').show();
			$("#userlastname").focus();
			return false;
		}
		
		var telephone = $("#telephone").val();
		if(telephone == ""){
			console.log("null telephone");
			document.getElementById("error").innerHTML="Не указан телефон";
			$('#error').show();
			$("#telephone").focus();
			return false;
		}

		$.post("moduls/functions.php",
			{
				func: "new_users",
				username: username,
				userlastname: userlastname,
				databirthday: $("#databirthday").val(),
				company: $("#company").val(), 
				position: $("#position").val(),
				telephone: telephone
			},
			function(data, status){
				console.log(status);
			});
		
	});

	$("#telephone").keypress(function(event){
		event = event || window.event;
		if (event.charCode && event.charCode != 0 && event.charCode != 46 && 
			(event.charCode < 48 || event.charCode > 57))
    		return false;
	});
	$("#telephone").keyup(function(event){
		var telephone = $("#telephone").val();
		if(telephone.length >= 1){
			telephone = telephone.replace("+", "");
			$("#telephone").val("+"+telephone);
		}
		if(telephone == "+"){
			$("#telephone").val("");	
		}
	});
});