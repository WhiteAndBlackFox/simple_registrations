<?php
session_start();
?>

<?php
if (!$_SESSION["admin"]){
	echo '<form id="null">
    	<h1>Не туда завернул }:D</h1>
	</form>';
} else {
?>
<script type="text/javascript">
	$(document).ready(function() {
		$("#refresh").click(refresh_table);

		$("#exit").click(function() {
			$.post("moduls/functions.php",
			{
				func: "clear_sessions"
			}, function(data, status){
				$.get("moduls/auth.php", function(data){
					$("#container").html(data);
				});
			});	
		});

		function refresh_table(){
			$.post("moduls/functions.php",
				{
					func: "table_users"
				},
				function(data, status){
					/* data = $.parseJSON(data); */
					/* console.log(data); */
					$("#body_table").html(data);
					$("#login").width("auto");
					$(".button_table").click(function(event){
						var id = $(this).attr("id");
						var sp = id.split("_");
						if (sp[1] == "delete"){
							$.post("moduls/functions.php",
							{
								func: "delete_users",
								row: sp[0]

							}, function(data, status){
								refresh_table();
							});
						}
						if (sp[1] == "edit"){
							<?php 
								$_SESSION['change'] = "1";
							?>

							var id = "#"+sp[0];
							var n = $(id + " td:nth-child(1)").text();
							var f = $(id + " td:nth-child(2)").text();
							var db = $(id + " td:nth-child(3)").text();
							var c = $(id + " td:nth-child(4)").text();
							var p = $(id + " td:nth-child(5)").text();
							var t = $(id + " td:nth-child(6)").text();
							$.get("moduls/reg.php", function(data_php){
								$("#container").html(data_php);
								$("#new_users").remove();

								$('#username').val(n);
								$('#userlastname').val(f);
								$('#databirthday').val(db);
								$('#company').val(c);
								$('#position').val(p);
								$('#telephone').val(t);
							});
						}
					});
				});
		}
		refresh_table();
	});
</script>
<div id="exit" class="button">Выход</div>
<form id="login">
    <h1>Список пользователей</h1>
    <table>
    <td><div id="refresh" class="button">Обновить таблицу</div></td>
	<td><a class="button" href="reg_users.csv" download>Скачать данные</a></td>
	</table>
    <table border="2">
    	<thead>
    	<tr>
    		<td>Имя</td>
			<td>Фамилия</td>
			<td>Дата рождения</td>
			<td>Компания</td>
			<td>Должность</td>
			<td>Телефон</td>
			<td></td>
    	</tr>
    </thead>
    <tbody id="body_table">

    </tbody>
    </table>
</form>
<?php	
}
?>
