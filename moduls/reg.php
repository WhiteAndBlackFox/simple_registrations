<script type="text/javascript" src="js/reg.js"></script>
<form id="login">
    <h1>Форма регистрации</h1>
    <div id="error"></div>
    <div id="inputs">
    	<label for="username">Имя<span style="color: #BA0000; font-family: Verdana; font-size: 10pt; font-weight: bold;"> *</span></label>
        <input id="username" type="text" placeholder="Иван" autofocus required>
        <label for="userlastname">Фамилия<span style="color: #BA0000; font-family: Verdana; font-size: 10pt; font-weight: bold;"> *</span></label>
        <input id="userlastname" type="text" placeholder="Иванов" required>
        <label for="databirthday">Дата рождения</label>
        <input id="databirthday" type="text" placeholder="ДД.ММ.ГГГГ" required>
        <label for="company">Компания</label>
        <input id="company" type="text" placeholder="ООО МЕТА" required>
        <label for="position">Должность</label>s
        <input id="position" type="text" placeholder="Программист" required>
        <label for="telephone">Телефон<span style="color: #BA0000; font-family: Verdana; font-size: 10pt; font-weight: bold;"> *</span></label>
        <input id="telephone" type="text" placeholder="+1234567890" required>
    </div>
    <div id="actions">
            <div class="button" id="new_users" name="new_users">ЗАРЕГЕСТРИРОВАТЬСЯ</dv>
    </div>
</form>