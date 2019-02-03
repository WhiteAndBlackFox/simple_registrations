<script type="text/javascript" src="js/auth.js"></script>
<form id="login">
    <h1>Форма входа</h1>
    <div id="error"></div>
    <div id="inputs">
        <label for="username">Номер телефона</label>
        <input id="username" type="text" placeholder="+1234567890" autofocus required>   
        <label for="password">Пароль</label>
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