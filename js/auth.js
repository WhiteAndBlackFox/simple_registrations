$(document).ready(function() {
	$('#error').hide();
	$("#enter_btn").click(function(){
		$('#error').hide();
		var username = $("#username").val();
		if(username == ""){
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

		$.post("moduls/functions.php",
			{
				func: "auth_users",
				username: username,
				password: pass
			},
			function(data, status){
				console.log(data);
				data = $.parseJSON(data);
				if(data.status){
					$.get("moduls/reg.php", function(data_php){
						$("#container").html(data_php);
						$("#new_users").remove();

						$('#username').val(data.username);
						$('#userlastname').val(data.userlastname);
						$('#databirthday').val(data.databirthday);
						$('#company').val(data.company);
						$('#position').val(data.position);
						$('#telephone').val(data.telephone);
					});
				} else {
					document.getElementById("error").innerHTML="Неверный номер или пароль";
					$('#error').show();
					$("#password").focus();
				}
			});
		
	});

	$("#reg").click(function(){
		$.get("moduls/reg.php", function(data){
			$("#container").html(data);
			$("#save_users").remove();
		});
	});

	$("#username").keypress(function(event){
		event = event || window.event;
		if (event.charCode && event.charCode != 0 && event.charCode != 46 && 
			(event.charCode < 48 || event.charCode > 57))
    		return false;
	});
	$("#username").keyup(function(event){
		var username = $("#username").val();
		if(username.length >= 1){
			username = username.replace("+", "");
			$("#username").val("+"+username);
		}
		if(username == "+"){
			$("#username").val("");	
		}
	});

});