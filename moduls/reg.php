<?php
session_start();
?>
<script type="text/javascript" src="js/reg.js"></script>
<?php
    if ($_SESSION["admin"]){
        echo '<div id="admin">
            <script type="text/javascript">
                $("#admin_buttom").click(function(){
                    $.get("moduls/admin.php", function(data){
                        $("#container").html(data);
                    });
                });
            </script>
            <div id="admin_buttom" name="admin_buttom" class="button">Панель администратора</div>
        </div>';
    }
?>
<form id="login">
    <h1>Форма регистрации</h1>
    <div id="error"></div>
    <div id="inputs">
    	<label for="username">Имя<span style="color: #BA0000; font-family: Verdana; font-size: 10pt; font-weight: bold;"> *</span></label>
        <input id="username" type="text" placeholder="Иван" autofocus required>
        <label for="userlastname">Фамилия<span style="color: #BA0000; font-family: Verdana; font-size: 10pt; font-weight: bold;"> *</span></label>
        <input id="userlastname" type="text" placeholder="Иванов" required>
        <label for="databirthday">Дата рождения</label>
        <input id="databirthday" type="date" placeholder="dd.mm.yyyy" required>
        <label for="company">Компания</label>
        <input id="company" type="text" placeholder="ООО МЕТА" required>
        <label for="position">Должность</label>
        <input id="position" type="text" placeholder="Программист" required>
        <label for="telephone">Телефон<span style="color: #BA0000; font-family: Verdana; font-size: 10pt; font-weight: bold;"> *</span></label>
        <input id="telephone" type="text" placeholder="+1234567890" required>
        <label for="password">Пароль<span style="color: #BA0000; font-family: Verdana; font-size: 10pt; font-weight: bold;"> *</span></label>
        <input id="password" type="password" placeholder="Пароль" required>
        <?php
        if ($_SESSION["change"]){
            echo "<div>
                <select name=\"access_users\">
                  <option value=\"0\" selected>Пользователь</option>
                  <option value=\"1\">Администратор</option>
                </select>
            </div>";
        }
        ?>
    </div>
    <div id="actions">
            <table>
                <td>
                    <div class="button" id="new_users" name="new_users">ЗАРЕГЕСТРИРОВАТЬСЯ</div>
                    <div class="button" id="save_users" name="save_users">СОХРАНИТЬ ИЗМЕНЕНИЯ</div>
                </td>
                <td>
                    <div class="button" id="cancel" name="cancel">ОТМЕНА</div>
                </td>
            </table>
    </div>
</form>