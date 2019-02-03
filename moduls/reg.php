<script type="text/javascript" src="js/reg.js"></script>
<form id="login">
    <h1>Форма регистрации</h1>
    <div id="error"></div>
    <div id="inputs">
    	<label for="username" class="">Имя</label>
        <input id="username" type="text" placeholder="Логин" autofocus required>   
        <input id="password" type="password" placeholder="Пароль" required>
    </div>
    <div id="actions">
        <table id="buttons_auth">
            <td>
            <div class="button" id="enter_btn" name="enter_btn">ВОЙТИ</div>
        </td>
        <td align="right">
            <div class="button" id="reg" name="reg">РЕГИСТРАЦИЯ</dv>
        </td>
        </table>
    </div>
</form>