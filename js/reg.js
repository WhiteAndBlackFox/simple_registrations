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

		var password = $("#password").val();
		if(password == ""){
			console.log("null password");
			document.getElementById("error").innerHTML="Не указан пароль";
			$('#error').show();
			$("#password").focus();
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
				telephone: telephone,
				password: password
			},
			function(data, status){
				data = $.parseJSON(data);
				if(!data.status){
					document.getElementById("error").innerHTML=data.error;
					$('#error').show();
					$("#telephone").focus();
				} else {
					$.get("moduls/auth.php", function(data){
						$("#container").html(data);
					});
				}
			});
		
	});

	$("#cancel").click(function(){
		$.get("moduls/auth.php", function(data){
			$("#container").html(data);
		});
	});

	$("#save_users").click(function(){
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

		var password = $("#password").val();
		if(password == ""){
			console.log("null password");
			document.getElementById("error").innerHTML="Не указан пароль";
			$('#error').show();
			$("#password").focus();
			return false;
		}

		$.post("moduls/functions.php",
			{
				func: "chenge_users",
				username: username,
				userlastname: userlastname,
				databirthday: $("#databirthday").val(),
				company: $("#company").val(), 
				position: $("#position").val(),
				telephone: telephone,
				password: password
			},
			function(data, status){
				/* data = $.parseJSON(data); */
				console.log(data);
			});

	});

	function check_input(){
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

			var password = $("#password").val();
			if(password == ""){
				console.log("null password");
				document.getElementById("error").innerHTML="Не указан пароль";
				$('#error').show();
				$("#password").focus();
				return false;
			}
	}

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