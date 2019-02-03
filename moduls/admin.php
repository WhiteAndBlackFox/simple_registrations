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
				});
		}
		refresh_table();
	});
</script>
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
    	</tr>
    </thead>
    <tbody id="body_table">

    </tbody>
    </table>
</form>
<?php	
}
?>
